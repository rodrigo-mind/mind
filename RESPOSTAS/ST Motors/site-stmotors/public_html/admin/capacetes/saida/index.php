<?php
/**
 * /admin/capacetes/saida
 *
 * Saídas de caixa dos capacetes (dinheiro retirado do caixa).
 *
 * Cada saída guarda: valor, motivo (Compra de capacete | Outros),
 * observações (opcional), data/hora, quem registrou e status.
 *
 * Obrigatórios: valor e motivo. Observações é opcional.
 *
 * "Cancelar" uma saída é lógico (padrão das vendas): a linha nunca é
 * apagada, só marcada como CANCELADA, e deixa de entrar nas somas.
 *
 * Requer a tabela `capacete_saidas` (script capacete_saidas.sql).
 * Os mesmos dados alimentam o Painel dos sócios (/painel-capacetes).
 */

define('ADMIN_LOADED', true);
require_once __DIR__ . '/../../includes/guard.php';
require_once __DIR__ . '/../../../includes/money.php';
require_once __DIR__ . '/../../../includes/db.php';

// Fuso fixo: o servidor roda em UTC e a data da saída deve ser a de São Paulo.
date_default_timezone_set('America/Sao_Paulo');

if (!function_exists('h')) {
    function h($v): string {
        return htmlspecialchars((string) ($v ?? ''), ENT_QUOTES, 'UTF-8');
    }
}

const SAIDA_OBS_MAX   = 500;
const SAIDA_VALOR_MAX = 99999999.99;

const MOTIVOS_SAIDA = [
    'COMPRA_CAPACETE' => 'Compra de capacete',
    'OUTROS'          => 'Outros',
];

const MESES_PT_SAIDA = [
    '01' => 'Janeiro', '02' => 'Fevereiro', '03' => 'Março',    '04' => 'Abril',
    '05' => 'Maio',    '06' => 'Junho',     '07' => 'Julho',    '08' => 'Agosto',
    '09' => 'Setembro','10' => 'Outubro',   '11' => 'Novembro', '12' => 'Dezembro',
];

$csrf    = getCsrfToken();
$erro    = '';
$sucesso = $_SESSION['capacetes_flash_sucesso'] ?? '';
unset($_SESSION['capacetes_flash_sucesso']);

// Identificação de quem registrou (ajuste se sua sessão usar outra chave).
$usuarioId = $_SESSION['usuario_id'] ?? $_SESSION['user_id'] ?? null;
$usuarioNome = $_SESSION['admin_username'] ?? $_SESSION['username'] ?? $_SESSION['usuario'] ?? null;
if (!is_string($usuarioNome) || trim($usuarioNome) === '') {
    $usuarioNome = $usuarioId ? 'admin #' . (int) $usuarioId : 'admin';
}
$usuarioNome = mb_substr($usuarioNome, 0, 50);

// Valores digitados (para repopular o formulário quando há erro).
$old = ['valor' => '', 'motivo' => '', 'observacoes' => ''];

// ============================================================
// POST — registrar ou cancelar
// ============================================================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!validateCsrfToken($_POST['csrf_token'] ?? '')) {
        $erro = 'Requisição inválida. Recarregue a página e tente novamente.';
    } else {
        $db   = getDB();
        $acao = $_POST['acao'] ?? '';

        // ── Registrar nova saída ──────────────────────────────
        if ($acao === 'registrar') {
            $old['valor']       = trim($_POST['valor'] ?? '');
            $old['motivo']      = trim($_POST['motivo'] ?? '');
            $old['observacoes'] = trim($_POST['observacoes'] ?? '');

            try {
                $valor = round(precoToFloat($old['valor']), 2);

                if ($old['valor'] === '' || $valor <= 0) {
                    throw new RuntimeException('Informe o valor da saída (maior que zero).');
                }
                if ($valor > SAIDA_VALOR_MAX) {
                    throw new RuntimeException('Valor acima do limite permitido.');
                }
                if (!array_key_exists($old['motivo'], MOTIVOS_SAIDA)) {
                    throw new RuntimeException('Selecione o motivo da saída.');
                }
                if (mb_strlen($old['observacoes']) > SAIDA_OBS_MAX) {
                    throw new RuntimeException('Observações muito longas (máximo ' . SAIDA_OBS_MAX . ' caracteres).');
                }

                $obs = $old['observacoes'] === '' ? null : $old['observacoes'];

                $db->prepare(
                    'INSERT INTO capacete_saidas (valor, motivo, observacoes, data_saida, usuario)
                     VALUES (?, ?, ?, ?, ?)'
                )->execute([
                    number_format($valor, 2, '.', ''),
                    $old['motivo'],
                    $obs,
                    date('Y-m-d H:i:s'),
                    $usuarioNome,
                ]);

                $_SESSION['capacetes_flash_sucesso'] =
                    'Saída #' . (int) $db->lastInsertId() . ' de R$ ' . precoExibir($valor) . ' registrada com sucesso.';
                header('Location: index.php');
                exit;

            } catch (RuntimeException $e) {
                $erro = $e->getMessage();
            } catch (Throwable $e) {
                error_log('admin/capacetes/saida: ' . $e->getMessage());
                $erro = 'Não foi possível registrar a saída. Verifique se a tabela capacete_saidas foi criada.';
            }
        }

        // ── Cancelar saída (lógico) ───────────────────────────
        if ($acao === 'cancelar') {
            $saidaId = (int) ($_POST['id'] ?? 0);
            try {
                if ($saidaId <= 0) throw new RuntimeException('Saída inválida.');

                $st = $db->prepare(
                    "UPDATE capacete_saidas
                     SET status = 'CANCELADA', cancelado_em = ?, cancelado_por = ?
                     WHERE id = ? AND status = 'ATIVA'"
                );
                $st->execute([date('Y-m-d H:i:s'), $usuarioNome, $saidaId]);

                if ($st->rowCount() === 0) {
                    throw new RuntimeException('Saída não encontrada ou já cancelada.');
                }

                $_SESSION['capacetes_flash_sucesso'] = 'Saída #' . $saidaId . ' cancelada.';
                header('Location: index.php' . (isset($_GET['ym']) ? '?ym=' . urlencode((string) $_GET['ym']) : ''));
                exit;

            } catch (RuntimeException $e) {
                $erro = $e->getMessage();
            } catch (Throwable $e) {
                error_log('admin/capacetes/saida: ' . $e->getMessage());
                $erro = 'Não foi possível cancelar a saída.';
            }
        }
    }
}

// ============================================================
// LISTAGEM (filtro por mês: ?ym=YYYY-MM ou "tudo")
// ============================================================
$db = getDB();

$ym = $_GET['ym'] ?? 'tudo';
if ($ym !== 'tudo' && !preg_match('/^\d{4}-(0[1-9]|1[0-2])$/', $ym)) $ym = 'tudo';

$where  = '';
$params = [];
if ($ym !== 'tudo') {
    $inicio = DateTime::createFromFormat('Y-m-d H:i:s', $ym . '-01 00:00:00');
    $fim    = (clone $inicio)->modify('last day of this month')->setTime(23, 59, 59);
    $where  = ' AND data_saida BETWEEN ? AND ?';
    $params = [$inicio->format('Y-m-d H:i:s'), $fim->format('Y-m-d H:i:s')];
}

$saidas  = [];
$porMotivo = [];
$meses   = [];
$tabelaOk = true;

try {
    $st = $db->prepare("SELECT * FROM capacete_saidas WHERE 1 = 1 {$where} ORDER BY data_saida DESC, id DESC LIMIT 300");
    $st->execute($params);
    $saidas = $st->fetchAll();

    $st = $db->prepare(
        "SELECT motivo, COUNT(*) AS qtd, COALESCE(SUM(valor), 0) AS total
         FROM capacete_saidas
         WHERE status = 'ATIVA' {$where}
         GROUP BY motivo"
    );
    $st->execute($params);
    foreach ($st->fetchAll() as $r) {
        $porMotivo[$r['motivo']] = ['qtd' => (int) $r['qtd'], 'total' => (float) $r['total']];
    }

    $meses = $db->query(
        "SELECT DISTINCT DATE_FORMAT(data_saida, '%Y-%m') AS ym FROM capacete_saidas ORDER BY ym DESC"
    )->fetchAll(PDO::FETCH_COLUMN);
} catch (Throwable $e) {
    error_log('admin/capacetes/saida (listagem): ' . $e->getMessage());
    $tabelaOk = false;
    if ($erro === '') {
        $erro = 'Não foi possível carregar as saídas. Verifique se a tabela capacete_saidas foi criada.';
    }
}

$totalGeral    = array_sum(array_column($porMotivo, 'total'));
$totalQtd      = array_sum(array_column($porMotivo, 'qtd'));
$totalCompra   = $porMotivo['COMPRA_CAPACETE']['total'] ?? 0.0;
$totalOutros   = $porMotivo['OUTROS']['total'] ?? 0.0;

function labelMes(string $ym): string {
    [$a, $m] = explode('-', $ym);
    return (MESES_PT_SAIDA[$m] ?? $m) . '/' . $a;
}
function fmtDataHoraSaida(?string $s): string {
    if (!$s) return '';
    $dt = DateTime::createFromFormat('Y-m-d H:i:s', $s);
    return $dt ? $dt->format('d/m/Y H:i') : $s;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saídas de Caixa — Capacetes — ST Motors Admin</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/admin/assets/styles/admin.css">
    <link rel="stylesheet" href="/admin/assets/styles/estoque.css">
    <link rel="stylesheet" href="/admin/assets/styles/capacetes-estoque.css">
    <link rel="stylesheet" href="/admin/assets/styles/capacetes-venda.css">
    <style>
        /* Saídas de caixa — estilos próprios da página (namespace "sd-") */
        .sd-summary { display: flex; flex-wrap: wrap; gap: 14px; }
        .sd-stat {
            flex: 1 1 180px;
            background: #fff;
            border: 1px solid #e5e7eb;
            border-left: 3px solid var(--sd-accent, #94a3b8);
            border-radius: 10px;
            padding: 14px 16px;
            min-width: 0;
        }
        .sd-stat--total  { --sd-accent: #dc2626; }
        .sd-stat--compra { --sd-accent: #2563eb; }
        .sd-stat--outros { --sd-accent: #d97706; }
        .sd-stat__label { font-size: .72rem; font-weight: 700; text-transform: uppercase; letter-spacing: .04em; color: #94a3b8; }
        .sd-stat__value { font-size: 1.4rem; font-weight: 700; color: #0f172a; margin-top: 4px; line-height: 1.2; word-break: break-word; }
        .sd-stat__count { font-size: .78rem; color: #94a3b8; margin-top: 2px; }

        .sd-form-card { max-width: 640px; }
        .sd-form-card textarea { resize: vertical; min-height: 76px; }

        .sd-filtro { display: flex; align-items: center; gap: 10px; margin: 8px 0 16px; flex-wrap: wrap; }
        .sd-filtro label { font-size: .84rem; font-weight: 600; color: #64748b; }
        .sd-filtro select { width: auto; min-width: 180px; }

        .sd-list { background: #fff; border: 1px solid #e5e7eb; border-radius: 12px; overflow: hidden; }
        .sd-row { display: flex; align-items: flex-start; justify-content: space-between; gap: 14px; padding: 14px 18px; }
        .sd-row + .sd-row { border-top: 1px solid #f1f5f9; }
        .sd-row__info { min-width: 0; display: flex; flex-direction: column; gap: 3px; }
        .sd-row__titulo { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; font-size: .93rem; font-weight: 600; color: #0f172a; }
        .sd-badge { font-size: .68rem; font-weight: 700; color: #fff; padding: 2px 9px; border-radius: 999px; white-space: nowrap; }
        .sd-badge--compra { background: #2563eb; }
        .sd-badge--outros { background: #d97706; }
        .sd-badge--cancelada { background: #6b7280; }
        .sd-row__obs { font-size: .85rem; color: #475569; overflow-wrap: anywhere; white-space: pre-line; }
        .sd-row__meta { font-size: .76rem; color: #94a3b8; }
        .sd-row__lado { display: flex; flex-direction: column; align-items: flex-end; gap: 8px; flex: 0 0 auto; }
        .sd-row__valor { font-size: 1rem; font-weight: 700; color: #dc2626; white-space: nowrap; }
        .sd-btn-cancelar {
            appearance: none; border: 0; border-radius: 8px; padding: 6px 12px;
            font-family: inherit; font-size: .78rem; font-weight: 600; cursor: pointer;
            background: #fef2f2; color: #dc2626; transition: background .12s;
        }
        .sd-btn-cancelar:hover { background: #fee2e2; }
        .sd-row--cancelada .sd-row__valor,
        .sd-row--cancelada .sd-row__titulo { color: #94a3b8; text-decoration: line-through; }
        .sd-row--cancelada .sd-badge { text-decoration: none; }

        @media (max-width: 640px) {
            .sd-stat { flex: 1 1 calc(50% - 7px); padding: 12px 14px; }
            .sd-stat__value { font-size: 1.2rem; }
            .sd-row { padding: 12px 14px; }
        }
        @media (max-width: 380px) {
            .sd-stat { flex: 1 1 100%; }
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
          <a href="/admin/clientes" class="sidebar__link">
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
          <a href="/admin/capacetes" class="sidebar__link sidebar__link--active">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M19 18c1.5-1.5 2.5-3.5 2.5-6.5 0-4.5-3.5-8-8.5-8C8 3.5 5 5 4 8c-.8 2.5-.8 5 .5 7.5l2 2.5C8 19 10 20 12.5 20h2.5c1.5 0 3-1 4-2z" />
              <path d="M4 11h9.5c1.5 0 2-1 2-2.5S14.5 6 12 6H7.5" />
              <circle cx="13.5" cy="8.5" r="0.75" />
              <path d="M5.5 13.5h2" />
              <path d="M6 15.5h2" />
              <path d="M18.5 14c-.5-1-1-2.5-1-2.5" />
            </svg>
            Capacetes
          </a>
        </li>
      </ul>
    </nav>

    <div class="sidebar__footer">
      <a
        href="/admin/dashboard.php?logout=1&token=<?= h($csrf) ?>"
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
        <h1 class="topbar__title">Saídas de Caixa</h1>
        <a href="../" class="btn btn--ghost-dark" style="margin-left:auto">← Capacetes</a>
    </header>

    <main class="admin-main" id="main-content">
        <div class="admin-content">

            <?php if ($sucesso): ?>
                <div class="alert alert--success"><?= h($sucesso) ?></div>
            <?php endif; ?>
            <?php if ($erro): ?>
                <div class="alert alert--error"><?= h($erro) ?></div>
            <?php endif; ?>

            <!-- ============ NOVA SAÍDA ============ -->
            <section class="cadastro-section sd-form-card">
                <h2 class="dash-section__title">Nova saída</h2>
                <p class="dash-section__subtitle">Registre o dinheiro retirado do caixa. Valor e motivo são obrigatórios.</p>

                <form method="POST" action="index.php" class="cadastro-form" id="saida-form" autocomplete="off" novalidate>
                    <input type="hidden" name="csrf_token" value="<?= h($csrf) ?>">
                    <input type="hidden" name="acao" value="registrar">

                    <div class="modal-row">
                        <div class="form-group">
                            <label class="form-label" for="saida-valor">Valor (R$) <span class="required">*</span></label>
                            <input type="text" name="valor" id="saida-valor" class="form-input" required inputmode="decimal" placeholder="0,00" value="<?= h($old['valor']) ?>">
                            <span class="form-hint form-hint--erro" id="saida-valor-erro" hidden>Informe um valor maior que zero.</span>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="saida-motivo">Motivo <span class="required">*</span></label>
                            <select name="motivo" id="saida-motivo" class="form-input" required>
                                <option value="" <?= $old['motivo'] === '' ? 'selected' : '' ?> disabled>Selecione…</option>
                                <?php foreach (MOTIVOS_SAIDA as $chave => $rotulo): ?>
                                    <option value="<?= h($chave) ?>" <?= $old['motivo'] === $chave ? 'selected' : '' ?>><?= h($rotulo) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="form-hint form-hint--erro" id="saida-motivo-erro" hidden>Selecione o motivo.</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="saida-obs">Observações <span class="form-hint">(opcional)</span></label>
                        <textarea name="observacoes" id="saida-obs" class="form-input" rows="3" maxlength="<?= SAIDA_OBS_MAX ?>" placeholder="Ex.: pagamento do lote de capacetes do fornecedor X"><?= h($old['observacoes']) ?></textarea>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn--primary" id="saida-btn" <?= $tabelaOk ? '' : 'disabled' ?>>Registrar saída</button>
                    </div>
                </form>
            </section>

            <!-- ============ RESUMO ============ -->
            <section class="cadastro-section">
                <h2 class="dash-section__title">Resumo<?= $ym !== 'tudo' ? ' — ' . h(labelMes($ym)) : ' — todo o período' ?></h2>
                <div class="sd-summary">
                    <div class="sd-stat sd-stat--total">
                        <div class="sd-stat__label">Total de saídas</div>
                        <div class="sd-stat__value">R$ <?= precoExibir($totalGeral) ?></div>
                        <div class="sd-stat__count"><?= (int) $totalQtd ?> saída(s)</div>
                    </div>
                    <div class="sd-stat sd-stat--compra">
                        <div class="sd-stat__label">Compra de capacete</div>
                        <div class="sd-stat__value">R$ <?= precoExibir($totalCompra) ?></div>
                        <div class="sd-stat__count"><?= (int) ($porMotivo['COMPRA_CAPACETE']['qtd'] ?? 0) ?> saída(s)</div>
                    </div>
                    <div class="sd-stat sd-stat--outros">
                        <div class="sd-stat__label">Outros</div>
                        <div class="sd-stat__value">R$ <?= precoExibir($totalOutros) ?></div>
                        <div class="sd-stat__count"><?= (int) ($porMotivo['OUTROS']['qtd'] ?? 0) ?> saída(s)</div>
                    </div>
                </div>
            </section>

            <!-- ============ HISTÓRICO ============ -->
            <section class="cadastro-section">
                <h2 class="dash-section__title">Histórico de saídas</h2>

                <form method="GET" action="index.php" class="sd-filtro">
                    <label for="sd-ym">Período</label>
                    <select name="ym" id="sd-ym" class="form-input" onchange="this.form.submit()">
                        <option value="tudo" <?= $ym === 'tudo' ? 'selected' : '' ?>>Todo o período</option>
                        <?php foreach ($meses as $m): ?>
                            <option value="<?= h($m) ?>" <?= $ym === $m ? 'selected' : '' ?>><?= h(labelMes($m)) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <noscript><button type="submit" class="btn btn--ghost-dark">Filtrar</button></noscript>
                </form>

                <?php if (empty($saidas)): ?>
                    <p class="empty-state">Nenhuma saída registrada neste período.</p>
                <?php else: ?>
                    <div class="sd-list">
                        <?php foreach ($saidas as $s):
                            $cancelada = $s['status'] === 'CANCELADA';
                            $compra    = $s['motivo'] === 'COMPRA_CAPACETE';
                        ?>
                        <div class="sd-row <?= $cancelada ? 'sd-row--cancelada' : '' ?>">
                            <div class="sd-row__info">
                                <div class="sd-row__titulo">
                                    <span>Saída #<?= (int) $s['id'] ?></span>
                                    <span class="sd-badge <?= $compra ? 'sd-badge--compra' : 'sd-badge--outros' ?>"><?= h(MOTIVOS_SAIDA[$s['motivo']] ?? $s['motivo']) ?></span>
                                    <?php if ($cancelada): ?><span class="sd-badge sd-badge--cancelada">Cancelada</span><?php endif; ?>
                                </div>
                                <?php if (!empty($s['observacoes'])): ?>
                                    <div class="sd-row__obs"><?= h($s['observacoes']) ?></div>
                                <?php endif; ?>
                                <div class="sd-row__meta">
                                    <?= h(fmtDataHoraSaida($s['data_saida'])) ?> · <?= h($s['usuario']) ?>
                                    <?php if ($cancelada && $s['cancelado_em']): ?>
                                        · cancelada em <?= h(fmtDataHoraSaida($s['cancelado_em'])) ?><?= $s['cancelado_por'] ? ' por ' . h($s['cancelado_por']) : '' ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="sd-row__lado">
                                <span class="sd-row__valor">− R$ <?= precoExibir((float) $s['valor']) ?></span>
                                <?php if (!$cancelada): ?>
                                    <form method="POST" action="index.php<?= $ym !== 'tudo' ? '?ym=' . h($ym) : '' ?>"
                                          onsubmit="return confirm('Cancelar esta saída? O valor deixa de ser descontado do caixa.')">
                                        <input type="hidden" name="csrf_token" value="<?= h($csrf) ?>">
                                        <input type="hidden" name="acao" value="cancelar">
                                        <input type="hidden" name="id" value="<?= (int) $s['id'] ?>">
                                        <button type="submit" class="sd-btn-cancelar">Cancelar</button>
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </section>

        </div>
    </main>
</div>

<div class="sidebar-overlay" id="sidebar-overlay"></div>
<script src="/admin/assets/scripts/admin.js" defer></script>
<script>
(function () {
    // Máscara de moeda pt-BR (mesma usada em Contas a Receber)
    var campoValor = document.getElementById('saida-valor');
    if (campoValor) {
        campoValor.addEventListener('input', function () {
            var digitos = campoValor.value.replace(/\D/g, '');
            if (digitos === '') { campoValor.value = ''; return; }
            var num = (parseInt(digitos, 10) / 100).toFixed(2);
            campoValor.value = num.replace('.', ',').replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        });
    }

    // Validação no navegador (o servidor valida de novo)
    var form   = document.getElementById('saida-form');
    var motivo = document.getElementById('saida-motivo');
    var errV   = document.getElementById('saida-valor-erro');
    var errM   = document.getElementById('saida-motivo-erro');
    if (form) {
        form.addEventListener('submit', function (e) {
            var digitos = campoValor.value.replace(/\D/g, '');
            var valorOk  = digitos !== '' && parseInt(digitos, 10) > 0;
            var motivoOk = motivo.value !== '';
            errV.hidden = valorOk;
            errM.hidden = motivoOk;
            if (!valorOk || !motivoOk) {
                e.preventDefault();
                (valorOk ? motivo : campoValor).focus();
                return;
            }
            document.getElementById('saida-btn').disabled = true; // evita duplo clique
        });
    }
})();
</script>
</body>
</html>
