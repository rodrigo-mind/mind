<?php
define('APP_LOADED', true);
require_once __DIR__ . '/../../includes/config.php';
require_once __DIR__ . '/../../includes/security.php';
require_once __DIR__ . '/../../includes/db.php';

// Versão vigente da Política de Privacidade (deve bater com o texto exibido
// em /politica-de-privacidade/ — hoje "julho de 2026"). Definida pelo
// SERVIDOR, não recebida do cliente, para não poder ser forjada.
// TODO: mover para includes/config.php se outros pontos do site também
// precisarem referenciar essa versão, para não duplicar a constante.
define('LGPD_POLITICA_VERSAO_ATUAL', '2026-07');

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'erro' => 'Método não permitido']);
    exit;
}

$raw  = file_get_contents('php://input');
$body = json_decode($raw, true);

if (!is_array($body)) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'erro' => 'Corpo da requisição inválido']);
    exit;
}

// Rate limit por IP: 5 envios a cada 10 min — mesmo padrão usado no
// endpoint de simulação, evita flood num formulário público de escrita.
$ipOrigem = $_SERVER['REMOTE_ADDR'] ?? '';
if ($ipOrigem !== '') {
    try {
        $dbCheck = getDB();
        $stmtCheck = $dbCheck->prepare(
            'SELECT COUNT(*) FROM cadastros_financiamento
             WHERE ip_origem = ? AND criado_em > (NOW() - INTERVAL 10 MINUTE)'
        );
        $stmtCheck->execute([$ipOrigem]);
        if ((int)$stmtCheck->fetchColumn() >= 5) {
            http_response_code(429);
            echo json_encode(['ok' => false, 'erro' => 'Muitas tentativas. Aguarde alguns minutos.']);
            exit;
        }
    } catch (PDOException $e) {
        // Banco indisponível: deixa seguir, o INSERT abaixo vai falhar sozinho.
    }
}

/**
 * Valida CPF pelo algoritmo padrão dos dois dígitos verificadores.
 * Recebe string já limpa (só dígitos, 11 caracteres). Idêntica à usada
 * no endpoint de simulação — é o campo que liga os dois cadastros.
 */
function validarCPF(string $cpf): bool
{
    if (strlen($cpf) !== 11) return false;
    if (preg_match('/^(\d)\1{10}$/', $cpf)) return false;

    $soma = 0;
    for ($i = 0; $i < 9; $i++) {
        $soma += (int)$cpf[$i] * (10 - $i);
    }
    $resto = ($soma * 10) % 11;
    if ($resto >= 10) $resto = 0;
    if ($resto !== (int)$cpf[9]) return false;

    $soma = 0;
    for ($i = 0; $i < 10; $i++) {
        $soma += (int)$cpf[$i] * (11 - $i);
    }
    $resto = ($soma * 10) % 11;
    if ($resto >= 10) $resto = 0;
    if ($resto !== (int)$cpf[10]) return false;

    return true;
}

/**
 * Validação server-side — nunca confiar só no JS do formulário, já que
 * este endpoint pode ser chamado diretamente por qualquer cliente HTTP.
 */
$erros = [];

$nomeCompleto = trim((string)($body['nomeCompleto'] ?? ''));
if ($nomeCompleto === '' || mb_strlen($nomeCompleto) > 150) $erros[] = 'nomeCompleto';

// CPF: remove máscara e valida os dígitos verificadores no servidor —
// é o campo que vai ligar este cadastro à simulação de financiamento.
$cpf = preg_replace('/\D/', '', (string)($body['cpf'] ?? ''));
if (!validarCPF($cpf)) {
    $erros[] = 'cpf';
}

// RG não tem dígito verificador padronizado nacionalmente (cada estado
// emite do seu jeito), então aqui só validamos formato/tamanho — nunca um
// checksum como o do CPF.
$rg = strtoupper(preg_replace('/[^0-9Xx]/', '', (string)($body['rg'] ?? '')));
if (strlen($rg) < 8 || strlen($rg) > 9) {
    $erros[] = 'rg';
} elseif (strlen($rg) === 9 && !preg_match('/[0-9X]$/', $rg)) {
    $erros[] = 'rg';
}

$nomeMae = trim((string)($body['nomeMae'] ?? ''));
if ($nomeMae === '' || mb_strlen($nomeMae) > 150) $erros[] = 'nomeMae';

$cep = preg_replace('/\D/', '', (string)($body['cep'] ?? ''));
if (strlen($cep) !== 8) $erros[] = 'cep';

$numeroResidencia = trim((string)($body['numeroResidencia'] ?? ''));
if ($numeroResidencia === '' || mb_strlen($numeroResidencia) > 20) $erros[] = 'numeroResidencia';

$profissao = trim((string)($body['profissao'] ?? ''));
if ($profissao === '' || mb_strlen($profissao) > 100) $erros[] = 'profissao';

$nomeEmpresa = trim((string)($body['nomeEmpresa'] ?? ''));
if ($nomeEmpresa === '' || mb_strlen($nomeEmpresa) > 150) $erros[] = 'nomeEmpresa';

// Data de admissão: o front manda no formato BR "DD/MM/AAAA".
$dataAdmissaoBR  = trim((string)($body['dataAdmissao'] ?? ''));
$dataAdmissaoSQL = null;
if (preg_match('/^(\d{2})\/(\d{2})\/(\d{4})$/', $dataAdmissaoBR, $m)) {
    [, $dia, $mes, $ano] = $m;
    if (checkdate((int)$mes, (int)$dia, (int)$ano)) {
        $dataAdmissaoSQL = sprintf('%04d-%02d-%02d', $ano, $mes, $dia);
    } else {
        $erros[] = 'dataAdmissao';
    }
} else {
    $erros[] = 'dataAdmissao';
}

$email = trim((string)($body['email'] ?? ''));
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || mb_strlen($email) > 150) {
    $erros[] = 'email';
}

// Consentimento (art. 8º da LGPD): o checkbox já é obrigatório no front-end,
// mas isso é só UX — quem grava confia exclusivamente na checagem abaixo,
// porque este endpoint pode ser chamado diretamente sem passar pelo form.
// Recebemos apenas o flag; a VERSÃO da política é definida pelo servidor
// (LGPD_POLITICA_VERSAO_ATUAL), nunca pelo cliente.
$consentimento = ($body['consentimento'] ?? false) === true;
if (!$consentimento) {
    $erros[] = 'consentimento';
}

if (!empty($erros)) {
    http_response_code(422);
    echo json_encode(['ok' => false, 'erro' => 'Dados inválidos', 'campos' => $erros]);
    exit;
}

try {
    $db = getDB();
    $stmt = $db->prepare(
        'INSERT INTO cadastros_financiamento
            (nome_completo, cpf, rg, nome_mae, cep, numero_residencia, profissao,
             nome_empresa, data_admissao, email, ip_origem, consentimento_em, politica_versao)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)'
    );
    $stmt->execute([
        $nomeCompleto,
        $cpf,
        $rg,
        $nomeMae,
        $cep,
        $numeroResidencia,
        $profissao,
        $nomeEmpresa,
        $dataAdmissaoSQL,
        $email,
        $_SERVER['REMOTE_ADDR'] ?? null,
        LGPD_POLITICA_VERSAO_ATUAL,
    ]);

    // Retorna o ID gerado para o front-end usar como referência curta na
    // mensagem do WhatsApp, em vez de reenviar CPF/RG/mãe/endereço em texto puro.
    echo json_encode(['ok' => true, 'id' => (int)$db->lastInsertId()]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['ok' => false, 'erro' => 'Não foi possível salvar agora']);
}