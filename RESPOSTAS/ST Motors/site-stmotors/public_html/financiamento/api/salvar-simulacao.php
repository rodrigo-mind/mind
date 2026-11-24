<?php
define('APP_LOADED', true);
require_once __DIR__ . '/../../includes/config.php';
require_once __DIR__ . '/../../includes/security.php';
require_once __DIR__ . '/../../includes/db.php';
require_once __DIR__ . '/../../includes/money.php';

// Versão vigente da Política de Privacidade (deve bater com o texto exibido
// em /politica-de-privacidade/ — hoje "julho de 2026"). Definida aqui pelo
// SERVIDOR, não recebida do cliente: assim ninguém consegue forjar uma
// versão de política diferente da que estava realmente no ar.
// TODO: mover para includes/config.php se outros pontos do site também
// precisarem referenciar essa versão, para não duplicar a constante.
define('LGPD_POLITICA_VERSAO_ATUAL', '2026-07');

header('Content-Type: application/json; charset=utf-8');

// Só aceita POST — é um endpoint de escrita.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'erro' => 'Método não permitido']);
    exit;
}

// Lê o corpo JSON enviado pelo fetch() do formulário.
$raw  = file_get_contents('php://input');
$body = json_decode($raw, true);

if (!is_array($body)) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'erro' => 'Corpo da requisição inválido']);
    exit;
}

// Rate limit por IP: barra flood/spam num endpoint público de escrita.
// Usa a própria tabela (sem infra nova) — 5 envios por IP a cada 10 min é
// folgado para uso real e restritivo para automação.
$ipOrigem = $_SERVER['REMOTE_ADDR'] ?? '';
if ($ipOrigem !== '') {
    try {
        $dbCheck = getDB();
        $stmtCheck = $dbCheck->prepare(
            'SELECT COUNT(*) FROM simulacoes_financiamento
             WHERE ip_origem = ? AND criado_em > (NOW() - INTERVAL 10 MINUTE)'
        );
        $stmtCheck->execute([$ipOrigem]);
        if ((int)$stmtCheck->fetchColumn() >= 5) {
            http_response_code(429);
            echo json_encode(['ok' => false, 'erro' => 'Muitas tentativas. Aguarde alguns minutos.']);
            exit;
        }
    } catch (PDOException $e) {
        // Se o banco já está indisponível, deixa seguir — a tentativa de
        // INSERT mais abaixo vai falhar e responder de forma apropriada.
    }
}

/**
 * Valida CPF pelo algoritmo padrão dos dois dígitos verificadores.
 * Recebe string já limpa (só dígitos, 11 caracteres).
 */
function validarCPF(string $cpf): bool
{
    if (strlen($cpf) !== 11) return false;

    // Rejeita sequências com todos os dígitos iguais (000.000.000-00, 111.111.111-11 etc.)
    if (preg_match('/^(\d)\1{10}$/', $cpf)) return false;

    // Primeiro dígito verificador
    $soma = 0;
    for ($i = 0; $i < 9; $i++) {
        $soma += (int)$cpf[$i] * (10 - $i);
    }
    $resto = ($soma * 10) % 11;
    if ($resto >= 10) $resto = 0;
    if ($resto !== (int)$cpf[9]) return false;

    // Segundo dígito verificador
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
 * Validação server-side. O formulário já valida no navegador, mas isso é
 * só conveniência de UX — quem grava no banco confia exclusivamente no que
 * está aqui, porque qualquer pessoa pode chamar este endpoint diretamente
 * sem passar pelo formulário ou pelo JS.
 */
$erros = [];

$nome = trim((string)($body['nome'] ?? ''));
if ($nome === '' || mb_strlen($nome) > 150) {
    $erros[] = 'nome';
}

// CPF: remove máscara e valida os dígitos verificadores no servidor —
// a máscara/checagem do front é só UX, nunca confiar só nela.
$cpf = preg_replace('/\D/', '', (string)($body['cpf'] ?? ''));
if (!validarCPF($cpf)) {
    $erros[] = 'cpf';
}

// Telefone: aceita o que vier mascarado do front e reduz a só dígitos aqui,
// sem confiar que o JS já tenha limpado.
$telefone = preg_replace('/\D/', '', (string)($body['telefone'] ?? ''));
if (strlen($telefone) < 10 || strlen($telefone) > 13) {
    $erros[] = 'telefone';
}

// Data de nascimento: o front manda no formato BR "DD/MM/AAAA".
$dataNascimentoBR = trim((string)($body['dataNascimento'] ?? ''));
$dataNascimentoSQL = null;
if (preg_match('/^(\d{2})\/(\d{2})\/(\d{4})$/', $dataNascimentoBR, $m)) {
    [, $dia, $mes, $ano] = $m;
    if (checkdate((int)$mes, (int)$dia, (int)$ano)) {
        $dataNascimentoSQL = sprintf('%04d-%02d-%02d', $ano, $mes, $dia);
        // Confere maioridade no servidor — o front já barra, mas não confiamos só nisso.
        $idade = (int)date_diff(date_create($dataNascimentoSQL), date_create('today'))->y;
        if ($idade < 18) {
            $erros[] = 'dataNascimento_menor';
        }
    } else {
        $erros[] = 'dataNascimento';
    }
} else {
    $erros[] = 'dataNascimento';
}

$cnh = ($body['cnh'] ?? '') === 'sim' ? 'sim' : (($body['cnh'] ?? '') === 'nao' ? 'nao' : null);
if ($cnh === null) $erros[] = 'cnh';

$entrada = ($body['entrada'] ?? '') === 'sim' ? 'sim' : (($body['entrada'] ?? '') === 'nao' ? 'nao' : null);
if ($entrada === null) $erros[] = 'entrada';

$valorEntrada = null;
if ($entrada === 'sim') {
    $valorEntradaRaw = (string)($body['valorEntrada'] ?? '');
    if ($valorEntradaRaw === '' || $valorEntradaRaw === 'Não informado') {
        $valorEntrada = null; // cliente marcou "sim" mas não preencheu — registramos como não informado
    } else {
        $valorEntrada = precoToFloat($valorEntradaRaw);
    }
}

$rendaRaw = (string)($body['renda'] ?? '');
$renda = precoToFloat($rendaRaw);
if ($renda <= 0) $erros[] = 'renda';

// Moto é intencionalmente opcional — a pessoa pode simular sem ter
// escolhido um modelo específico ainda. Só validamos o tamanho, não a presença.
$motoDescricao = trim((string)($body['moto'] ?? ''));
if (mb_strlen($motoDescricao) > 200) $erros[] = 'moto';
$motoDescricao = $motoDescricao !== '' ? $motoDescricao : null;

$motoSlug  = trim((string)($body['motoSlug'] ?? '')) ?: null;
$motoAno   = trim((string)($body['motoAno'] ?? '')) ?: null;
$motoCor   = trim((string)($body['motoCor'] ?? '')) ?: null;
$motoPrecoRaw = (string)($body['motoPreco'] ?? '');
$motoPreco = $motoPrecoRaw !== '' ? precoToFloat($motoPrecoRaw) : null;

// 2ª opção de moto é só informativa (vai pra mensagem do WhatsApp);
// guardamos como texto solto, sem exigir que exista no estoque.
$moto2Descricao = trim((string)($body['moto2'] ?? '')) ?: null;
if ($moto2Descricao !== null && mb_strlen($moto2Descricao) > 200) {
    $moto2Descricao = mb_substr($moto2Descricao, 0, 200);
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
        'INSERT INTO simulacoes_financiamento
            (nome, cpf, telefone, data_nascimento, tem_cnh, tem_entrada, valor_entrada, renda_mensal,
             moto_slug, moto_descricao, moto_ano, moto_cor, moto_preco, moto2_descricao, ip_origem,
             consentimento_em, politica_versao)
         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)'
    );
    $stmt->execute([
        $nome,
        $cpf,
        $telefone,
        $dataNascimentoSQL,
        $cnh,
        $entrada,
        $valorEntrada,
        $renda,
        $motoSlug,
        $motoDescricao,
        $motoAno,
        $motoCor,
        $motoPreco,
        $moto2Descricao,
        $_SERVER['REMOTE_ADDR'] ?? null,
        LGPD_POLITICA_VERSAO_ATUAL,
    ]);

    // Retorna o ID gerado para o front-end usar como referência curta na
    // mensagem do WhatsApp, em vez de reenviar CPF/renda/etc em texto puro.
    echo json_encode(['ok' => true, 'id' => (int)$db->lastInsertId()]);
} catch (PDOException $e) {
    // Não vazar detalhe de erro de banco para o cliente.
    http_response_code(500);
    echo json_encode(['ok' => false, 'erro' => 'Não foi possível salvar agora']);
}