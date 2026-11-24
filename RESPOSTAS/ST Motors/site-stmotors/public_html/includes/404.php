<?php
defined('APP_LOADED') or define('APP_LOADED', true);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página não encontrada | ST Motors Araraquara</title>
  <meta name="robots" content="noindex, nofollow">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/styles/components/header.css">
  <link rel="stylesheet" href="/assets/styles/components/footer.css">
  <style>
    .not-found {
      min-height: calc(100vh - var(--header-height-mobile, 64px));
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 4rem 1.5rem;
      background:
        linear-gradient(180deg, rgba(10,15,10,.97) 0%, rgba(10,15,10,.85) 100%),
        radial-gradient(ellipse 70% 50% at 50% 0%, rgba(79,158,33,.15) 0%, transparent 70%);
      text-align: center;
    }

    .not-found__inner {
      max-width: 520px;
      margin: 0 auto;
    }

    .not-found__code {
      font-family: 'Montserrat', sans-serif;
      font-size: clamp(5rem, 20vw, 9rem);
      font-weight: 900;
      line-height: 1;
      color: var(--color-primary, #4f9e21);
      opacity: .15;
      margin-bottom: -.5rem;
      display: block;
      user-select: none;
    }

    .not-found__icon {
      font-size: 3.5rem;
      margin-bottom: 1.25rem;
      display: block;
    }

    .not-found__title {
      font-family: 'Montserrat', sans-serif;
      font-size: clamp(1.4rem, 4vw, 2rem);
      font-weight: 800;
      color: #fff;
      margin-bottom: .75rem;
      line-height: 1.2;
    }

    .not-found__desc {
      font-size: .95rem;
      color: rgba(255,255,255,.5);
      margin-bottom: 2.5rem;
      line-height: 1.6;
    }

    .not-found__actions {
      display: flex;
      flex-wrap: wrap;
      gap: .75rem;
      justify-content: center;
    }

    .not-found__btn {
      display: inline-flex;
      align-items: center;
      gap: .45rem;
      height: 44px;
      padding: 0 1.5rem;
      border-radius: 8px;
      font-size: .875rem;
      font-weight: 600;
      font-family: inherit;
      text-decoration: none;
      transition: background .2s, transform .15s;
      cursor: pointer;
    }

    .not-found__btn--primary {
      background: var(--color-primary, #4f9e21);
      color: #fff;
      border: none;
    }

    .not-found__btn--primary:hover {
      background: #5cb528;
      transform: translateY(-2px);
    }

    .not-found__btn--secondary {
      background: transparent;
      color: rgba(255,255,255,.7);
      border: 1px solid rgba(255,255,255,.15);
    }

    .not-found__btn--secondary:hover {
      background: rgba(255,255,255,.07);
      color: #fff;
      transform: translateY(-2px);
    }

    @media (min-width: 768px) {
      .not-found {
        min-height: calc(100vh - var(--header-height, 72px));
        padding-top: calc(var(--header-height, 72px) + 2rem);
      }
    }
  </style>
</head>
<body style="background:#0a0f0a">

  <?php include __DIR__ . '/header.php'; ?>

  <main id="main-content">
    <div class="not-found">
      <div class="not-found__inner">
        <span class="not-found__code" aria-hidden="true">404</span>
        <span class="not-found__icon" aria-hidden="true">🏍️</span>
        <h1 class="not-found__title">Moto não encontrada</h1>
        <p class="not-found__desc">
          Esta moto pode ter sido vendida ou pode ter sido digitado errado.<br>
          Confira nosso estoque completo — temos outras opções esperando por você.
        </p>
        <div class="not-found__actions">
          <a href="/estoque/" class="not-found__btn not-found__btn--primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
            Ver estoque completo
          </a>
          <a href="/" class="not-found__btn not-found__btn--secondary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            Voltar ao início
          </a>
        </div>
      </div>
    </div>
  </main>

  <?php include __DIR__ . '/footer.php'; ?>

</body>
</html>
