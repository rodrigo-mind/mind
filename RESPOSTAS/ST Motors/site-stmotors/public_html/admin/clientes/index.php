<?php
/**
 * /admin/clientes
 *
 * Lista consolidada de clientes (simulações + cadastros) agrupados por CPF.
 */

define('ADMIN_LOADED', true);
require_once __DIR__ . '/../includes/guard.php';
require_once __DIR__ . '/../../includes/money.php';
require_once __DIR__ . '/../../includes/db.php';

$csrf = getCsrfToken();

// ── HELPERS ────────────────────────────────────────────────
function maskCpf(?string $cpf): string {
    if (!$cpf || strlen($cpf) !== 11) return $cpf ?: '—';
    return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
}
function maskPhone(?string $tel): string {
    if (!$tel) return '—';
    $d = preg_replace('/\D/', '', $tel);
    if (strlen($d) === 11) return '(' . substr($d, 0, 2) . ') ' . substr($d, 2, 5) . '-' . substr($d, 7);
    if (strlen($d) === 10) return '(' . substr($d, 0, 2) . ') ' . substr($d, 2, 4) . '-' . substr($d, 6);
    return $tel;
}
function fmtMoney($v): string {
    if ($v === null || $v === '') return '—';
    return 'R$ ' . number_format((float) $v, 2, ',', '.');
}
function fmtDate(?string $d, string $format = 'd/m/Y'): string {
    if (!$d) return '—';
    $ts = strtotime($d);
    return $ts ? date($format, $ts) : '—';
}
function h($v): string {
    return htmlspecialchars((string) ($v ?? ''), ENT_QUOTES, 'UTF-8');
}

// Linha da lista de detalhes (rótulo + valor). Valor vazio vira "—" esmaecido.
if (!function_exists('cliLinha')) {
    function cliLinha(string $rotulo, $valor): string {
        $v = ($valor === null || trim((string) $valor) === '') ? '—' : (string) $valor;
        $cls = $v === '—' ? ' class="is-empty"' : '';
        return '<div class="cli-list__row"><dt>' . h($rotulo) . '</dt><dd' . $cls . '>' . h($v) . '</dd></div>';
    }
}
function buildUrl(array $overrides = []): string {
    $params = array_merge($_GET, $overrides);
    foreach ($params as $k => $v) {
        if ($v === null || $v === '') unset($params[$k]);
    }
    return '?' . http_build_query($params);
}
// Escapa caracteres especiais do LIKE (%, _ e \) para que buscas do
// usuário não sejam interpretadas como coringas do SQL.
function likeEscape(string $s): string {
    return str_replace(['\\', '%', '_'], ['\\\\', '\\%', '\\_'], $s);
}
// ── LEITURA DOS FILTROS (GET) ─────────────────────────────
$f_busca      = trim($_GET['busca'] ?? '');
$f_moto       = trim($_GET['moto'] ?? '');
$f_tipo       = $_GET['tipo'] ?? 'todos';           // todos | simulacao | cadastro
$f_ordenar    = $_GET['ordenar'] ?? 'criado_desc';
$page         = max(1, (int) ($_GET['page'] ?? 1));
$porPagina    = 25;

$ordenacoesValidas = ['criado_desc', 'criado_asc', 'nome_asc', 'nome_desc', 'moto_asc', 'moto_desc'];
if (!in_array($f_ordenar, $ordenacoesValidas, true)) $f_ordenar = 'criado_desc';

// ── CONEXÃO ────────────────────────────────────────────────
$db = getDB();

// ── CONSULTA COMBINADA (LEFT JOIN + UNION) ────────────────
$combinedSql = "
    SELECT
        s.id AS sim_id,
        s.nome AS sim_nome,
        s.telefone,
        s.cpf,
        s.data_nascimento,
        s.tem_cnh,
        s.tem_entrada,
        s.valor_entrada,
        s.renda_mensal,
        s.moto_descricao AS moto,
        s.moto_ano,
        s.moto_cor,
        s.moto_preco,
        s.moto2_descricao,
        s.ip_origem AS sim_ip,
        s.criado_em AS sim_criado,
        c.id AS cad_id,
        c.nome_completo AS cad_nome,
        c.email,
        c.rg,
        c.nome_mae,
        c.cep,
        c.numero_residencia,
        c.profissao,
        c.nome_empresa,
        c.data_admissao,
        c.ip_origem AS cad_ip,
        c.criado_em AS cad_criado,
        1 AS tem_sim,
        CASE WHEN c.id IS NOT NULL THEN 1 ELSE 0 END AS tem_cad
    FROM simulacoes_financiamento s
    LEFT JOIN cadastros_financiamento c ON s.cpf = c.cpf

    UNION

    SELECT
        NULL AS sim_id,
        NULL AS sim_nome,
        NULL AS telefone,
        c.cpf,
        NULL AS data_nascimento,
        NULL AS tem_cnh,
        NULL AS tem_entrada,
        NULL AS valor_entrada,
        NULL AS renda_mensal,
        NULL AS moto,
        NULL AS moto_ano,
        NULL AS moto_cor,
        NULL AS moto_preco,
        NULL AS moto2_descricao,
        NULL AS sim_ip,
        NULL AS sim_criado,
        c.id AS cad_id,
        c.nome_completo AS cad_nome,
        c.email,
        c.rg,
        c.nome_mae,
        c.cep,
        c.numero_residencia,
        c.profissao,
        c.nome_empresa,
        c.data_admissao,
        c.ip_origem AS cad_ip,
        c.criado_em AS cad_criado,
        0 AS tem_sim,
        1 AS tem_cad
    FROM cadastros_financiamento c
    LEFT JOIN simulacoes_financiamento s ON s.cpf = c.cpf
    WHERE s.id IS NULL
";

// ── FILTROS (WHERE) ────────────────────────────────────────
$where = [];
$params = [];

if ($f_tipo === 'simulacao') {
    $where[] = 'tem_sim = 1';
} elseif ($f_tipo === 'cadastro') {
    $where[] = 'tem_cad = 1';
}

// Busca por nome (trata NULL; caracteres coringa do LIKE são escapados)
if ($f_busca !== '') {
    // Usa dois placeholders distintos (:busca1 / :busca2) em vez de repetir
    // o mesmo :busca duas vezes. Com PDO em modo de prepared statements
    // nativos (emulação desligada) reutilizar o mesmo parâmetro nomeado
    // mais de uma vez na mesma query causa "SQLSTATE[HY093]: Invalid
    // parameter number" e derruba a página — por isso o filtro de busca
    // (e qualquer filtro combinado com ele, como o de datas) quebrava.
    $where[] = '(COALESCE(sim_nome, \'\') LIKE :busca1 ESCAPE \'\\\\\' OR COALESCE(cad_nome, \'\') LIKE :busca2 ESCAPE \'\\\\\')';
    $buscaVal = '%' . likeEscape($f_busca) . '%';
    $params[':busca1'] = $buscaVal;
    $params[':busca2'] = $buscaVal;
}

// Busca por moto (trata NULL; caracteres coringa do LIKE são escapados)
if ($f_moto !== '') {
    $where[] = 'COALESCE(moto, \'\') LIKE :moto ESCAPE \'\\\\\'';
    $params[':moto'] = '%' . likeEscape($f_moto) . '%';
}

$whereSql = $where ? 'WHERE ' . implode(' AND ', $where) : '';

// ── AGRUPAMENTO POR CPF ────────────────────────────────────
$groupSql = "
    SELECT
        cpf,
        MAX(COALESCE(sim_nome, cad_nome)) AS nome,
        MAX(telefone) AS telefone,
        MAX(email) AS email,
        MAX(renda_mensal) AS renda_mensal,
        MAX(moto) AS moto,
        MAX(moto_ano) AS moto_ano,
        MAX(moto_cor) AS moto_cor,
        MAX(moto_preco) AS moto_preco,
        MAX(moto2_descricao) AS moto2_descricao,
        COALESCE(MAX(sim_ip), MAX(cad_ip)) AS ip_origem,
        GREATEST(COALESCE(MAX(sim_criado), '1970-01-01'), COALESCE(MAX(cad_criado), '1970-01-01')) AS criado_em,
        MAX(tem_sim) AS tem_sim,
        MAX(tem_cad) AS tem_cad,
        -- Campos específicos (agregados)
        MAX(data_nascimento) AS data_nascimento,
        MAX(tem_cnh) AS tem_cnh,
        MAX(tem_entrada) AS tem_entrada,
        MAX(valor_entrada) AS valor_entrada,
        MAX(rg) AS rg,
        MAX(nome_mae) AS nome_mae,
        MAX(cep) AS cep,
        MAX(numero_residencia) AS numero_residencia,
        MAX(profissao) AS profissao,
        MAX(nome_empresa) AS nome_empresa,
        MAX(data_admissao) AS data_admissao,
        MAX(cad_ip) AS cad_ip,
        MAX(cad_criado) AS cad_criado,
        MAX(sim_id) AS sim_id,
        MAX(cad_id) AS cad_id
    FROM ({$combinedSql}) AS combined
    {$whereSql}
    GROUP BY COALESCE(cpf, CONCAT('nocpf_', COALESCE(sim_id, 0), '_', COALESCE(cad_id, 0)))
";

// ── EXPORTAÇÃO CSV ──────────────────────────────────────────
if (isset($_GET['export']) && $_GET['export'] === 'csv') {
    $sql = "SELECT * FROM ({$groupSql}) AS clientes ORDER BY criado_em DESC";
    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="clientes_stmotors_' . date('Y-m-d') . '.csv"');
    $out = fopen('php://output', 'w');
    fputcsv($out, ['CPF', 'Nome', 'Telefone', 'Email', 'Moto', 'Renda mensal', 'IP', 'Criado em', 'Tem simulação', 'Tem cadastro']);
    while ($row = $stmt->fetch()) {
        fputcsv($out, [
            maskCpf($row['cpf']),
            $row['nome'] ?: '—',
            maskPhone($row['telefone']),
            $row['email'] ?: '—',
            $row['moto'] ?: '—',
            $row['renda_mensal'] !== null ? number_format((float) $row['renda_mensal'], 2, ',', '.') : '—',
            $row['ip_origem'] ?: '—',
            $row['criado_em'],
            $row['tem_sim'] ? 'Sim' : 'Não',
            $row['tem_cad'] ? 'Sim' : 'Não',
        ]);
    }
    fclose($out);
    exit;
}

// ── CONTAGEM (mesmo agrupamento da listagem, para a paginação bater) ──
$countSql = "SELECT COUNT(*) AS total FROM ({$groupSql}) AS contagem";
$stmt = $db->prepare($countSql);
$stmt->execute($params);
$totalLinhas = (int) $stmt->fetch()['total'];
$totalPaginas = max(1, (int) ceil($totalLinhas / $porPagina));
$page = min($page, $totalPaginas);
$offset = ($page - 1) * $porPagina;

// ── ORDENAÇÃO ──────────────────────────────────────────────
$orderMap = [
    'criado_desc' => 'criado_em DESC',
    'criado_asc'  => 'criado_em ASC',
    'nome_asc'    => 'nome ASC',
    'nome_desc'   => 'nome DESC',
    'moto_asc'    => 'moto ASC',
    'moto_desc'   => 'moto DESC',
];
$orderSql = $orderMap[$f_ordenar] ?? 'criado_em DESC';

// ── LISTAGEM PAGINADA ──────────────────────────────────────
$sql = "SELECT * FROM ({$groupSql}) AS clientes ORDER BY {$orderSql} LIMIT :limit OFFSET :offset";
$stmt = $db->prepare($sql);
foreach ($params as $k => $v) $stmt->bindValue($k, $v);
$stmt->bindValue(':limit', $porPagina, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$clientes = $stmt->fetchAll();

// ── ESTATÍSTICAS ───────────────────────────────────────────
$stats = [
    'total_simulacoes' => (int) $db->query('SELECT COUNT(*) FROM simulacoes_financiamento')->fetchColumn(),
    'total_cadastros'  => (int) $db->query('SELECT COUNT(*) FROM cadastros_financiamento')->fetchColumn(),
    'ultimos_7d_sim'   => (int) $db->query("SELECT COUNT(*) FROM simulacoes_financiamento WHERE criado_em >= NOW() - INTERVAL 7 DAY")->fetchColumn(),
    'ultimos_7d_cad'   => (int) $db->query("SELECT COUNT(*) FROM cadastros_financiamento WHERE criado_em >= NOW() - INTERVAL 7 DAY")->fetchColumn(),
];
$stats['total_clientes'] = $stats['total_simulacoes'] + $stats['total_cadastros'];

$ultimoLead = $db->query("
    SELECT MAX(criado_em) FROM (
        SELECT criado_em FROM simulacoes_financiamento
        UNION ALL
        SELECT criado_em FROM cadastros_financiamento
    ) t
")->fetchColumn();

// Se algum filtro estiver ativo, a seção de filtros já começa aberta,
// para o usuário ver de imediato o que está sendo aplicado.
$temFiltrosAtivos = $f_busca !== '' || $f_moto !== '' || $f_tipo !== 'todos'
    || $f_ordenar !== 'criado_desc';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Clientes — ST Motors Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/admin/assets/styles/admin.css">
    <link rel="stylesheet" href="/admin/assets/styles/estoque.css">
    <style>
        /* ── Estilos específicos ── */
        .stats-toggle {
            cursor: pointer;
            user-select: none;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 8px 0;
        }
        .stats-toggle .arrow {
            transition: transform 0.25s ease;
            display: inline-block;
            margin-left: 12px;
            font-size: 0.9rem;
            color: var(--color-text-secondary, #5b6058);
        }
        .stats-toggle .arrow.open { transform: rotate(180deg); }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 16px;
            margin-top: 16px;
            padding-bottom: 8px;
        }
        .stats-grid .stat-card {
            background: #ffffff;
            border-radius: 14px;
            padding: 20px 18px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            border: 1px solid #eaece8;
            transition: box-shadow 0.2s;
        }
        .stats-grid .stat-card:hover { box-shadow: 0 4px 16px rgba(0,0,0,0.08); }
        .stats-grid .stat-card .label {
            font-size: .7rem;
            font-weight: 600;
            letter-spacing: .04em;
            text-transform: uppercase;
            color: #6b7068;
            margin-bottom: 4px;
        }
        .stats-grid .stat-card .value {
            font-family: 'Inter', sans-serif;
            font-weight: 700;
            font-size: 1.6rem;
            color: #1c1f1a;
            line-height: 1.2;
        }
        .stats-grid .stat-card .sub {
            font-size: .7rem;
            color: #8b9086;
            margin-top: 4px;
        }
        .stat-card--highlight .value { color: var(--color-primary, #4f9e21); }

        .cli-filters {
            margin-top: 20px;
        }
        .cli-filters form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
            gap: 16px 18px;
            align-items: end;
            margin-top: 16px;
        }
        .cli-field { display: flex; flex-direction: column; gap: 6px; min-width: 0; }
        .cli-field label {
            font-size: .7rem;
            font-weight: 600;
            letter-spacing: .03em;
            text-transform: uppercase;
            color: #6b7068;
        }
        .cli-field input,
        .cli-field select {
            font-family: inherit;
            font-size: .875rem;
            padding: 10px 12px;
            border-radius: 10px;
            border: 1px solid #d8dcd3;
            background: #fafbf9;
            color: #1c1f1a;
            transition: border-color 0.2s, box-shadow 0.2s;
            min-width: 0;
        }
        .cli-field input:focus,
        .cli-field select:focus {
            outline: none;
            border-color: var(--color-primary, #4f9e21);
            box-shadow: 0 0 0 3px rgba(79,158,33,0.12);
            background: #ffffff;
        }
        .cli-filters__actions {
            display: flex;
            gap: 10px;
            grid-column: 1 / -1;
            flex-wrap: wrap;
            margin-top: 4px;
        }

        .cli-table-wrap {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            border: 1px solid #eaece8;
            overflow: hidden;
            margin-top: 20px;
        }
        .cli-table-scroll { overflow-x: auto; max-width: 100%; -webkit-overflow-scrolling: touch; }
        table.cli-table {
            width: 100%;
            min-width: 0;
            border-collapse: collapse;
            font-size: .8125rem;
        }
        .cli-table thead th {
            position: sticky;
            top: 0;
            z-index: 2;
            background: #f8f9f6;
            text-align: left;
            font-size: .7rem;
            font-weight: 700;
            letter-spacing: .04em;
            text-transform: uppercase;
            color: #6b7068;
            padding: 12px 16px;
            white-space: nowrap;
            border-bottom: 1px solid #eaece8;
        }
        .cli-row td {
            padding: 10px 16px;
            border-top: 1px solid #f0f2ed;
            color: #3a3f38;
            white-space: nowrap;
            vertical-align: middle;
            line-height: 1.3;
        }
        .cli-row:hover td { background: #f7f9f5; }
        .cli-row td.cli-col-nome { color: #1c1f1a; font-weight: 600; }

        /* Linha clicável: a linha inteira expande/recolhe o detalhe */
        .cli-row { cursor: pointer; }
        .cli-row td.cli-col-tags { width: 1%; }
        .cli-row td.cli-col-nome { white-space: normal; overflow-wrap: anywhere; }
        .cli-row td.cli-col-cpf  { width: 1%; font-variant-numeric: tabular-nums; }

        /* Selecionado (aberto): fundo levemente azulado na linha e no painel */
        .cli-row.cli-row--open td,
        .cli-row.cli-row--open:hover td { background: #e9f1fd; }
        .cli-row.cli-row--open td:first-child { box-shadow: inset 3px 0 0 #3b82f6; }

        .cli-toggle {
            width: 28px;
            height: 28px;
            border-radius: 8px;
            border: 1px solid #d8dcd3;
            background: #fafbf9;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: #5b6058;
            transition: all 0.15s ease;
        }
        .cli-toggle:hover { background: #eef0eb; border-color: #b8bdb3; }
        .cli-toggle.open { transform: rotate(90deg); color: #2563eb; border-color: #2563eb; background: #ffffff; }

        .cli-badge {
            display: inline-flex;
            align-items: center;
            font-size: .7rem;
            font-weight: 700;
            letter-spacing: .02em;
            padding: 4px 12px;
            border-radius: 999px;
            margin-right: 4px;
        }
        .cli-badge--sim  { background: #e8edfb; color: #1d4ed8; }
        .cli-badge--cad  { background: #e6f3df; color: var(--color-primary, #4f9e21); }

        .cli-row--highlight td {
            background: #eef7e5 !important;
            box-shadow: inset 3px 0 0 var(--color-primary, #4f9e21);
            transition: background 0.2s ease;
        }

        .cli-detail-row td { padding: 0; border-top: none; white-space: normal; }
        .cli-detail {
            display: none;
            padding: 16px 24px 22px;
            background: #f2f7fe;
            border-top: 1px solid #d6e4f8;
        }
        .cli-detail.open { display: block; border-bottom: 1px solid #d6e4f8; }

        /* Lista de dados: rótulo à esquerda, valor à direita, por seção */
        .cli-detail__sections { max-width: 760px; }
        .cli-list__title {
            margin: 18px 0 4px;
            padding-bottom: 6px;
            border-bottom: 2px solid #c9dcf5;
            font-size: .7rem;
            font-weight: 700;
            letter-spacing: .05em;
            text-transform: uppercase;
            color: #2f5fa8;
        }
        .cli-detail__sections > section:first-child .cli-list__title { margin-top: 0; }
        .cli-list { margin: 0; }
        .cli-list__row {
            display: grid;
            grid-template-columns: minmax(110px, 190px) minmax(0, 1fr);
            gap: 2px 16px;
            align-items: baseline;
            padding: 8px 2px;
            border-bottom: 1px solid #dfeaf9;
        }
        .cli-list__row:last-child { border-bottom: none; }
        .cli-list__row dt {
            font-size: .75rem;
            font-weight: 600;
            color: #5d6a7d;
        }
        .cli-list__row dd {
            margin: 0;
            font-size: .875rem;
            font-weight: 500;
            color: #1c1f1a;
            overflow-wrap: anywhere;
        }
        .cli-list__row dd.is-empty { color: #a3abb8; font-weight: 400; }

        .cli-empty { padding: 48px 24px; text-align: center; color: #8b9086; font-size: .9375rem; }

        .cli-resultmeta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
            margin: 18px 0 6px;
            font-size: .8125rem;
            color: #fff;
        }
        .cli-resultmeta strong { color: #fff; }

        .cli-pagination {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 18px 14px;
            flex-wrap: wrap;
            border-top: 1px solid #f0f2ed;
        }
        .cli-page-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 34px;
            height: 34px;
            padding: 0 10px;
            border-radius: 8px;
            font-size: .8125rem;
            font-weight: 600;
            text-decoration: none;
            color: #3a3f38;
            border: 1px solid transparent;
            transition: background 0.15s;
        }
        .cli-page-link:hover { background: #eef0eb; }
        .cli-page-link.active { background: var(--color-primary, #4f9e21); color: #fff; }
        .cli-page-link.disabled { opacity: .35; pointer-events: none; }

        .btn--ghost {
            background: transparent;
            color: #fff;
            border: 1px solid #d8dcd3;
        }
        
        .btn--ghost:hover { background: #f0f2ed; border-color: #b8bdb3; }

        @media (max-width: 700px) {
            .stats-grid { grid-template-columns: 1fr 1fr; }
            .cli-filters form { grid-template-columns: 1fr; }
        }

        /* ── Lista de clientes no celular: cada linha vira um cartão compacto ── */
        @media (max-width: 700px) {
            .cli-table-scroll { overflow-x: visible; }
            .cli-table thead { display: none; }
            .cli-table, .cli-table tbody { display: block; }

            .cli-row {
                display: grid;
                grid-template-columns: 36px minmax(0, 1fr);
                column-gap: 10px;
                row-gap: 4px;
                align-items: center;
                padding: 12px 14px;
                border-top: 1px solid #f0f2ed;
            }
            .cli-table tbody > .cli-row:first-child { border-top: none; }
            .cli-row td {
                display: block;
                padding: 0;
                border-top: none;
                white-space: normal;
                background: transparent;
            }
            .cli-row td.cli-col-toggle { grid-column: 1; grid-row: 1 / span 3; align-self: start; }
            .cli-row td.cli-col-tags   { grid-column: 2; grid-row: 1; width: auto; }
            .cli-row td.cli-col-nome   { grid-column: 2; grid-row: 2; }
            .cli-row td.cli-col-cpf    { grid-column: 2; grid-row: 3; width: auto; color: #6b7068; }

            /* Como a linha deixou de ser tabela, o fundo passa da <td> para a <tr> */
            .cli-row:hover { background: #f7f9f5; }
            .cli-row:hover td,
            .cli-row.cli-row--open td,
            .cli-row.cli-row--open:hover td { background: transparent; }
            .cli-row.cli-row--open,
            .cli-row.cli-row--open:hover { background: #e9f1fd; box-shadow: inset 3px 0 0 #3b82f6; }
            .cli-row.cli-row--open td:first-child { box-shadow: none; }
            .cli-row--highlight { background: #eef7e5; box-shadow: inset 3px 0 0 var(--color-primary, #4f9e21); }
            .cli-row--highlight td { background: transparent !important; box-shadow: none; }

            .cli-detail-row, .cli-detail-row td { display: block; }
            .cli-detail { padding: 14px 14px 18px; }
            .cli-list__row { grid-template-columns: 108px minmax(0, 1fr); gap: 2px 12px; }
        }
    </style>
</head>
<body class="dashboard-page">

<!-- Sidebar -->
  <aside class="sidebar" id="sidebar" aria-label="Menu administrativo">
    <div class="sidebar__logo">
      <img src="/assets/images/logo-header.svg" alt="ST Motors" width="120" height="42">
    </div>

    <nav class="sidebar__nav" aria-label="Navegação do painel">
      <ul class="sidebar__list">
        <li class="sidebar__item">
          <a href="/admin/dashboard.php" class="sidebar__link">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
            Dashboard
          </a>
        </li>
        <li class="sidebar__item">
          <a href="/admin/estoque" class="sidebar__link">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="5" cy="17" r="3"/><circle cx="19" cy="17" r="3"/><path d="M7 17h5l3-5h3"/><path d="M10 12l1.5-3h3"/><path d="M14.5 9h2.5"/><path d="M8 12h4"/></svg>
            Estoque de Motos
          </a>
        </li>
        <li class="sidebar__item">
          <a href="/admin/clientes" class="sidebar__link sidebar__link--active">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            Clientes
          </a>
        </li>
        <li class="sidebar__item">
          <a href="/admin/avaliacoes/index.php" class="sidebar__link">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
            Avaliações Google
          </a>
        </li>
        <li class="sidebar__item">
          <a href="/admin/capacetes" class="sidebar__link">
  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
    <!-- Cúpula externa, queixeira e spoiler aerodinâmico traseiro -->
    <path d="M19 18c1.5-1.5 2.5-3.5 2.5-6.5 0-4.5-3.5-8-8.5-8C8 3.5 5 5 4 8c-.8 2.5-.8 5 .5 7.5l2 2.5C8 19 10 20 12.5 20h2.5c1.5 0 3-1 4-2z" />
    <!-- Visor frontal de proteção com aerodinâmica de corrida -->
    <path d="M4 11h9.5c1.5 0 2-1 2-2.5S14.5 6 12 6H7.5" />
    <!-- Pivô do visor e ventilação -->
    <circle cx="13.5" cy="8.5" r="0.75" />
    <!-- Entrada de ar/linhas de detalhe da queixeira frontal -->
    <path d="M5.5 13.5h2" />
    <path d="M6 15.5h2" />
    <!-- Vinco de aerodinâmica/spoiler traseiro -->
    <path d="M18.5 14c-.5-1-1-2.5-1-2.5" />
  </svg>
  Capacetes
</a>
</li>
      </ul>
    </nav>

    <div class="sidebar__footer">
      <a
        href="/admin/dashboard.php?logout=1&token=<?= htmlspecialchars($csrf, ENT_QUOTES, 'UTF-8') ?>"
        class="sidebar__logout"
        aria-label="Sair do painel"
      >
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
        Sair
      </a>
    </div>
  </aside>

<div class="admin-layout">
    <header class="topbar">
        <button class="topbar__toggle" id="sidebar-toggle" aria-label="Menu" aria-expanded="false" aria-controls="sidebar"><span></span><span></span><span></span></button>
        <h1 class="topbar__title">Clientes</h1>
        <a class="btn btn--primary" style="margin-left:auto" href="<?= h(buildUrl(['export' => 'csv', 'page' => null])) ?>">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
            Exportar CSV
        </a>
    </header>

    <main class="admin-main">
        <div class="admin-content">

            <!-- ── ESTATÍSTICAS (expansível) ── -->
            <section class="cadastro-section" style="margin-bottom:0;">
                <div class="stats-toggle" onclick="toggleStats()">
                    <h2 class="dash-section__title" style="margin:0;">📊 Estatísticas</h2>
                    <span class="arrow" id="stats-arrow">▼</span>
                </div>
                <div id="stats-content" style="display:none;">
                    <div class="stats-grid">
                        <div class="stat-card stat-card--highlight">
                            <div class="label">Total de clientes</div>
                            <div class="value"><?= number_format($stats['total_clientes'], 0, ',', '.') ?></div>
                        </div>
                        <div class="stat-card">
                            <div class="label">Simulações</div>
                            <div class="value"><?= number_format($stats['total_simulacoes'], 0, ',', '.') ?></div>
                        </div>
                        <div class="stat-card">
                            <div class="label">Cadastros completos</div>
                            <div class="value"><?= number_format($stats['total_cadastros'], 0, ',', '.') ?></div>
                        </div>
                        <div class="stat-card">
                            <div class="label">Últimos 7 dias – Sim.</div>
                            <div class="value"><?= number_format($stats['ultimos_7d_sim'], 0, ',', '.') ?></div>
                        </div>
                        <div class="stat-card">
                            <div class="label">Últimos 7 dias – Cad.</div>
                            <div class="value"><?= number_format($stats['ultimos_7d_cad'], 0, ',', '.') ?></div>
                        </div>
                        <div class="stat-card">
                            <div class="label">Último lead</div>
                            <div class="value" style="font-size:1.1rem;"><?= $ultimoLead ? fmtDate($ultimoLead, 'd/m/Y H:i') : '—' ?></div>
                            <div class="sub">registro mais recente</div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ── FILTROS (expansível) ── -->
            <div class="cli-filters cadastro-section" style="margin-bottom:0;">
                <div class="stats-toggle" onclick="toggleFiltros()">
                    <h2 class="dash-section__title" style="margin:0;">🔍 Filtros</h2>
                    <span class="arrow<?= $temFiltrosAtivos ? ' open' : '' ?>" id="filtros-arrow">▼</span>
                </div>
                <div id="filtros-content" style="display:<?= $temFiltrosAtivos ? 'block' : 'none' ?>;">
                <form method="get" action="">
                    <div class="cli-field">
                        <label for="busca">Nome do cliente</label>
                        <input type="text" id="busca" name="busca" placeholder="Buscar por nome…" value="<?= h($f_busca) ?>">
                    </div>
                    <div class="cli-field">
                        <label for="moto">Moto de interesse</label>
                        <input type="text" id="moto" name="moto" placeholder="Buscar por moto…" value="<?= h($f_moto) ?>">
                    </div>
                    <div class="cli-field">
                        <label for="tipo">Tipo de cadastro</label>
                        <select id="tipo" name="tipo">
                            <option value="todos"     <?= $f_tipo === 'todos' ? 'selected' : '' ?>>Todos</option>
                            <option value="simulacao" <?= $f_tipo === 'simulacao' ? 'selected' : '' ?>>Simulação</option>
                            <option value="cadastro"  <?= $f_tipo === 'cadastro' ? 'selected' : '' ?>>Cadastro completo</option>
                        </select>
                    </div>
                    <div class="cli-field">
                        <label for="ir_data">Ir para data</label>
                        <input type="date" id="ir_data" onchange="cliGoToDate(this.value)">
                    </div>
                    <div class="cli-field">
                        <label for="ordenar">Ordenar por</label>
                        <select id="ordenar" name="ordenar">
                            <option value="criado_desc" <?= $f_ordenar === 'criado_desc' ? 'selected' : '' ?>>Mais recentes primeiro</option>
                            <option value="criado_asc"  <?= $f_ordenar === 'criado_asc' ? 'selected' : '' ?>>Mais antigos primeiro</option>
                            <option value="nome_asc"    <?= $f_ordenar === 'nome_asc' ? 'selected' : '' ?>>Nome (A–Z)</option>
                            <option value="nome_desc"   <?= $f_ordenar === 'nome_desc' ? 'selected' : '' ?>>Nome (Z–A)</option>
                            <option value="moto_asc"    <?= $f_ordenar === 'moto_asc' ? 'selected' : '' ?>>Moto (A–Z)</option>
                            <option value="moto_desc"   <?= $f_ordenar === 'moto_desc' ? 'selected' : '' ?>>Moto (Z–A)</option>
                        </select>
                    </div>
                    <div class="cli-filters__actions">
                        <button type="submit" class="btn btn--primary">Aplicar filtros</button>
                        <a href="?" class="btn btn--ghost">Limpar filtros</a>
                    </div>
                </form>
                </div>
            </div>

            <!-- ── RESULTADOS ── -->
            <div class="cli-resultmeta">
                <span><strong><?= number_format($totalLinhas, 0, ',', '.') ?></strong> cliente(s) encontrado(s)</span>
                <span>Página <strong><?= $page ?></strong> de <strong><?= $totalPaginas ?></strong></span>
            </div>

            <div class="cli-table-wrap">
                <div class="cli-table-scroll">
                    <table class="cli-table">
                        <thead>
                            <tr>
                                <th style="width:32px;"></th>
                                <th>Tipo</th>
                                <th>Nome</th>
                                <th>CPF</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($clientes)): ?>
                                <tr>
                                    <td colspan="4" class="cli-empty">Nenhum cliente encontrado com os filtros selecionados.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($clientes as $i => $c): ?>
                                    <tr class="cli-row" id="row-<?= $i ?>" data-target="detail-<?= $i ?>" data-criado="<?= h($c['criado_em'] ? date('Y-m-d', strtotime($c['criado_em'])) : '') ?>" onclick="cliToggle(<?= $i ?>, event)">
                                        <td class="cli-col-toggle">
                                            <button type="button" class="cli-toggle" id="toggle-<?= $i ?>" aria-label="Ver detalhes" aria-expanded="false" aria-controls="detail-<?= $i ?>">
                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 6 15 12 9 18"/></svg>
                                            </button>
                                        </td>
                                        <td class="cli-col-tags">
                                            <?php if ($c['tem_sim']): ?><span class="cli-badge cli-badge--sim">Simulação</span><?php endif; ?>
                                            <?php if ($c['tem_cad']): ?><span class="cli-badge cli-badge--cad">Cadastro</span><?php endif; ?>
                                            <?php if (!$c['tem_sim'] && !$c['tem_cad']): ?>—<?php endif; ?>
                                        </td>
                                        <td class="cli-col-nome"><?= h($c['nome'] ?: '—') ?></td>
                                        <td class="cli-col-cpf"><?= h(maskCpf($c['cpf'])) ?></td>
                                    </tr>
                                    <tr class="cli-detail-row">
                                        <td colspan="4">
                                            <div class="cli-detail" id="detail-<?= $i ?>">
                                                <div class="cli-detail__sections">

                                                    <!-- Sempre começa por: Nome, CPF, Data de nascimento e Telefone -->
                                                    <section>
                                                        <h3 class="cli-list__title">Dados pessoais</h3>
                                                        <dl class="cli-list">
                                                            <?= cliLinha('Nome', $c['nome']) ?>
                                                            <?= cliLinha('CPF', maskCpf($c['cpf'])) ?>
                                                            <?= cliLinha('Data de nascimento', fmtDate($c['data_nascimento'])) ?>
                                                            <?= cliLinha('Telefone', maskPhone($c['telefone'])) ?>
                                                            <?= cliLinha('E-mail', $c['email']) ?>
                                                            <?php if ($c['tem_cad']): ?>
                                                                <?= cliLinha('RG', $c['rg']) ?>
                                                                <?= cliLinha('Nome da mãe', $c['nome_mae']) ?>
                                                            <?php endif; ?>
                                                        </dl>
                                                    </section>

                                                    <?php if ($c['tem_cad']): ?>
                                                    <section>
                                                        <h3 class="cli-list__title">Endereço</h3>
                                                        <dl class="cli-list">
                                                            <?= cliLinha('CEP', $c['cep']) ?>
                                                            <?= cliLinha('Número da residência', $c['numero_residencia']) ?>
                                                        </dl>
                                                    </section>
                                                    <?php endif; ?>

                                                    <?php if ($c['tem_cad'] || $c['tem_sim']): ?>
                                                    <section>
                                                        <h3 class="cli-list__title">Dados profissionais</h3>
                                                        <dl class="cli-list">
                                                            <?php if ($c['tem_cad']): ?>
                                                                <?= cliLinha('Profissão', $c['profissao']) ?>
                                                                <?= cliLinha('Empresa', $c['nome_empresa']) ?>
                                                                <?= cliLinha('Data de admissão', fmtDate($c['data_admissao'])) ?>
                                                            <?php endif; ?>
                                                            <?php if ($c['tem_sim']): ?>
                                                                <?= cliLinha('Renda mensal', $c['renda_mensal'] !== null ? fmtMoney($c['renda_mensal']) : null) ?>
                                                            <?php endif; ?>
                                                        </dl>
                                                    </section>
                                                    <?php endif; ?>

                                                    <?php if ($c['tem_sim']): ?>
                                                    <section>
                                                        <h3 class="cli-list__title">Simulação de financiamento</h3>
                                                        <dl class="cli-list">
                                                            <?= cliLinha('Moto de interesse', $c['moto']) ?>
                                                            <?= cliLinha('Ano da moto', $c['moto_ano']) ?>
                                                            <?= cliLinha('Cor da moto', $c['moto_cor']) ?>
                                                            <?= cliLinha('Preço da moto', fmtMoney($c['moto_preco'])) ?>
                                                            <?= cliLinha('2ª opção de moto', $c['moto2_descricao']) ?>
                                                            <?= cliLinha('Possui CNH', $c['tem_cnh'] ? ucfirst((string) $c['tem_cnh']) : null) ?>
                                                            <?= cliLinha('Vai dar entrada', $c['tem_entrada'] ? ucfirst((string) $c['tem_entrada']) : null) ?>
                                                            <?= cliLinha('Valor de entrada', fmtMoney($c['valor_entrada'])) ?>
                                                        </dl>
                                                    </section>
                                                    <?php endif; ?>

                                                    <section>
                                                        <h3 class="cli-list__title">Registro</h3>
                                                        <dl class="cli-list">
                                                            <?= cliLinha('Criado em', fmtDate($c['criado_em'], 'd/m/Y H:i')) ?>
                                                            <?php if ($c['tem_sim']): ?>
                                                                <?= cliLinha('ID da simulação', '#' . (int) $c['sim_id']) ?>
                                                            <?php endif; ?>
                                                            <?php if ($c['tem_cad']): ?>
                                                                <?= cliLinha('ID do cadastro', '#' . (int) $c['cad_id']) ?>
                                                            <?php endif; ?>
                                                            <?= cliLinha('IP de origem', $c['ip_origem']) ?>
                                                        </dl>
                                                    </section>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <?php if ($totalPaginas > 1): ?>
                    <div class="cli-pagination">
                        <a class="cli-page-link <?= $page <= 1 ? 'disabled' : '' ?>" href="<?= h(buildUrl(['page' => $page - 1])) ?>">‹</a>
                        <?php
                        $inicio = max(1, $page - 2);
                        $fim = min($totalPaginas, $page + 2);
                        for ($p = $inicio; $p <= $fim; $p++):
                        ?>
                            <a class="cli-page-link <?= $p === $page ? 'active' : '' ?>" href="<?= h(buildUrl(['page' => $p])) ?>"><?= $p ?></a>
                        <?php endfor; ?>
                        <a class="cli-page-link <?= $page >= $totalPaginas ? 'disabled' : '' ?>" href="<?= h(buildUrl(['page' => $page + 1])) ?>">›</a>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </main>
</div>

<div class="sidebar-overlay" id="sidebar-overlay"></div>
<script src="/admin/assets/scripts/admin.js" defer></script>
<script>
    function toggleStats() {
        const content = document.getElementById('stats-content');
        const arrow = document.getElementById('stats-arrow');
        if (content.style.display === 'none') {
            content.style.display = 'block';
            arrow.classList.add('open');
        } else {
            content.style.display = 'none';
            arrow.classList.remove('open');
        }
    }

    function toggleFiltros() {
        const content = document.getElementById('filtros-content');
        const arrow = document.getElementById('filtros-arrow');
        if (content.style.display === 'none') {
            content.style.display = 'block';
            arrow.classList.add('open');
        } else {
            content.style.display = 'none';
            arrow.classList.remove('open');
        }
    }

    // Expande/recolhe o detalhe do cliente. A linha inteira é clicável;
    // o botão (seta) continua focável por teclado e o clique dele "sobe"
    // até a linha, então o toggle acontece uma única vez.
    function cliToggle(i, ev) {
        // Não alterna ao selecionar texto com o mouse (ex.: copiar o CPF).
        if (ev && ev.target && ev.target.closest && !ev.target.closest('.cli-toggle')) {
            var sel = window.getSelection ? String(window.getSelection()) : '';
            if (sel.length > 0) return;
        }
        var panel = document.getElementById('detail-' + i);
        var row   = document.getElementById('row-' + i);
        var btn   = document.getElementById('toggle-' + i);
        if (!panel || !row) return;

        var isOpen = panel.classList.toggle('open');
        row.classList.toggle('cli-row--open', isOpen);   // fundo azulado
        if (btn) {
            btn.classList.toggle('open', isOpen);
            btn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        }
    }

    // Rola a lista até a linha cuja data de criação bate com a data
    // escolhida no seletor "Ir para data". Se não houver linha exatamente
    // naquela data (na página/filtro atual), rola até a linha com a data
    // mais próxima. Não faz nenhuma requisição ao servidor — atua só sobre
    // as linhas já carregadas na tela.
    function cliGoToDate(value) {
        if (!value) return;
        var rows = document.querySelectorAll('.cli-row[data-criado]');
        if (!rows.length) return;

        var alvo = new Date(value + 'T00:00:00');
        var melhor = null;
        var melhorDiff = Infinity;

        rows.forEach(function (row) {
            var d = row.getAttribute('data-criado');
            if (!d) return;
            var diff = Math.abs(new Date(d + 'T00:00:00') - alvo);
            if (diff < melhorDiff) {
                melhorDiff = diff;
                melhor = row;
            }
        });

        if (!melhor) return;

        document.querySelectorAll('.cli-row--highlight').forEach(function (r) {
            r.classList.remove('cli-row--highlight');
        });

        melhor.scrollIntoView({ behavior: 'smooth', block: 'center' });
        melhor.classList.add('cli-row--highlight');
        setTimeout(function () {
            melhor.classList.remove('cli-row--highlight');
        }, 2500);
    }
</script>
</body>
</html>