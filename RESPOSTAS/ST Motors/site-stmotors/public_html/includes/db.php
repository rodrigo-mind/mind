<?php
// ============================================================
// CONFIGURAÇÕES DO BANCO
//
// As credenciais reais NÃO ficam aqui — ficam em db-secrets.php,
// um nível ACIMA de public_html (fora do webroot, inacessível por URL).
// Veja o cabeçalho de db-secrets.php para onde colocá-lo na Hostinger.
// ============================================================

$secretsPath = __DIR__ . '/../../db-secrets.php';
if (!is_file($secretsPath)) {
    http_response_code(500);
    error_log('db-secrets.php não encontrado em: ' . $secretsPath);
    die('Erro de configuração do servidor. Contate o administrador.');
}
require_once $secretsPath;

function getDB(): PDO {
    static $pdo = null;

    if ($pdo !== null) return $pdo;

    $dsn = sprintf(
        'mysql:host=%s;dbname=%s;charset=%s',
        DB_HOST, DB_NAME, DB_CHARSET
    );

    $pdo = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);

    return $pdo;
}