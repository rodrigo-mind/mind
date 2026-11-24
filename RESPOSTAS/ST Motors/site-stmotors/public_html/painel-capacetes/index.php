<?php
define('PAINEL_LOADED', true);
require_once __DIR__ . '/includes/guard.php';
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/money.php';
require_once __DIR__ . '/includes/dados.php';

// Logout
if (isset($_GET['logout'])) {
    if (validatePainelCsrfToken($_GET['token'] ?? '')) {
        destroyPainelSession();
    }
    header('Location: /painel-capacetes/login.php');
    exit;
}

$csrf = getPainelCsrfToken();

// Carga inicial (server-side). Trocas seguintes (expandir mês, buscar,
// filtrar capacetes) são via /api/*.php em AJAX.
$db = getDB();
$resumoGeral = getResumoFinanceiro($db, null, null);
$meses       = getMesesComVendas($db);

$capacetes   = getDesempenhoCapacetes($db, null, null);
$margemMedia = margemMediaGeral($capacetes);
$resumoEstoque = getResumoEstoque($db);
$capacetes   = filtrarCapacetes($capacetes, null, null, 'mais_lucrativo');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painel Financeiro — Capacetes · ST Motors</title>
  <meta name="robots" content="noindex, nofollow">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/painel-capacetes/assets/styles/painel.css?v=4">
  <link rel="stylesheet" href="/painel-capacetes/assets/styles/painel-resumo.css?v=1">
</head>
<body class="painel-page">

  <header class="topbar">
    <div class="topbar__brand">
      <img src="/assets/images/logo-header.svg" alt="ST Motors" width="110" height="38">
      <div class="topbar__title">
        <span class="topbar__title-main">Painel Financeiro</span>
        <span class="topbar__title-sub">Venda de Capacetes</span>
      </div>
    </div>
    <div class="topbar__actions">
      <a href="/painel-capacetes/index.php?logout=1&token=<?= urlencode($csrf) ?>" class="btn btn--ghost btn--small">Sair</a>
    </div>
  </header>

  <nav class="tabs" role="tablist" aria-label="Seções do painel">
    <button class="tabs__btn tabs__btn--active" role="tab" aria-selected="true" data-tab="vendas">Vendas</button>
    <button class="tabs__btn" role="tab" aria-selected="false" data-tab="capacetes">Capacetes</button>
    <button class="tabs__btn" role="tab" aria-selected="false" data-tab="estoque">Estoque</button>
  </nav>

  <main class="painel-content">

    <!-- ======================= ABA — VENDAS ======================= -->
    <section id="tab-vendas" class="tab-panel tab-panel--active" role="tabpanel">

      <h2 class="section-title">Geral</h2>
      <p class="section-subtitle">Números atuais — soma de todo o histórico de vendas ativas.</p>
      <div id="resumo-geral" class="resumo-block"></div>

      <h2 class="section-title">Por mês</h2>
      <p class="section-subtitle">Clique em um mês para ver os números daquele período.</p>
      <div id="meses-lista" class="meses-lista"></div>

    </section>

    <!-- ======================= ABA — CAPACETES ======================= -->
    <section id="tab-capacetes" class="tab-panel" role="tabpanel" hidden>

      <div class="toolbar">
        <div class="search-wrapper">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
          <input type="search" id="capacetes-busca" class="search-input" placeholder="Buscar por modelo ou código…">
        </div>

        <select id="capacetes-ordenar" class="select-inline">
          <option value="mais_lucrativo" selected>Mais lucrativo</option>
          <option value="mais_vendido">Mais vendido</option>
          <option value="margem">Margem de lucro</option>
        </select>

        <label for="capacetes-periodo" class="sr-only">Período das vendas</label>
        <select id="capacetes-periodo" class="select-inline">
          <option value="tudo" selected>Todo o período</option>
          <?php foreach ($meses as $m): ?>
            <option value="<?= htmlspecialchars($m['ym']) ?>"><?= htmlspecialchars($m['label']) ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="chip-group" id="capacetes-filtro-estoque" role="group" aria-label="Filtro de estoque">
        <button type="button" class="chip chip--active" data-filtro="">Todos</button>
        <button type="button" class="chip" data-filtro="estoque">Em Estoque</button>
        <button type="button" class="chip" data-filtro="sem_estoque">Sem Estoque</button>
      </div>

      <div id="capacetes-lista" class="capacetes-lista" data-margem-media="<?= htmlspecialchars((string)$margemMedia) ?>"></div>
    </section>


    <!-- ======================= ABA — ESTOQUE ======================= -->
    <section id="tab-estoque" class="tab-panel" role="tabpanel" hidden>
      <h2 class="section-title">Estoque atual</h2>
      <p class="section-subtitle">Posição de hoje dos capacetes cadastrados no estoque.</p>
      <div id="estoque-resumo" class="resumo-block"></div>
    </section>

  </main>

  <script type="application/json" id="painel-dados"><?= json_encode([
      'csrf'        => $csrf,
      'resumoGeral' => $resumoGeral,
      'meses'       => array_map(fn($m) => ['ym' => $m['ym'], 'label' => $m['label']], $meses),
      'capacetes'   => $capacetes,
      'estoque'     => $resumoEstoque,
      'margemMedia' => $margemMedia,
  ], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE) ?></script>
  <script src="/painel-capacetes/assets/scripts/painel.js?v=8" defer></script>

</body>
</html>
