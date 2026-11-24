<?php
define('PAINEL_LOADED', true);
require_once __DIR__ . '/../includes/guard.php';
require_once __DIR__ . '/../../includes/db.php';
require_once __DIR__ . '/../includes/dados.php';

header('Content-Type: application/json; charset=utf-8');

$busca   = trim($_GET['busca'] ?? '');
$filtro  = $_GET['filtro'] ?? '';
$ordenar = $_GET['ordenar'] ?? 'mais_lucrativo';
$ym      = $_GET['ym'] ?? 'tudo';

$filtrosValidos = ['', 'estoque', 'sem_estoque'];
$ordenarValidos = ['mais_lucrativo', 'mais_vendido', 'margem'];

if (!in_array($filtro, $filtrosValidos, true))  $filtro  = '';
if (!in_array($ordenar, $ordenarValidos, true)) $ordenar = 'mais_lucrativo';
if ($ym !== 'tudo' && !preg_match('/^\d{4}-\d{2}$/', $ym)) $ym = 'tudo';

try {
    $db = getDB();
    [$start, $end] = resolverIntervaloYm($ym);

    $lista = getDesempenhoCapacetes($db, $start, $end);
    $margemMedia = margemMediaGeral($lista);
    $lista = filtrarCapacetes($lista, $busca ?: null, $filtro ?: null, $ordenar);

    echo json_encode([
        'capacetes'    => $lista,
        'margem_media' => $margemMedia,
    ]);
} catch (PDOException $e) {
    error_log('painel-capacetes/api/capacetes.php: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['erro' => 'Erro ao consultar capacetes.']);
}
