<?php
defined('PAINEL_LOADED') or die(http_response_code(403));

// ============================================================
// CREDENCIAIS
//
// Ficam FORA do webroot, um nível acima de public_html — igual ao
// padrão já usado por admin-secrets.php e db-secrets.php.
// Caminho final esperado no servidor (Hostinger):
//   /home/USUARIO/painel-secrets.php   (um nível acima de public_html)
//
// Este arquivo é INDEPENDENTE de admin-secrets.php: o painel de sócios
// usa suas próprias credenciais, sem nenhuma relação com o login do
// admin operacional. Veja painel-secrets.example.php neste pacote.
// ============================================================
$secretsPath = __DIR__ . '/../../../painel-secrets.php';
if (!is_file($secretsPath)) {
    http_response_code(500);
    error_log('painel-secrets.php não encontrado em: ' . $secretsPath);
    die('Erro de configuração do servidor. Contate o administrador.');
}
require_once $secretsPath;

// ============================================================
// CONFIGURAÇÕES DE SESSÃO
// ============================================================
const PAINEL_SESSION_LIFETIME   = 3600;   // 1 hora
const PAINEL_SESSION_NAME       = 'stm_socios';
const PAINEL_MAX_LOGIN_ATTEMPTS = 5;
const PAINEL_LOCKOUT_TIME       = 900;    // 15 minutos

function startPainelSession(): void {
    if (session_status() === PHP_SESSION_NONE) {
        session_name(PAINEL_SESSION_NAME);
        session_set_cookie_params([
            'lifetime' => 0,
            'path'     => '/painel-capacetes/',
            'secure'   => true,
            'httponly' => true,
            'samesite' => 'Strict',
        ]);
        session_start();
    }
}

function isPainelAuthenticated(): bool {
    startPainelSession();

    if (empty($_SESSION['socio_logged_in'])) return false;
    if (empty($_SESSION['socio_last_activity'])) return false;
    if (time() - $_SESSION['socio_last_activity'] > PAINEL_SESSION_LIFETIME) {
        destroyPainelSession();
        return false;
    }
    if (empty($_SESSION['socio_ip']) || $_SESSION['socio_ip'] !== $_SERVER['REMOTE_ADDR']) {
        destroyPainelSession();
        return false;
    }

    $_SESSION['socio_last_activity'] = time();
    regeneratePainelSessionId();
    return true;
}

/**
 * Verifica usuário/senha contra a lista de sócios em painel-secrets.php.
 * PAINEL_SOCIOS é um array associativo: ['usuario' => 'hash_bcrypt', ...]
 * Permite ter mais de um sócio com login próprio, sem misturar com o admin.
 */
function attemptPainelLogin(string $username, string $password): bool {
    startPainelSession();

    if (isPainelLockedOut()) return false;

    $socios = defined('PAINEL_SOCIOS') ? PAINEL_SOCIOS : [];
    $validUser = false;
    $storedHash = null;

    foreach ($socios as $socioUser => $hash) {
        if (hash_equals((string)$socioUser, $username)) {
            $validUser  = true;
            $storedHash = $hash;
            break;
        }
    }

    // Sempre roda password_verify mesmo se usuário não existir,
    // para não vazar timing de "usuário existe / não existe".
    $dummyHash = '$2y$12$abcdefghijklmnopqrstuuVYlXk0lZ0lZ0lZ0lZ0lZ0lZ0lZ0lZ0e';
    $validPass = password_verify($password, $storedHash ?? $dummyHash);

    if ($validUser && $validPass) {
        resetPainelLoginAttempts();
        session_regenerate_id(true);

        $_SESSION['socio_logged_in']     = true;
        $_SESSION['socio_username']      = $username;
        $_SESSION['socio_last_activity'] = time();
        $_SESSION['socio_ip']            = $_SERVER['REMOTE_ADDR'];
        $_SESSION['socio_token']         = bin2hex(random_bytes(32));

        return true;
    }

    incrementPainelLoginAttempts();
    return false;
}

function destroyPainelSession(): void {
    startPainelSession();
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $p = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $p['path'], $p['domain'], $p['secure'], $p['httponly']
        );
    }
    session_destroy();
}

function isPainelLockedOut(): bool {
    $attempts = $_SESSION['socio_login_attempts'] ?? 0;
    $lastTime = $_SESSION['socio_login_last_attempt'] ?? 0;

    if ($attempts >= PAINEL_MAX_LOGIN_ATTEMPTS) {
        if (time() - $lastTime < PAINEL_LOCKOUT_TIME) return true;
        resetPainelLoginAttempts();
    }
    return false;
}

function painelLockoutRemainingSeconds(): int {
    $lastTime  = $_SESSION['socio_login_last_attempt'] ?? 0;
    $remaining = PAINEL_LOCKOUT_TIME - (time() - $lastTime);
    return max(0, (int)$remaining);
}

function incrementPainelLoginAttempts(): void {
    $_SESSION['socio_login_attempts']     = ($_SESSION['socio_login_attempts'] ?? 0) + 1;
    $_SESSION['socio_login_last_attempt'] = time();
}

function resetPainelLoginAttempts(): void {
    unset($_SESSION['socio_login_attempts'], $_SESSION['socio_login_last_attempt']);
}

function regeneratePainelSessionId(): void {
    if (!isset($_SESSION['socio_last_regeneration'])) {
        $_SESSION['socio_last_regeneration'] = time();
        return;
    }
    if (time() - $_SESSION['socio_last_regeneration'] > 300) {
        session_regenerate_id(true);
        $_SESSION['socio_last_regeneration'] = time();
    }
}

function getPainelCsrfToken(): string {
    startPainelSession();
    if (empty($_SESSION['socio_csrf_token'])) {
        $_SESSION['socio_csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['socio_csrf_token'];
}

function validatePainelCsrfToken(string $token): bool {
    return isset($_SESSION['socio_csrf_token']) && hash_equals($_SESSION['socio_csrf_token'], $token);
}
