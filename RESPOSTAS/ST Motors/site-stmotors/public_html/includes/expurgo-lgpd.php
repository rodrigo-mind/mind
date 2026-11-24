<?php
define('APP_LOADED', true);
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/db.php';

// Só pode ser executado via linha de comando (cron), nunca via navegador —
// evita que alguém acione o expurgo manualmente disparando a URL.
if (php_sapi_name() !== 'cli') {
    http_response_code(403);
    exit('Acesso negado.');
}

$db = getDB();
$log = [];

try {
    // 1) IP: anonimiza aos 90 dias, mantendo o resto do registro
    //    (a política promete 90 dias só para o IP, não para o registro todo).
    $stmt = $db->prepare(
        "UPDATE simulacoes_financiamento
         SET ip_origem = NULL
         WHERE criado_em < (NOW() - INTERVAL 90 DAY) AND ip_origem IS NOT NULL"
    );
    $stmt->execute();
    $log[] = "IP anonimizado em simulacoes_financiamento: {$stmt->rowCount()} linhas";

    $stmt = $db->prepare(
        "UPDATE cadastros_financiamento
         SET ip_origem = NULL
         WHERE criado_em < (NOW() - INTERVAL 90 DAY) AND ip_origem IS NOT NULL"
    );
    $stmt->execute();
    $log[] = "IP anonimizado em cadastros_financiamento: {$stmt->rowCount()} linhas";

    // 2) Simulações: excluídas após 2 anos, conforme a política (seção 6)
    $stmt = $db->prepare(
        "DELETE FROM simulacoes_financiamento
         WHERE criado_em < (NOW() - INTERVAL 2 YEAR)"
    );
    $stmt->execute();
    $log[] = "Simulações excluídas (>2 anos): {$stmt->rowCount()} linhas";

    // 3) Cadastros completos: excluídos após 5 anos, conforme a política
    $stmt = $db->prepare(
        "DELETE FROM cadastros_financiamento
         WHERE criado_em < (NOW() - INTERVAL 5 YEAR)"
    );
    $stmt->execute();
    $log[] = "Cadastros excluídos (>5 anos): {$stmt->rowCount()} linhas";

} catch (PDOException $e) {
    $log[] = "ERRO: " . $e->getMessage();
}

// 4) Log em arquivo — não em banco, pra não criar mais um lugar com dado
//    pessoal; e sem conteúdo sensível, só contagens e timestamp.
$linha = date('Y-m-d H:i:s') . ' | ' . implode(' | ', $log) . PHP_EOL;
file_put_contents(__DIR__ . '/../logs/expurgo-lgpd.log', $linha, FILE_APPEND);