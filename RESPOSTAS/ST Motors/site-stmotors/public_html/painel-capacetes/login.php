<?php
define('PAINEL_LOADED', true);
require_once __DIR__ . '/includes/auth.php';

// Já autenticado — redireciona direto
if (isPainelAuthenticated()) {
    header('Location: /painel-capacetes/index.php');
    exit;
}

$error   = '';
$locked  = false;
$lockout = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token    = $_POST['csrf_token'] ?? '';
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (!validatePainelCsrfToken($token)) {
        $error = 'Requisição inválida. Tente novamente.';
    } elseif (isPainelLockedOut()) {
        $locked  = true;
        $lockout = painelLockoutRemainingSeconds();
    } elseif (empty($username) || empty($password)) {
        $error = 'Preencha todos os campos.';
    } elseif (attemptPainelLogin($username, $password)) {
        header('Location: /painel-capacetes/index.php');
        exit;
    } else {
        if (isPainelLockedOut()) {
            $locked  = true;
            $lockout = painelLockoutRemainingSeconds();
        } else {
            $error = 'Usuário ou senha incorretos.';
        }
    }
}

$csrf = getPainelCsrfToken();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login — Painel Venda Capacetes · ST Motors</title>
  <meta name="robots" content="noindex, nofollow">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/painel-capacetes/assets/styles/painel.css?v=4">
</head>
<body class="login-page">

  <div class="login-wrapper">
    <div class="login-card">

      <div class="login-logo">
        <img src="/assets/images/logo-header.svg" alt="ST Motors" width="140" height="48">
        <span class="login-logo__label">Painel Venda Capacetes</span>
      </div>

      <?php if ($locked): ?>
        <div class="alert alert--warning" role="alert">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
          Muitas tentativas. Aguarde <strong id="lockout-timer" data-lockout-seconds="<?= (int)$lockout ?>"><?= $lockout ?></strong> segundos.
        </div>
      <?php elseif ($error): ?>
        <div class="alert alert--error" role="alert">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
          <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
        </div>
      <?php endif; ?>

      <form class="login-form" method="POST" action="/painel-capacetes/login.php" novalidate>
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf, ENT_QUOTES, 'UTF-8') ?>">

        <div class="form-group">
          <label for="username" class="form-label">Usuário</label>
          <div class="input-wrapper">
            <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            <input type="text" id="username" name="username" class="form-input" autocomplete="username" required <?= $locked ? 'disabled' : '' ?>>
          </div>
        </div>

        <div class="form-group">
          <label for="password" class="form-label">Senha</label>
          <div class="input-wrapper">
            <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            <input type="password" id="password" name="password" class="form-input" autocomplete="current-password" required <?= $locked ? 'disabled' : '' ?>>
            <button type="button" class="input-toggle-password" aria-label="Mostrar/ocultar senha" tabindex="-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </button>
          </div>
        </div>

        <button type="submit" class="btn btn--primary btn--full" <?= $locked ? 'disabled' : '' ?>>
          Entrar
        </button>
      </form>

    </div>
  </div>

  <script src="/painel-capacetes/assets/scripts/painel.js?v=4" defer></script>

</body>
</html>
