<?php
define('PAINEL_LOADED', true);
require_once __DIR__ . '/../includes/guard.php';
require_once __DIR__ . '/../../includes/db.php';
require_once __DIR__ . '/../includes/dados.php';

header('Content-Type: application/json; charset=utf-8');

try {
    $db = getDB();
    $ym = $_GET['ym'] ?? null;

    if ($ym !== null) {
        // Resumo de um mês específico (carregado sob demanda ao expandir a seção)
        if (!preg_match('/^\d{4}-\d{2}$/', $ym)) {
            http_response_code(422);
            echo json_encode(['erro' => 'Mês inválido.']);
            exit;
        }
        [$start, $end] = resolverIntervaloYm($ym);
        echo json_encode(['ym' => $ym, 'resumo' => getResumoFinanceiro($db, $start, $end)]);
        exit;
    }

    // Carga inicial: resumo geral (todo o período) + lista de meses disponíveis
    echo json_encode([
        'geral' => getResumoFinanceiro($db, null, null),
        'meses' => array_map(fn($m) => ['ym' => $m['ym'], 'label' => $m['label']], getMesesComVendas($db)),
    ]);
} catch (PDOException $e) {
    error_log('painel-capacetes/api/vendas.php: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['erro' => 'Erro ao consultar dados financeiros.']);
}
