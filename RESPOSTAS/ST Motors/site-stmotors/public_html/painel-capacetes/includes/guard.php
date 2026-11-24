<?php
defined('PAINEL_LOADED') or die(http_response_code(403));

require_once __DIR__ . '/auth.php';

if (!isPainelAuthenticated()) {
    header('Location: /painel-capacetes/login.php');
    exit;
}
