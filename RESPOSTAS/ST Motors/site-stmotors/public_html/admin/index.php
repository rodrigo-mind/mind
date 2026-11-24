<?php

/**
 * admin/index.php
 *
 * Ponto de entrada do painel administrativo.
 * Redireciona para o dashboard se autenticado,
 * ou para o login caso contrário.
 *
 * Integrado com admin/includes/auth.php
 */

define('ADMIN_LOADED', true);

require_once __DIR__ . '/includes/auth.php';

if (isAuthenticated()) {
    header('Location: /admin/dashboard.php');
} else {
    header('Location: /admin/login.php');
}

exit;