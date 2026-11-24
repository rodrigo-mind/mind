<?php
define('APP_LOADED', true);
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/security.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quem Somos | ST Motors Araraquara</title>
  <meta name="description" content="Conheça a ST Motors — uma nova forma de comprar motos em Araraquara. Atendimento honesto, transparência total e o melhor negócio para você.">
  <meta name="robots" content="index, follow">
  <link rel="canonical" href="<?= SITE_URL ?>/sobre-nos/">
  <meta property="og:type" content="website">
  <meta property="og:title" content="Quem Somos | ST Motors Araraquara">
  <meta property="og:description" content="Uma nova forma de comprar motos em Araraquara. Transparência, atendimento de verdade e o melhor negócio para você.">
  <meta property="og:url" content="<?= SITE_URL ?>/sobre-nos/">
  <meta property="og:image" content="<?= SITE_URL ?>/assets/images/st-og.jpg">
  <meta property="og:locale" content="pt_BR">
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "MotorcycleDealer",
    "name": "ST Motors",
    "url": "<?= SITE_URL ?>",
    "description": "Loja de motos usadas e seminovas em Araraquara com atendimento personalizado e transparente.",
    "foundingDate": "2024",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "R. Mauricio Galli, 47",
      "addressLocality": "Araraquara",
      "addressRegion": "SP",
      "postalCode": "14806-155",
      "addressCountry": "BR"
    },
    "telephone": "+551630147386",
    "sameAs": [
      "https://www.instagram.com/stmotors_ara/",
      "https://www.facebook.com/St.Motors.Araraquara"
    ]
  }
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/styles/components/header.css">
  <link rel="stylesheet" href="/assets/styles/components/footer.css">
  <link rel="stylesheet" href="/assets/styles/sobre-nos.css">
</head>
<body class="sobre-body">
<?php include __DIR__ . '/../includes/header.php'; ?>

<main id="main-content">

  <!-- ══ HERO ══════════════════════════════════════════════ -->
  <section class="sobre-hero" aria-label="Quem somos">
    <div class="sobre-hero__bg">
      <img src="/assets/images/sobre-nos/fachada.jpg"
           alt="Fachada ST Motors Araraquara"
           class="sobre-hero__img"
           loading="eager"
           fetchpriority="high"
           width="865" height="362">
      <div class="sobre-hero__blur" aria-hidden="true"></div>
      <div class="sobre-hero__overlay" aria-hidden="true"></div>
    </div>
    <div class="sobre-hero__content">
      <span class="sobre-hero__eyebrow">Araraquara · SP · Desde 2024</span>
      <h1 class="sobre-hero__title">Uma loja criada<br>por quem ama motos<br><em>e respeita gente</em></h1>
      <p class="sobre-hero__sub">Nascemos com uma missão simples: provar que dá para vender moto com honestidade, clareza e orgulho</p>
    </div>
  </section>

  <!-- ══ MANIFESTO ════════════════════════════════════════ -->
  <section class="manifesto" aria-labelledby="manifesto-title">
    <div class="manifesto__container">
      <div class="manifesto__glass">
        <span class="manifesto__label">Nossa origem</span>
        <h2 id="manifesto-title" class="manifesto__title">
          Araraquara merecia<br>algo diferente
        </h2>
        <p class="manifesto__text">
          Em 2024, a ST Motors abriu as portas com uma proposta clara: acabar com o atendimento frio, enrolado e sem compromisso que ainda domina o mercado de motos na cidade.
        </p>
        <p class="manifesto__text">
          Aqui você não precisa ficar na defensiva. Não precisa pesquisar escondido ou sentir que está sendo empurrado para uma decisão. Você chega, pergunta, testa, pensa, e só fecha o negócio quando fizer sentido <strong>para você</strong>.
        </p>
        <div class="manifesto__divider" aria-hidden="true"></div>
        <blockquote class="manifesto__quote">
          "O melhor negócio é aquele que o cliente sai satisfeito e volta. Não aquele que a gente fechou rápido."
        </blockquote>
      </div>
    </div>
  </section>

  <!-- ══ PILARES ═══════════════════════════════════════════ -->
  <section class="pilares" aria-labelledby="pilares-title">
    <div class="pilares__container">
      <header class="pilares__header">
        <span class="pilares__eyebrow">Como trabalhamos</span>
        <h2 id="pilares-title" class="pilares__title">O que você pode esperar<br>de cada visita.</h2>
      </header>
      <div class="pilares__grid">

        <article class="pilar-card">
          <div class="pilar-card__icon" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
          </div>
          <h3 class="pilar-card__title">Transparência total</h3>
          <p class="pilar-card__text">Histórico, quilometragem e condições reais. Sem omissões, sem surpresa depois da compra.</p>
        </article>

        <article class="pilar-card">
          <div class="pilar-card__icon" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          </div>
          <h3 class="pilar-card__title">Atendimento de verdade</h3>
          <p class="pilar-card__text">Sem roteiro de vendas. Ouvimos o que você precisa e te ajudamos a encontrar a moto certa, mesmo que ela não esteja no nosso estoque.</p>
        </article>

        <article class="pilar-card">
          <div class="pilar-card__icon" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
          </div>
          <h3 class="pilar-card__title">Negócio justo</h3>
          <p class="pilar-card__text">Sua moto na troca avaliada com critério. Financiamento facilitado. Preço que respeita o seu bolso. Valor real da moto.</p>
        </article>

        <article class="pilar-card">
          <div class="pilar-card__icon" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/></svg>
          </div>
          <h3 class="pilar-card__title">Zero burocracia</h3>
          <p class="pilar-card__text">Documentação, transferência e todo o processo resolvido por aqui. Você sai com a moto, sem dor de cabeça.</p>
        </article>

      </div>
    </div>
  </section>

  <!-- ══ CONTRASTE (reptiliano: dor vs. alívio) ════════════ -->
  <section class="contraste" aria-labelledby="contraste-title">
    <div class="contraste__container">
      <header class="contraste__header">
        <span class="contraste__eyebrow">A diferença na prática</span>
        <h2 id="contraste-title" class="contraste__title">O que mudamos<br>de verdade.</h2>
      </header>
      <div class="contraste__grid">
        <div class="contraste__col contraste__col--antes">
          <span class="contraste__col-label">O que você costuma encontrar</span>
          <ul class="contraste__list" aria-label="Problemas comuns no mercado">
            <li>Vendedor que empurra o que tem, não o que você precisa</li>
            <li>Informações omitidas sobre o histórico da moto</li>
            <li>Avaliação de troca abaixo do mercado, sem explicação</li>
            <li>Promessas que somem depois que a venda é fechada</li>
            <li>Pressão para decidir na hora</li>
          </ul>
        </div>
        <div class="contraste__divisor" aria-hidden="true">
          <span>vs</span>
        </div>
        <div class="contraste__col contraste__col--depois">
          <span class="contraste__col-label">O que você encontra na ST Motors</span>
          <ul class="contraste__list" aria-label="Diferenciais ST Motors">
            <li>Atendimento que escuta antes de oferecer</li>
            <li>Histórico e condições reais, sem filtro</li>
            <li>Avaliação de troca explicada, ponto a ponto</li>
            <li>Suporte mesmo depois que você saiu com a moto</li>
            <li>Você decide no seu tempo — sem pressão</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- ══ CTA FINAL ══════════════════════════════════════════ -->
  <section class="sobre-cta" aria-labelledby="sobre-cta-title">
    <div class="sobre-cta__container">
      <div class="sobre-cta__glass">
        <h2 id="sobre-cta-title" class="sobre-cta__title">Pronto para conhecer<br>a loja pessoalmente?</h2>
        <p class="sobre-cta__sub">Venha sem compromisso. Aqui você é muito bem-vindo(a)!</p>
        <div class="sobre-cta__actions">
          <a href="https://wa.me/5516997305602" target="_blank" rel="noopener noreferrer" class="sobre-cta__btn sobre-cta__btn--primary">
            <svg viewBox="0 0 24 24" fill="currentColor" width="18" height="18" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
            Falar no WhatsApp
          </a>
          <a href="https://www.google.com/maps/place/ST+Motors/@-21.7671664,-48.1660083,17z/data=!4m6!3m5!1s0x94b8f1c6f62fb805:0x94f05eebae7d573d!8m2!3d-21.7679117!4d-48.1643323!16s%2Fg%2F11y6nxlh3c?hl=pt-BR&entry=ttu&g_ep=EgoyMDI2MTEyMi4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener noreferrer" class="sobre-cta__btn sobre-cta__btn--secondary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
            Ver no mapa
          </a>
        </div>
        <p class="sobre-cta__address">R. Maurício Galli, 47 — Araraquara-SP · Seg–Sex 8h30–18h · Sáb 8h30–13h</p>
      </div>
    </div>
  </section>

</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html>
