<?php
define('ADMIN_LOADED', true);
require_once __DIR__ . '/includes/guard.php';

// Logout
if (isset($_GET['logout'])) {
    if (validateCsrfToken($_GET['token'] ?? '')) {
        destroySession();
    }
    header('Location: /admin/login.php');
    exit;
}

$csrf = getCsrfToken();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard — ST Motors Admin</title>
  <meta name="robots" content="noindex, nofollow">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/admin/assets/styles/admin.css">
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
          <a href="/admin/dashboard.php" class="sidebar__link sidebar__link--active">
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

  <!-- Main -->
  <div class="admin-layout">

    <!-- Topbar -->
    <header class="topbar" role="banner">
      <button class="topbar__toggle" id="sidebar-toggle" aria-label="Abrir menu lateral" aria-expanded="false" aria-controls="sidebar">
        <span></span><span></span><span></span>
      </button>
      <h1 class="topbar__title">Dashboard</h1>
    </header>

    <!-- Content -->
    <main class="admin-main" id="main-content">
      <div class="admin-content">

        <section class="dash-section" aria-labelledby="dash-heading">
          <h2 id="dash-heading" class="dash-section__title">Gerenciamento</h2>
          <p class="dash-section__subtitle">Selecione uma das áreas abaixo para gerenciar o conteúdo do site.</p>

          <div class="dash-grid">

            <!-- Card: Motos -->
            <article class="dash-card">
              <div class="dash-card__icon" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="5" cy="17" r="3"/><circle cx="19" cy="17" r="3"/><path d="M7 17h5l3-5h3"/><path d="M10 12l1.5-3h3"/><path d="M14.5 9h2.5"/><path d="M8 12h4"/></svg>
              </div>
              <div class="dash-card__content">
                <h3 class="dash-card__title">Estoque de Motos</h3>
                <p class="dash-card__description">Adicione, edite ou remova motos do estoque exibido no site.</p>
              </div>
              <a href="/admin/estoque" class="btn btn--primary">
                Acessar
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
              </a>
            </article>

            <!-- Card: Clientes -->
            <article class="dash-card">
              <div class="dash-card__icon" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
              </div>
              <div class="dash-card__content">
                <h3 class="dash-card__title">Clientes</h3>
                <p class="dash-card__description">Veja simulações e cadastros de financiamento enviados pelos clientes.</p>
              </div>
              <a href="/admin/clientes" class="btn btn--primary">
                Acessar
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
              </a>
            </article>

            <!-- Card: Avaliações -->
            <article class="dash-card">
              <div class="dash-card__icon" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
              </div>
              <div class="dash-card__content">
                <h3 class="dash-card__title">Avaliações Google</h3>
                <p class="dash-card__description">Gerencie as avaliações de clientes exibidas na página inicial.</p>
              </div>
              <a href="/admin/avaliacoes/index.php" class="btn btn--primary">
                Acessar
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
              </a>
            </article>
            
            <!-- Card: capacetes -->
            <article class="dash-card">
              <div class="dash-card__icon" aria-hidden="true">
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
              </div>
              <div class="dash-card__content">
                <h3 class="dash-card__title">Capacetes</h3>
                <p class="dash-card__description">Cadastre estoque, vendas e saídas de caixa.</p>
              </div>
              <a href="/admin/capacetes/index.php" class="btn btn--primary">
                Acessar
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
              </a>
            </article>

          </div>
        </section>

      </div>
    </main>

  </div>

  <!-- Overlay mobile -->
  <div class="sidebar-overlay" id="sidebar-overlay" aria-hidden="true"></div>

  <script src="/admin/assets/scripts/admin.js" defer></script>
</body>
</html>