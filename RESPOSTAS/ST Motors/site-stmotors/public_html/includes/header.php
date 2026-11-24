<?php
$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$currentPath = rtrim($currentPath, '/') ?: '/';

function navActive(string $path, string $href): string {
    $href = rtrim($href, '/') ?: '/';
    if ($href === '/') return $path === '/' ? 'nav__link--active' : '';
    return str_starts_with($path, $href) ? 'nav__link--active' : '';
}
function navActiveMobile(string $path, string $href): string {
    $href = rtrim($href, '/') ?: '/';
    if ($href === '/') return $path === '/' ? 'nav__link-mobile--active' : '';
    return str_starts_with($path, $href) ? 'nav__link-mobile--active' : '';
}
?>
<!-- Skip Link para Acessibilidade -->
<a href="#main-content" class="skip-link">Pular para o conteúdo principal</a>

<!-- HEADER -->
<header class="header" role="banner">
  <div class="header__container">

    <!-- Logo -->
    <div class="header__logo">
      <a href="/" class="header__logo-link" aria-label="ST Motors - Página Inicial">
        <img src="/assets/images/logo-header.svg" alt="ST Motors - Motos Usadas, Seminovas e Novas"
          class="header__logo-img" width="150" height="52">
      </a>
    </div>

    <!-- Navigation Desktop -->
    <nav class="header__nav" role="navigation" aria-label="Menu principal">
      <ul class="nav__list">
        <li><a href="/"              class="nav__link <?= navActive($currentPath, '/') ?>">Home</a></li>
        <li><a href="/estoque"       class="nav__link <?= navActive($currentPath, '/estoque') ?>">Estoque</a></li>
        <li><a href="/#vender-moto"  class="nav__link">Vender Moto</a></li>
        <li><a href="/financiamento" class="nav__link <?= navActive($currentPath, '/financiamento') ?>">Financiamento</a></li>
        <li><a href="/sobre-nos"     class="nav__link <?= navActive($currentPath, '/sobre-nos') ?>">Sobre Nós</a></li>
        <li><a href="#contato"       class="nav__link">Contato</a></li>
      </ul>
    </nav>

    <!-- Mobile Menu Toggle -->
    <button class="header__menu-toggle" aria-label="Abrir menu de navegação" aria-expanded="false"
      aria-controls="mobile-menu">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>

  <!-- Mobile Navigation -->
  <nav id="mobile-menu" class="header__nav-mobile" role="navigation" aria-label="Menu mobile">
    <ul class="nav__list-mobile">
      <li class="nav__item-mobile">
        <a href="/"              class="nav__link-mobile <?= navActiveMobile($currentPath, '/') ?>">Home</a>
      </li>
      <li class="nav__item-mobile">
        <a href="/estoque"       class="nav__link-mobile <?= navActiveMobile($currentPath, '/estoque') ?>">Estoque</a>
      </li>
      <li class="nav__item-mobile">
        <a href="/#vender-moto"  class="nav__link-mobile">Vender Moto</a>
      </li>
      <li class="nav__item-mobile">
        <a href="/financiamento" class="nav__link-mobile <?= navActiveMobile($currentPath, '/financiamento') ?>">Financiamento</a>
      </li>
      <li class="nav__item-mobile">
        <a href="/sobre-nos"     class="nav__link-mobile <?= navActiveMobile($currentPath, '/sobre-nos') ?>">Sobre Nós</a>
      </li>
      <li class="nav__item-mobile">
        <a href="#contato"       class="nav__link-mobile">Contato</a>
      </li>
    </ul>
  </nav>
  <!-- Overlay para fechar menu mobile -->
  <div class="header__overlay" aria-hidden="true"></div>
</header>