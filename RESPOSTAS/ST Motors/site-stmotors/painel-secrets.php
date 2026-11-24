<?php
// ============================================================
// painel-secrets.php — CREDENCIAIS DO PAINEL DE SÓCIOS
//
// 1. Renomeie este arquivo para "painel-secrets.php"
// 2. Gere o hash de cada senha rodando no terminal (uma vez, local):
//      php -r "echo password_hash('SENHA_AQUI', PASSWORD_DEFAULT) . PHP_EOL;"
// 3. Cole o hash gerado abaixo (nunca a senha em texto puro).
// 4. Envie este arquivo para o servidor UM NÍVEL ACIMA de public_html
//    — a mesma pasta onde já está o db-secrets.php e o admin-secrets.php.
//    Ele fica fora do webroot, então não é acessível por URL.
//
// Pode cadastrar quantos sócios precisar — cada um com seu próprio
// usuário/senha, totalmente independente do login do admin operacional.
// ============================================================

const PAINEL_SOCIOS = [
    'admin' => 'SENHA_EM_PRODUCAO',
];
