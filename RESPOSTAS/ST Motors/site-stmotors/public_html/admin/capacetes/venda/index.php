<?php
/**
 * /admin/capacetes/venda
 *
 * Histórico de vendas de capacetes.
 *
 * "Excluir" uma venda é, na prática, um CANCELAMENTO lógico:
 *   - a venda nunca é apagada do banco (mantém histórico/financeiro);
 *   - exige justificativa do usuário;
 *   - devolve a quantidade de cada item ao estoque de `capacetes`;
 *   - cancela eventuais contas a receber em aberto da venda.
 * Esse é o mesmo padrão usado no restante do sistema (vendas
 * "excluídas" continuam existindo, só ficam marcadas como canceladas).
 */

define('ADMIN_LOADED', true);
require_once __DIR__ . '/../../includes/guard.php';
require_once __DIR__ . '/../../../includes/money.php';
require_once __DIR__ . '/../../../includes/db.php';

if (!function_exists('h')) {
    function h($v): string {
        return htmlspecialchars((string) ($v ?? ''), ENT_QUOTES, 'UTF-8');
    }
}

$csrf    = getCsrfToken();
$erro    = '';
$sucesso = $_SESSION['capacetes_flash_sucesso'] ?? '';
unset($_SESSION['capacetes_flash_sucesso']);

$usuarioId = $_SESSION['usuario_id'] ?? $_SESSION['user_id'] ?? null;

// ============================================================
// POST — cancelamento (com justificativa) de uma venda
// ============================================================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!validateCsrfToken($_POST['csrf_token'] ?? '')) {
        $erro = 'Requisição inválida.';
    } elseif (($_POST['acao'] ?? '') === 'cancelar') {
        $vendaId = (int) ($_POST['id'] ?? 0);
        $motivo  = trim($_POST['motivo'] ?? '');

        if ($motivo === '') {
            $erro = 'Informe o motivo do cancelamento.';
        } elseif ($vendaId <= 0) {
            $erro = 'Venda inválida.';
        } else {
            $db = getDB();
            try {
                $db->beginTransaction();

                $st = $db->prepare("SELECT status FROM capacete_vendas WHERE id = ? FOR UPDATE");
                $st->execute([$vendaId]);
                $venda = $st->fetch();

                if (!$venda) {
                    throw new RuntimeException('Venda não encontrada.');
                }
                if ($venda['status'] === 'CANCELADA') {
                    throw new RuntimeException('Essa venda já está cancelada.');
                }

                // Devolve a quantidade de cada item ao estoque.
                $st = $db->prepare('SELECT capacete_id, quantidade FROM capacete_venda_itens WHERE venda_id = ?');
                $st->execute([$vendaId]);
                $itens = $st->fetchAll();

                $stDevolve = $db->prepare('UPDATE capacetes SET quantidade = quantidade + ? WHERE id = ?');
                foreach ($itens as $it) {
                    if ($it['capacete_id'] !== null) {
                        $stDevolve->execute([(int) $it['quantidade'], (int) $it['capacete_id']]);
                    }
                }

                // Cancela contas a receber em aberto ligadas à venda.
                $db->prepare("UPDATE capacete_contas_receber SET status = 'CANCELADO' WHERE venda_id = ? AND status = 'ABERTO'")
                   ->execute([$vendaId]);

                // Marca a venda como cancelada.
                $db->prepare(
                    "UPDATE capacete_vendas
                     SET status = 'CANCELADA', motivo_cancelamento = ?, cancelado_em = NOW(), cancelado_por = ?
                     WHERE id = ?"
                )->execute([$motivo, $usuarioId, $vendaId]);

                $db->commit();
                $sucesso = 'Venda #' . $vendaId . ' cancelada e estoque estornado.';
            } catch (Throwable $e) {
                if ($db->inTransaction()) $db->rollBack();
                $erro = $e->getMessage();
            }
        }
    }
}

// ============================================================
// LISTAGEM
// ============================================================
$db = getDB();
$vendas = $db->query(
    "SELECT * FROM capacete_vendas ORDER BY data_venda DESC LIMIT 300"
)->fetchAll();

$totalAtivas     = 0;
$totalCanceladas = 0;
foreach ($vendas as $v) {
    if ($v['status'] === 'CANCELADA') {
        $totalCanceladas++;
    } else {
        $totalAtivas++;
    }
}

$itensPorVenda = [];
$pagPorVenda   = [];
if (!empty($vendas)) {
    $ids = array_map(fn($v) => (int) $v['id'], $vendas);
    $ph  = implode(',', array_fill(0, count($ids), '?'));

    $st = $db->prepare("SELECT * FROM capacete_venda_itens WHERE venda_id IN ($ph) ORDER BY id ASC");
    $st->execute($ids);
    foreach ($st->fetchAll() as $it) {
        $itensPorVenda[(int) $it['venda_id']][] = $it;
    }

    $st = $db->prepare("SELECT * FROM capacete_venda_pagamentos WHERE venda_id IN ($ph) ORDER BY id ASC");
    $st->execute($ids);
    foreach ($st->fetchAll() as $pg) {
        $pagPorVenda[(int) $pg['venda_id']][] = $pg;
    }
}

function labelForma(string $f): string {
    return match ($f) {
        'PIX'           => 'Pix',
        'DINHEIRO'      => 'Dinheiro',
        'CREDITO'       => 'Crédito',
        'DEBITO'        => 'Débito',
        'TRANSFERENCIA' => 'Transferência',
        'FINANCIAMENTO' => 'Financiamento',
        'A_RECEBER'     => 'A Receber',
        'OUTROS'        => 'Outros',
        default         => ucfirst(strtolower($f)),
    };
}
function classeForma(string $f): string {
    return match ($f) {
        'PIX'           => 'forma-pix',
        'DINHEIRO'      => 'forma-din',
        'CREDITO', 'DEBITO' => 'forma-cartao',
        'FINANCIAMENTO' => 'forma-fin',
        'A_RECEBER'     => 'forma-rec',
        default         => 'forma-out',
    };
}
function fmtDataHora(string $s): string {
    $dt = DateTime::createFromFormat('Y-m-d H:i:s', $s);
    return $dt ? $dt->format('d/m/Y H:i') : $s;
}
function mascCpf(string $c): string {
    return strlen($c) === 11 ? substr($c,0,3).'.'.substr($c,3,3).'.'.substr($c,6,3).'-'.substr($c,9,2) : $c;
}
function mascTel(string $t): string {
    if (strlen($t) === 11) return '('.substr($t,0,2).') '.substr($t,2,5).'-'.substr($t,7,4);
    if (strlen($t) === 10) return '('.substr($t,0,2).') '.substr($t,2,4).'-'.substr($t,6,4);
    return $t;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendas de Capacetes — ST Motors Admin</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/admin/assets/styles/admin.css">
    <link rel="stylesheet" href="/admin/assets/styles/estoque.css">
    <link rel="stylesheet" href="/admin/assets/styles/capacetes-estoque.css">
    <link rel="stylesheet" href="/admin/assets/styles/capacetes-venda.css">
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
        <h1 class="topbar__title">Vendas de Capacetes</h1>
        <a href="nova.php" class="btn btn--primary" style="margin-left:auto">+ Nova Venda</a>
    </header>

    <main class="admin-main" id="main-content">
        <div class="admin-content">

            <?php if ($sucesso): ?>
                <div class="alert alert--success"><?= h($sucesso) ?></div>
            <?php endif; ?>
            <?php if ($erro): ?>
                <div class="alert alert--error"><?= h($erro) ?></div>
            <?php endif; ?>

            <section class="cadastro-section">
                <h2 class="dash-section__title">Histórico de Vendas</h2>
                <p class="dash-section__subtitle"><?= count($vendas) ?> venda(s) registrada(s) no total.</p>

                <?php if (empty($vendas)): ?>
                    <p class="empty-state">Nenhuma venda registrada ainda.</p>
                <?php else: ?>
                    <div class="cv-tabs" role="tablist" aria-label="Filtro de vendas">
                        <button type="button" class="cv-tab cv-tab--active" data-tab="ativas" role="tab" aria-selected="true">
                            Vendas Concretizadas <span class="cv-tab-count"><?= $totalAtivas ?></span>
                        </button>
                        <button type="button" class="cv-tab" data-tab="canceladas" role="tab" aria-selected="false">
                            Vendas Canceladas <span class="cv-tab-count"><?= $totalCanceladas ?></span>
                        </button>
                        <button type="button" class="cv-tab" data-tab="todas" role="tab" aria-selected="false">
                            Venda Geral <span class="cv-tab-count"><?= count($vendas) ?></span>
                        </button>
                    </div>

                    <p class="empty-state" id="cv-tab-vazio" hidden>Nenhuma venda encontrada nesse filtro.</p>

                    <div class="cv-lista">
                        <?php foreach ($vendas as $v):
                            $vid       = (int) $v['id'];
                            $itens     = $itensPorVenda[$vid] ?? [];
                            $pagtos    = $pagPorVenda[$vid]   ?? [];
                            $cancelada = $v['status'] === 'CANCELADA';
                        ?>
                        <article class="cv-card <?= $cancelada ? 'cv-card--cancelada' : '' ?>"
                                 data-status="<?= $cancelada ? 'cancelada' : 'ativa' ?>"
                                 <?= $cancelada ? 'hidden' : '' ?>>
                            <div class="cv-card__top" data-toggle="venda-<?= $vid ?>">
                                <div class="cv-card__top-linha1">
                                    <span class="cv-card__id">Venda #<?= $vid ?></span>
                                    <?php if ($cancelada): ?>
                                        <span class="cv-badge-cancelada">Cancelada</span>
                                    <?php endif; ?>
                                    <span class="cv-card__valor">R$ <?= precoExibir((float) $v['valor_total']) ?></span>
                                    <span class="cv-card__seta" aria-hidden="true">›</span>
                                </div>
                                <div class="cv-card__top-linha2">
                                    <span class="cv-card__data"><?= h(fmtDataHora($v['data_venda'])) ?></span>
                                    <span class="cv-card__sep">·</span>
                                    <span class="cv-card__cliente-nome"><?= h($v['cliente_nome']) ?></span>
                                </div>
                            </div>

                            <div class="cv-card__itens" id="venda-<?= $vid ?>" hidden>
                                <div class="cv-card__cliente">
                                    <span class="cv-card__cliente-info">
                                        CPF <?= h(mascCpf($v['cliente_cpf'])) ?> · <?= h(mascTel($v['cliente_telefone'])) ?>
                                    </span>
                                </div>

                                <div class="cv-itens-titulo">Capacetes (<?= count($itens) ?>)</div>
                                <?php foreach ($itens as $it): ?>
                                    <div class="cv-item-row">
                                        <span class="cv-item-nome">
                                            <?= h($it['modelo']) ?>
                                            <span class="cv-item-codigo"><?= h($it['codigo']) ?> · Tam. <?= h($it['tamanho']) ?></span>
                                        </span>
                                        <span class="cv-item-qtd"><?= (int) $it['quantidade'] ?>×</span>
                                        <span class="cv-item-total">R$ <?= precoExibir((float) $it['valor_total']) ?></span>
                                    </div>
                                <?php endforeach; ?>

                                <?php if ((float) $v['desconto'] > 0 || (float) $v['gorjeta'] > 0): ?>
                                    <div class="cv-itens-extras">
                                        <?php if ((float) $v['desconto'] > 0): ?><span>Desconto: <strong>− R$ <?= precoExibir((float) $v['desconto']) ?></strong></span><?php endif; ?>
                                        <?php if ((float) $v['gorjeta'] > 0): ?><span>Gorjeta: <strong>+ R$ <?= precoExibir((float) $v['gorjeta']) ?></strong></span><?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($pagtos)): ?>
                                    <div class="cv-pagamentos">
                                        <div class="cv-itens-titulo">Pagamento</div>
                                        <?php foreach ($pagtos as $pg): ?>
                                            <div class="cv-pagamento-row">
                                                <span class="cv-badge-forma <?= classeForma($pg['forma']) ?>"><?= h(labelForma($pg['forma'])) ?></span>
                                                <span class="cv-pagamento-valor">R$ <?= precoExibir((float) $pg['valor']) ?></span>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($v['observacoes']): ?>
                                    <div class="cv-itens-obs"><strong>Obs.:</strong> <?= h($v['observacoes']) ?></div>
                                <?php endif; ?>

                                <?php if ($cancelada): ?>
                                    <div class="cv-itens-motivo">
                                        <strong>Motivo do cancelamento:</strong> <?= h($v['motivo_cancelamento']) ?>
                                        <span class="cv-itens-motivo-data">em <?= h(fmtDataHora($v['cancelado_em'])) ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php if (!$cancelada): ?>
                                <div class="cv-card__acoes">
                                    <button type="button" class="btn-icon btn-icon--danger" title="Excluir venda"
                                        onclick="abrirModalCancelar(<?= $vid ?>)">🗑️ Excluir</button>
                                </div>
                            <?php endif; ?>
                        </article>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </section>

        </div>
    </main>
</div>

<!-- ── MODAL: Cancelar venda (com justificativa) ── -->
<div class="modal-overlay" id="cancelar-modal-overlay">
    <div class="modal" role="dialog" aria-modal="true" aria-labelledby="cancelar-modal-title">
        <div class="modal__header">
            <h2 class="modal__title" id="cancelar-modal-title">Excluir Venda</h2>
            <button type="button" class="modal__close" aria-label="Fechar" onclick="fecharModalCancelar()">&times;</button>
        </div>
        <p class="form-hint" style="margin-bottom:1rem">
            A venda será cancelada e os capacetes vendidos voltam para o estoque.
            Essa ação não pode ser desfeita.
        </p>
        <form method="POST" action="" id="cancelar-form">
            <input type="hidden" name="csrf_token" value="<?= h($csrf) ?>">
            <input type="hidden" name="acao" value="cancelar">
            <input type="hidden" name="id" id="cancelar-venda-id" value="">

            <div class="form-group">
                <label class="form-label">Motivo do cancelamento <span class="required">*</span></label>
                <textarea name="motivo" id="cancelar-motivo" class="form-input" rows="3" required
                          placeholder="Explique por que essa venda está sendo excluída…"></textarea>
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn--ghost-dark" onclick="fecharModalCancelar()" style="margin-right:.5rem">Voltar</button>
                <button type="submit" class="btn btn--primary btn--perigo">Confirmar Exclusão</button>
            </div>
        </form>
    </div>
</div>

<div class="sidebar-overlay" id="sidebar-overlay"></div>
<script src="/admin/assets/scripts/admin.js" defer></script>
<script>
(function () {
    document.querySelectorAll('[data-toggle]').forEach(function (topo) {
        topo.addEventListener('click', function () {
            var alvo = document.getElementById(topo.dataset.toggle);
            if (!alvo) return;
            alvo.hidden = !alvo.hidden;
            topo.closest('.cv-card').classList.toggle('cv-card--aberta', !alvo.hidden);
        });
    });

    // ── ABAS: Concretizadas / Canceladas / Geral ──────────────────
    var cvCards   = document.querySelectorAll('.cv-card');
    var cvTabs    = document.querySelectorAll('.cv-tab');
    var cvVazio   = document.getElementById('cv-tab-vazio');

    function aplicarFiltro(filtro) {
        var visiveis = 0;
        cvCards.forEach(function (card) {
            var status  = card.dataset.status;
            var mostrar = filtro === 'todas'
                || (filtro === 'ativas'     && status === 'ativa')
                || (filtro === 'canceladas' && status === 'cancelada');
            card.hidden = !mostrar;
            if (mostrar) visiveis++;
        });
        if (cvVazio) cvVazio.hidden = visiveis > 0;
    }

    cvTabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            cvTabs.forEach(function (t) {
                t.classList.remove('cv-tab--active');
                t.setAttribute('aria-selected', 'false');
            });
            tab.classList.add('cv-tab--active');
            tab.setAttribute('aria-selected', 'true');
            aplicarFiltro(tab.dataset.tab);
        });
    });

    // Estado inicial já vem correto do PHP (cancelados com `hidden`),
    // mas confere o "nenhuma venda" caso a aba padrão comece vazia.
    if (cvVazio) {
        var algumaAtiva = Array.from(cvCards).some(function (c) { return !c.hidden; });
        cvVazio.hidden = algumaAtiva;
    }

    window.abrirModalCancelar = function (id) {
        document.getElementById('cancelar-venda-id').value = id;
        document.getElementById('cancelar-motivo').value = '';
        document.getElementById('cancelar-modal-overlay').classList.add('open');
    };
    window.fecharModalCancelar = function () {
        document.getElementById('cancelar-modal-overlay').classList.remove('open');
    };
    document.getElementById('cancelar-modal-overlay').addEventListener('click', function (e) {
        if (e.target === this) window.fecharModalCancelar();
    });
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') window.fecharModalCancelar();
    });
})();
</script>
</body>
</html>