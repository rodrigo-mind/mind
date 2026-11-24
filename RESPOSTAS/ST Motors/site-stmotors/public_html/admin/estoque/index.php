<?php
define('ADMIN_LOADED', true);
require_once __DIR__ . '/../includes/guard.php';
require_once __DIR__ . '/../../includes/money.php'; // ← adicionar
require_once __DIR__ . '/../../includes/db.php';

$csrf    = getCsrfToken();
$erro    = '';
$sucesso = '';

// ── AÇÕES POST ────────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!validateCsrfToken($_POST['csrf_token'] ?? '')) {
        $erro = 'Requisição inválida.';
    } else {
        $acao = $_POST['acao'] ?? '';
        $db   = getDB();

        // Toggle ativo
        if ($acao === 'toggle_ativo') {
            $id    = (int)($_POST['id'] ?? 0);
            $atual = (int)($_POST['ativo'] ?? 1);
            if ($id > 0) {
                $db->prepare('UPDATE motos SET ativo = ? WHERE id = ?')->execute([$atual ? 0 : 1, $id]);
                $sucesso = 'Status atualizado.';
            }
        }

        // Excluir moto
        if ($acao === 'excluir') {
            $id = (int)($_POST['id'] ?? 0);
            if ($id > 0) {
                $fotos = $db->prepare('SELECT arquivo FROM moto_fotos WHERE moto_id = ?');
                $fotos->execute([$id]);
                foreach ($fotos->fetchAll() as $f) {
                    $path = __DIR__ . '/../../' . ltrim($f['arquivo'], '/');
                    if (file_exists($path)) unlink($path);
                }
                $db->prepare('DELETE FROM motos WHERE id = ?')->execute([$id]);
                $sucesso = 'Moto removida.';
            }
        }

        // Salvar destaques (5 selects)
        if ($acao === 'salvar_destaques') {
            $slots = $_POST['destaque_slot'] ?? []; // array[1..5] => id
            $ids   = [];
            foreach ($slots as $ordem => $val) {
                $val = (int)$val;
                if ($val > 0) $ids[(int)$ordem] = $val;
            }
            // Impede duplicatas
            if (count($ids) !== count(array_unique($ids))) {
                $erro = 'A mesma moto não pode aparecer em mais de uma posição.';
            } else {
                $db->exec('UPDATE motos SET destaque = 0, ordem_destaque = 0');
                foreach ($ids as $ordem => $id) {
                    $db->prepare('UPDATE motos SET destaque = 1, ordem_destaque = ? WHERE id = ?')
                       ->execute([$ordem, $id]);
                }
                $sucesso = 'Destaques salvos.';
            }
        }
    }
}

// ── LISTAGEM ──────────────────────────────────────────────────
$db    = getDB();
$motos = $db->query('SELECT m.*, (SELECT arquivo FROM moto_fotos WHERE moto_id = m.id AND principal = 1 LIMIT 1) AS foto_principal FROM motos m ORDER BY m.criado_em DESC')->fetchAll();
$csrf  = getCsrfToken();

// Monta mapa de destaques atuais: ordem => id
$destaqueAtual = [];
foreach ($motos as $m) {
    if ($m['destaque'] && $m['ordem_destaque'] > 0) {
        $destaqueAtual[(int)$m['ordem_destaque']] = (int)$m['id'];
    }
}

// Somente motos ativas para os selects
$motosAtivas = array_filter($motos, fn($m) => $m['ativo']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque — ST Motors Admin</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/admin/assets/styles/admin.css">
    <link rel="stylesheet" href="/admin/assets/styles/estoque.css">
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
          <a href="/admin/estoque" class="sidebar__link sidebar__link--active">
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
        <h1 class="topbar__title">Estoque de Motos</h1>
        <a href="/admin/estoque/cadastrar-moto/" class="btn btn--primary" style="margin-left:auto">+ Nova Moto</a>
    </header>

    <main class="admin-main">
        <div class="admin-content">

            <?php if ($sucesso): ?>
                <div class="alert alert--success"><?= htmlspecialchars($sucesso, ENT_QUOTES, 'UTF-8') ?></div>
            <?php endif; ?>
            <?php if ($erro): ?>
                <div class="alert alert--error"><?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?></div>
            <?php endif; ?>

            <!-- ── SEÇÃO DESTAQUES ── -->
            <section class="cadastro-section" style="margin-bottom:2rem">
                <h2 class="dash-section__title">Motos em Destaque</h2>
                <p class="dash-section__subtitle">Defina até 5 motos que aparecerão na home. Cada posição representa a ordem de exibição.</p>

                <form method="POST" action="">
                    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf, ENT_QUOTES, 'UTF-8') ?>">
                    <input type="hidden" name="acao" value="salvar_destaques">

                    <div class="destaques-slots">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <div class="destaque-slot">
                                <span class="destaque-slot__num"><?= $i ?>º</span>
                                <select name="destaque_slot[<?= $i ?>]" class="form-input destaque-slot__select">
                                    <option value="0">— vazio —</option>
                                    <?php foreach ($motosAtivas as $m): ?>
                                        <option value="<?= $m['id'] ?>"
                                            <?= ($destaqueAtual[$i] ?? 0) === (int)$m['id'] ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($m['marca'] . ' ' . $m['modelo'] . ' ' . $m['ano'] . ($m['placa'] ? ' · ' . $m['placa'] : ''), ENT_QUOTES, 'UTF-8') ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        <?php endfor; ?>
                    </div>

                    <div class="form-actions" style="margin-top:1rem">
                        <button type="submit" class="btn btn--primary">Salvar Destaques</button>
                    </div>
                </form>
            </section>

            <!-- ── LISTAGEM COMPLETA ── -->
            <section class="cadastro-section">
                <h2 class="dash-section__title">Todas as Motos</h2>
                <p class="dash-section__subtitle"><?= count($motos) ?> moto(s) cadastrada(s).</p>

                <?php if (empty($motos)): ?>
                    <p class="empty-state">Nenhuma moto cadastrada ainda.</p>
                <?php else: ?>
                    <table class="estoque-table">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Moto</th>
                                <th>Placa</th>
                                <th>Ano</th>
                                <th>Preço</th>
                                <th>Status</th>
                                <th>Destaque</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($motos as $m): ?>
                            <tr class="<?= !$m['ativo'] ? 'row--inativo' : '' ?>">
                                <td class="td-foto">
                                    <?php if ($m['foto_principal']): ?>
                                        <img src="<?= htmlspecialchars($m['foto_principal'], ENT_QUOTES, 'UTF-8') ?>" alt="" width="64" height="48" style="object-fit:cover;border-radius:6px">
                                    <?php else: ?>
                                        <span style="font-size:2rem">🏍️</span>
                                    <?php endif; ?>
                                </td>
                                <td class="td-moto">
                                    <strong><?= htmlspecialchars($m['marca'], ENT_QUOTES, 'UTF-8') ?></strong><br>
                                    <?= htmlspecialchars($m['modelo'], ENT_QUOTES, 'UTF-8') ?>
                                    <span class="td-moto__cor"><?= htmlspecialchars($m['cor'], ENT_QUOTES, 'UTF-8') ?></span>
                                </td>
                                <td class="td-ano"><?= $m['ano'] ?></td>
                                <td class="td-placa"><?= $m['placa'] ? htmlspecialchars($m['placa'], ENT_QUOTES, 'UTF-8') : '—' ?></td>
                                <td class="td-preco">R$ <?= precoExibir($m['preco']) ?></td>
                                <td class="td-status"><?= $m['ativo'] ? '<span class="badge badge--ativo">Ativo</span>' : '<span class="badge badge--inativo">Inativo</span>' ?></td>
                                <td class="td-destaque"><?= $m['destaque'] ? '⭐ #' . $m['ordem_destaque'] : '—' ?></td>
                                <td class="td-acoes">
                                    <div style="display:flex;gap:.5rem;flex-wrap:wrap">
                                        <a href="/admin/estoque/cadastrar-moto/?id=<?= $m['id'] ?>" class="btn-icon" title="Editar">✏️</a>

                                        <form method="POST" action="" style="display:inline">
                                            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf, ENT_QUOTES, 'UTF-8') ?>">
                                            <input type="hidden" name="acao" value="toggle_ativo">
                                            <input type="hidden" name="id" value="<?= $m['id'] ?>">
                                            <input type="hidden" name="ativo" value="<?= $m['ativo'] ?>">
                                            <button type="submit" class="btn-icon btn-icon--warning" title="<?= $m['ativo'] ? 'Desativar' : 'Ativar' ?>"><?= $m['ativo'] ? '👁️' : '🚫' ?></button>
                                        </form>

                                        <form method="POST" action="" style="display:inline" onsubmit="return confirm('Excluir esta moto?')">
                                            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf, ENT_QUOTES, 'UTF-8') ?>">
                                            <input type="hidden" name="acao" value="excluir">
                                            <input type="hidden" name="id" value="<?= $m['id'] ?>">
                                            <button type="submit" class="btn-icon btn-icon--danger" title="Excluir">🗑️</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </section>

        </div>
    </main>
</div>

<div class="sidebar-overlay" id="sidebar-overlay"></div>
<script src="/admin/assets/scripts/admin.js" defer></script>
<script src="/admin/assets/scripts/estoque.js" defer></script>
</body>
</html>