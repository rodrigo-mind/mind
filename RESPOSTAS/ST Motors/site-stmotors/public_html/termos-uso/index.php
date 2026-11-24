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
  <title>Termos de Uso | ST Motors Araraquara</title>
  <meta name="description" content="Regras de uso do site da ST Motors: caráter informativo do estoque, simulações de financiamento, propriedade intelectual e responsabilidades.">
  <meta name="robots" content="index, follow">
  <link rel="canonical" href="<?= SITE_URL ?>/termos-uso/">
  <meta property="og:type" content="website">
  <meta property="og:title" content="Termos de Uso | ST Motors Araraquara">
  <meta property="og:description" content="Regras de uso do site da ST Motors Araraquara.">
  <meta property="og:url" content="<?= SITE_URL ?>/termos-uso/">
  <meta property="og:locale" content="pt_BR">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/assets/styles/components/header.css">
  <link rel="stylesheet" href="/assets/styles/components/footer.css">
  <style>

    /* ─── Reset de segurança contra overflow horizontal ─── */
    html, body {
      max-width: 100%;
      overflow-x: hidden;
    }

    /* ─── Compensa o header fixo/sticky do site ─── */
    .termos-page {
      background: var(--color-bg-secondary);
      padding-top: var(--header-height, 80px);
      box-sizing: border-box;
    }

    /* ============================================================
       HERO
       ============================================================ */
    .termos-hero {
      position: relative;
      background: linear-gradient(160deg, var(--color-bg-dark) 0%, var(--color-bg-dark-secondary) 100%);
      padding: 72px 24px 80px;
      overflow: hidden;
    }
    .termos-hero::before {
      content: '';
      position: absolute;
      top: -120px;
      right: -80px;
      width: 420px;
      height: 420px;
      background: radial-gradient(circle, rgba(79,158,33,.35) 0%, rgba(79,158,33,0) 70%);
      pointer-events: none;
    }
    .termos-hero__container {
      position: relative;
      max-width: 860px;
      margin: 0 auto;
      z-index: 1;
    }
    .termos-hero__eyebrow {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      font-size: .75rem;
      font-weight: 600;
      letter-spacing: .06em;
      text-transform: uppercase;
      color: var(--color-primary-light);
      margin-bottom: 18px;
    }
    .termos-hero__eyebrow svg { opacity: .8; }
    .termos-hero__title {
      font-family: 'Montserrat', sans-serif;
      font-weight: 800;
      font-size: clamp(1.75rem, 4vw, 2.5rem);
      line-height: 1.2;
      color: var(--color-text-light);
      margin-bottom: 14px;
    }
    .termos-hero__sub {
      font-size: .9375rem;
      color: rgba(250,250,248,.6);
      max-width: 560px;
      line-height: 1.65;
    }

    /* ── Painel de resumo em glassmorfismo ── */
    .termos-resumo {
      background: rgba(255,255,255,.07);
      backdrop-filter: blur(20px) saturate(150%);
      -webkit-backdrop-filter: blur(20px) saturate(150%);
      border: 1px solid rgba(255,255,255,.12);
      border-radius: 18px;
      padding: 24px 28px;
      margin-top: 36px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 18px 24px;
    }
    .termos-resumo__item {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      min-width: 0;
    }
    .termos-resumo__icon {
      flex-shrink: 0;
      width: 32px;
      height: 32px;
      border-radius: 9px;
      background: rgba(79,158,33,.2);
      border: 1px solid rgba(139,201,106,.25);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--color-primary-light);
      margin-top: 2px;
    }
    .termos-resumo__text {
      font-size: .875rem;
      color: rgba(250,250,248,.78);
      line-height: 1.5;
      min-width: 0;
    }
    .termos-resumo__text strong {
      display: block;
      color: var(--color-text-light);
      font-weight: 600;
      font-size: .875rem;
      margin-bottom: 2px;
    }

    /* ============================================================
       CORPO
       ============================================================ */
    .termos-body {
      max-width: 860px;
      margin: 0 auto;
      padding: 0 24px 96px;
      display: grid;
      grid-template-columns: 220px 1fr;
      gap: 0 48px;
      align-items: start;
      min-width: 0;
    }

    /* ── Nav lateral (âncora) ── */
    .termos-nav {
      position: sticky;
      top: calc(var(--header-height, 80px) + 32px);
      padding: 32px 0;
      min-width: 0;
    }
    .termos-nav__label {
      font-size: .7rem;
      font-weight: 700;
      letter-spacing: .08em;
      text-transform: uppercase;
      color: var(--color-text-tertiary);
      margin-bottom: 12px;
    }
    .termos-nav__list {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 2px;
      padding: 0;
      margin: 0;
    }
    .termos-nav__link {
      display: block;
      font-size: .8125rem;
      font-weight: 500;
      color: var(--color-text-secondary);
      padding: 6px 10px;
      border-radius: 7px;
      transition: background .15s, color .15s;
      line-height: 1.4;
      text-decoration: none;
    }
    .termos-nav__link:hover,
    .termos-nav__link.active {
      background: rgba(79,158,33,.08);
      color: var(--color-primary);
    }

    /* ── Conteúdo principal ── */
    .termos-content {
      padding: 40px 0;
      min-width: 0;
      font-family: 'Inter', sans-serif;
      color: var(--color-text-primary);
    }

    .termos-meta {
      font-size: .8125rem;
      color: var(--color-text-tertiary);
      margin-bottom: 32px;
    }

    .termos-intro {
      font-size: .9375rem;
      color: var(--color-text-secondary);
      line-height: 1.75;
      margin-bottom: 48px;
    }

    .termos-section {
      margin-bottom: 52px;
      scroll-margin-top: calc(var(--header-height, 80px) + 24px);
    }

    .termos-section__num {
      font-size: .75rem;
      font-weight: 700;
      letter-spacing: .06em;
      text-transform: uppercase;
      color: var(--color-primary);
      margin-bottom: 6px;
    }

    .termos-section h2 {
      font-family: 'Montserrat', sans-serif;
      font-size: 1.125rem;
      font-weight: 700;
      color: var(--color-text-primary);
      margin-bottom: 14px;
      margin-top: 0;
    }

    .termos-section p {
      font-size: .9375rem;
      color: var(--color-text-secondary);
      line-height: 1.75;
      margin-bottom: 12px;
    }
    .termos-section p:last-child { margin-bottom: 0; }

    .termos-section ul {
      list-style: none;
      padding: 0;
      margin: 12px 0;
      display: flex;
      flex-direction: column;
      gap: 8px;
    }
    .termos-section ul li {
      font-size: .9375rem;
      color: var(--color-text-secondary);
      line-height: 1.65;
      padding-left: 18px;
      position: relative;
    }
    .termos-section ul li::before {
      content: '';
      position: absolute;
      left: 0;
      top: .65em;
      width: 5px;
      height: 5px;
      border-radius: 50%;
      background: var(--color-primary);
      opacity: .7;
    }

    .termos-section strong { color: var(--color-text-primary); font-weight: 600; }
    .termos-section a { color: var(--color-primary); font-weight: 500; }

    .termos-aviso {
      background: rgba(79,158,33,.06);
      border-radius: 10px;
      padding: 14px 18px;
      margin: 16px 0;
      font-size: .875rem;
      color: var(--color-text-secondary);
      line-height: 1.65;
    }
    .termos-aviso strong { color: var(--color-text-primary); }

    /* ── Box de contato em glassmorfismo (fundo claro) ── */
    .termos-contato {
      background: rgba(255,255,255,.7);
      backdrop-filter: blur(20px) saturate(160%);
      -webkit-backdrop-filter: blur(20px) saturate(160%);
      border: 1px solid rgba(255,255,255,.9);
      border-radius: 16px;
      padding: 24px 28px;
      box-shadow: 0 4px 24px rgba(0,0,0,.06);
      margin-top: 14px;
    }
    .termos-contato p {
      font-size: .9375rem;
      color: var(--color-text-secondary);
      line-height: 1.8;
      margin: 0;
    }
    .termos-contato a { color: var(--color-primary); font-weight: 500; }
    .termos-contato strong { color: var(--color-text-primary); }

    /* ============================================================
       CTA final (glassmorfismo)
       ============================================================ */
    .termos-cta {
      padding: 8px 24px 96px;
    }
    .termos-cta__container {
      max-width: 860px;
      margin: 0 auto;
      padding-left: 268px; /* alinha visualmente com a coluna de conteúdo (220px nav + 48px gap) */
    }
    .termos-cta__glass {
      background: rgba(255,255,255,.7);
      backdrop-filter: blur(24px) saturate(160%);
      -webkit-backdrop-filter: blur(24px) saturate(160%);
      border: 1px solid rgba(255,255,255,.9);
      border-radius: 20px;
      padding: 30px 32px;
      box-shadow: 0 8px 32px rgba(0,0,0,.06);
    }
    .termos-cta__title {
      font-family: 'Montserrat', sans-serif;
      font-weight: 700;
      font-size: 1.25rem;
      color: var(--color-text-primary);
      margin-bottom: 8px;
    }
    .termos-cta__text {
      font-size: .9375rem;
      color: var(--color-text-secondary);
      margin-bottom: 20px;
      max-width: 480px;
      line-height: 1.6;
    }
    .termos-cta__actions {
      display: flex;
      flex-wrap: wrap;
      gap: 12px;
    }
    .termos-cta__btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 12px 22px;
      border-radius: 10px;
      font-weight: 600;
      font-size: .9375rem;
      text-decoration: none;
      transition: transform .15s ease, background .15s ease;
    }
    .termos-cta__btn--primary {
      background: var(--color-primary);
      color: #fff;
    }
    .termos-cta__btn--primary:hover {
      background: var(--color-primary-hover);
      transform: translateY(-1px);
    }
    .termos-cta__btn--secondary {
      background: transparent;
      color: var(--color-text-primary);
      border: 1px solid var(--color-border-medium);
    }
    .termos-cta__btn--secondary:hover {
      border-color: var(--color-text-primary);
    }

    /* ─── Responsivo ─── */
    @media (max-width: 700px) {
      .termos-body {
        grid-template-columns: 1fr;
        padding: 0 18px 72px;
      }
      .termos-nav { display: none; }
      .termos-hero { padding: 52px 18px 60px; }
      .termos-resumo { grid-template-columns: 1fr; padding: 20px; }
      .termos-content { padding: 32px 0; }
      .termos-cta { padding: 8px 18px 72px; }
      .termos-cta__container { padding-left: 0; }
      .termos-cta__glass { padding: 24px 22px; }
    }

  </style>
</head>
<body>
<?php include __DIR__ . '/../includes/header.php'; ?>

<div class="termos-page">

  <!-- ══ HERO + RESUMO (glassmorfismo) ══════════════════════ -->
  <section class="termos-hero" aria-labelledby="termos-title">
    <div class="termos-hero__container">

      <span class="termos-hero__eyebrow">
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        Documento legal
      </span>

      <h1 id="termos-title" class="termos-hero__title">Termos de Uso</h1>
      <p class="termos-hero__sub">Estas são as regras para usar o site da ST Motors Araraquara. Recomendamos a leitura completa antes de navegar pelo estoque, simular um financiamento ou entrar em contato conosco.</p>

      <div class="termos-resumo" aria-label="Resumo dos pontos principais">

        <div class="termos-resumo__item">
          <div class="termos-resumo__icon" aria-hidden="true">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
          </div>
          <div class="termos-resumo__text">
            <strong>Estoque é informativo</strong>
            Preços, fotos e disponibilidade podem mudar sem aviso prévio.
          </div>
        </div>

        <div class="termos-resumo__item">
          <div class="termos-resumo__icon" aria-hidden="true">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/></svg>
          </div>
          <div class="termos-resumo__text">
            <strong>Simulação não é aprovação</strong>
            O financiamento depende de análise da instituição parceira.
          </div>
        </div>

        <div class="termos-resumo__item">
          <div class="termos-resumo__icon" aria-hidden="true">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          </div>
          <div class="termos-resumo__text">
            <strong>Conteúdo protegido</strong>
            Marca, textos e imagens pertencem à ST Motors ou aos seus licenciantes.
          </div>
        </div>

        <div class="termos-resumo__item">
          <div class="termos-resumo__icon" aria-hidden="true">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78L12 21.23l8.84-8.84a5.5 5.5 0 0 0 0-7.78z"/></svg>
          </div>
          <div class="termos-resumo__text">
            <strong>Seus dados</strong>
            Tratados conforme a nossa Política de Privacidade e a LGPD.
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ══ CORPO ═══════════════════════════════════════════════ -->
  <div class="termos-body">

    <!-- Nav âncora lateral -->
    <nav class="termos-nav" aria-label="Índice dos termos">
      <p class="termos-nav__label">Nesta página</p>
      <ul class="termos-nav__list">
        <li><a class="termos-nav__link" href="#t1">Aceitação dos termos</a></li>
        <li><a class="termos-nav__link" href="#t2">Definições</a></li>
        <li><a class="termos-nav__link" href="#t3">Quem somos</a></li>
        <li><a class="termos-nav__link" href="#t4">Quem pode usar o site</a></li>
        <li><a class="termos-nav__link" href="#t5">Caráter informativo</a></li>
        <li><a class="termos-nav__link" href="#t6">Simulação de financiamento</a></li>
        <li><a class="termos-nav__link" href="#t7">Cadastro e veracidade</a></li>
        <li><a class="termos-nav__link" href="#t8">Uso permitido</a></li>
        <li><a class="termos-nav__link" href="#t9">Propriedade intelectual</a></li>
        <li><a class="termos-nav__link" href="#t10">Terceiros</a></li>
        <li><a class="termos-nav__link" href="#t11">Privacidade</a></li>
        <li><a class="termos-nav__link" href="#t12">Garantias e responsabilidade</a></li>
        <li><a class="termos-nav__link" href="#t13">Suspensão e rescisão</a></li>
        <li><a class="termos-nav__link" href="#t14">Disposições gerais</a></li>
        <li><a class="termos-nav__link" href="#t15">Alterações</a></li>
        <li><a class="termos-nav__link" href="#t16">Lei aplicável e foro</a></li>
        <li><a class="termos-nav__link" href="#t17">Contato</a></li>
      </ul>
    </nav>

    <!-- Conteúdo -->
    <main class="termos-content" id="main-content">

      <p class="termos-meta">Última atualização: julho de 2026</p>

      <p class="termos-intro">Estes Termos de Uso regulam o acesso e a utilização do site <strong>stmotors.com.br</strong>, operado pela ST Motors Araraquara ("ST Motors", "nós"). Ao acessar ou navegar por este site, você concorda integralmente com as condições descritas a seguir. Caso não concorde com algum ponto, recomendamos que interrompa o uso do site e entre em contato conosco pelos canais da seção 17.</p>

      <!-- 1 -->
      <section class="termos-section" id="t1" aria-labelledby="t1-title">
        <p class="termos-section__num">01</p>
        <h2 id="t1-title">Aceitação dos termos</h2>
        <p>O acesso e a navegação neste site pressupõem a leitura e a aceitação integral destes Termos de Uso e da nossa <a href="/politica-de-privacidade/">Política de Privacidade</a>. Se você utiliza o site em nome de terceiros ou de uma empresa, declara ter poderes para vinculá-los a estes Termos.</p>
      </section>

      <!-- 2 -->
      <section class="termos-section" id="t2" aria-labelledby="t2-title">
        <p class="termos-section__num">02</p>
        <h2 id="t2-title">Definições</h2>
        <p>Para os fins destes Termos, consideram-se:</p>
        <ul>
          <li><strong>Site</strong>: o portal stmotors.com.br e todas as suas páginas, formulários e funcionalidades;</li>
          <li><strong>Usuário</strong>: qualquer pessoa que acesse ou utilize o site, independentemente de cadastro;</li>
          <li><strong>Estoque</strong>: o conjunto de veículos anunciados no site como disponíveis para venda;</li>
          <li><strong>Instituição parceira</strong>: banco ou financeira que analisa e, quando aplicável, aprova propostas de financiamento encaminhadas pela ST Motors;</li>
          <li><strong>Conteúdo</strong>: textos, imagens, marcas, layout, código e demais elementos que compõem o site.</li>
        </ul>
      </section>

      <!-- 3 -->
      <section class="termos-section" id="t3" aria-labelledby="t3-title">
        <p class="termos-section__num">03</p>
        <h2 id="t3-title">Quem somos</h2>
        <p>ST Motors Araraquara é uma loja física de motos novas, usadas e seminovas, com sede na R. Mauricio Galli, 47, Araraquara/SP. Este site tem a finalidade de apresentar nosso estoque, facilitar o contato com nossa equipe e permitir a simulação de condições de financiamento.</p>
      </section>

      <!-- 4 -->
      <section class="termos-section" id="t4" aria-labelledby="t4-title">
        <p class="termos-section__num">04</p>
        <h2 id="t4-title">Quem pode usar o site</h2>
        <p>Este site se destina a maiores de 18 anos ou a menores devidamente representados ou assistidos por seus responsáveis legais, nos termos da lei. Ao utilizar os formulários de simulação de financiamento ou contato, você declara possuir capacidade civil para tanto.</p>
      </section>

      <!-- 5 -->
      <section class="termos-section" id="t5" aria-labelledby="t5-title">
        <p class="termos-section__num">05</p>
        <h2 id="t5-title">Caráter informativo do conteúdo</h2>
        <p>As informações sobre motos disponíveis — incluindo preços, fotos, quilometragem, ano e condições — têm caráter informativo e comercial, não constituindo uma oferta vinculante nos termos do art. 30 do Código de Defesa do Consumidor até a confirmação de disponibilidade e condições junto à nossa equipe.</p>
        <div class="termos-aviso">
          <strong>Aviso:</strong> trabalhamos para manter o estoque atualizado, mas uma moto anunciada pode já ter sido vendida ou ter seu preço reajustado no intervalo entre a publicação e o seu contato. Sempre confirmamos os dados finais antes do fechamento de qualquer negócio.
        </div>
      </section>

      <!-- 6 -->
      <section class="termos-section" id="t6" aria-labelledby="t6-title">
        <p class="termos-section__num">06</p>
        <h2 id="t6-title">Simulação de financiamento</h2>
        <p>A ferramenta de simulação de financiamento disponível neste site apresenta valores aproximados, calculados com base nas informações fornecidas por você e em condições gerais de mercado. Ela <strong>não representa uma proposta de crédito, aprovação prévia ou compromisso de concessão de financiamento</strong>. A aprovação final, a taxa de juros e as condições efetivas dependem exclusivamente da análise de crédito realizada pela instituição financeira parceira escolhida.</p>
      </section>

      <!-- 7 -->
      <section class="termos-section" id="t7" aria-labelledby="t7-title">
        <p class="termos-section__num">07</p>
        <h2 id="t7-title">Cadastro e veracidade das informações</h2>
        <p>Ao preencher qualquer formulário do site, você se compromete a fornecer informações verdadeiras, atuais e completas. A ST Motors não se responsabiliza por atrasos, recusas de crédito ou problemas de contato decorrentes de dados incorretos, desatualizados ou incompletos fornecidos pelo próprio usuário. Reservamo-nos o direito de solicitar confirmação adicional de identidade antes de dar sequência a um cadastro ou proposta.</p>
      </section>

      <!-- 8 -->
      <section class="termos-section" id="t8" aria-labelledby="t8-title">
        <p class="termos-section__num">08</p>
        <h2 id="t8-title">Uso permitido do site</h2>
        <p>Ao utilizar este site, você concorda em não:</p>
        <ul>
          <li>Utilizá-lo para qualquer finalidade ilícita ou não autorizada por estes Termos;</li>
          <li>Tentar acessar áreas restritas, painéis administrativos ou dados de outros usuários sem autorização;</li>
          <li>Extrair dados do site de forma automatizada (scraping, crawlers ou bots) sem autorização prévia por escrito;</li>
          <li>Interferir no funcionamento normal do site, sobrecarregar nossos servidores ou tentar comprometer sua segurança;</li>
          <li>Utilizar os formulários de contato ou WhatsApp para envio de spam, phishing ou conteúdo ofensivo;</li>
          <li>Fornecer dados falsos ou de terceiros sem autorização em qualquer formulário do site.</li>
        </ul>
        <p>O descumprimento destas regras pode resultar em bloqueio de acesso, sem prejuízo das medidas legais cabíveis.</p>
      </section>

      <!-- 9 -->
      <section class="termos-section" id="t9" aria-labelledby="t9-title">
        <p class="termos-section__num">09</p>
        <h2 id="t9-title">Propriedade intelectual</h2>
        <p>A marca ST Motors, o layout, os textos, as fotografias, os ícones e demais elementos visuais deste site são de propriedade da ST Motors Araraquara ou utilizados sob licença, sendo protegidos pela legislação de propriedade intelectual aplicável. É vedada a reprodução, distribuição ou uso comercial desses elementos sem autorização prévia e expressa. O uso indevido pode sujeitar o infrator às medidas cíveis e criminais cabíveis.</p>
      </section>

      <!-- 10 -->
      <section class="termos-section" id="t10" aria-labelledby="t10-title">
        <p class="termos-section__num">10</p>
        <h2 id="t10-title">Links e serviços de terceiros</h2>
        <p>Este site contém links e integrações com serviços de terceiros, como WhatsApp, Instagram, Google Maps e instituições financeiras parceiras. Não somos responsáveis pelo conteúdo, pelas práticas de privacidade ou pela disponibilidade desses serviços, que possuem seus próprios termos e políticas.</p>
      </section>

      <!-- 11 -->
      <section class="termos-section" id="t11" aria-labelledby="t11-title">
        <p class="termos-section__num">11</p>
        <h2 id="t11-title">Privacidade e dados pessoais</h2>
        <p>O tratamento de dados pessoais coletados por meio deste site, como nos formulários de simulação de financiamento, segue as regras descritas em nossa <a href="/politica-de-privacidade/">Política de Privacidade</a>, elaborada em conformidade com a Lei Geral de Proteção de Dados (Lei nº 13.709/2018).</p>
      </section>

      <!-- 12 -->
      <section class="termos-section" id="t12" aria-labelledby="t12-title">
        <p class="termos-section__num">12</p>
        <h2 id="t12-title">Garantias e limitação de responsabilidade</h2>
        <p>O site e suas funcionalidades são fornecidos "como estão" e "conforme disponíveis". Envidamos esforços razoáveis para manter o site disponível, atualizado e livre de erros, mas não garantimos operação ininterrupta, ausência de falhas técnicas ou que o conteúdo esteja sempre livre de imprecisões.</p>
        <p>Na máxima extensão permitida pela lei, a ST Motors não se responsabiliza por danos indiretos, incidentais ou consequenciais decorrentes do uso ou da impossibilidade de uso do site, incluindo instabilidades de conexão, indisponibilidade temporária ou desatualização pontual de informações. Nada nesta cláusula exclui direitos que não possam ser limitados por lei, especialmente em relações de consumo.</p>
      </section>

      <!-- 13 -->
      <section class="termos-section" id="t13" aria-labelledby="t13-title">
        <p class="termos-section__num">13</p>
        <h2 id="t13-title">Suspensão e rescisão de acesso</h2>
        <p>Podemos suspender ou restringir, a qualquer momento e sem aviso prévio, o acesso de usuários que violem estes Termos, tentem fraudar os formulários do site ou comprometam sua segurança ou funcionamento. Você pode encerrar seu uso do site a qualquer momento, bastando deixar de acessá-lo.</p>
      </section>

      <!-- 14 -->
      <section class="termos-section" id="t14" aria-labelledby="t14-title">
        <p class="termos-section__num">14</p>
        <h2 id="t14-title">Disposições gerais</h2>
        <p>Se qualquer disposição destes Termos for considerada inválida ou inexequível por autoridade competente, as demais disposições permanecerão em pleno vigor. A tolerância da ST Motors quanto ao eventual descumprimento de qualquer cláusula não representa renúncia ao direito de exigi-la posteriormente. Estes Termos, em conjunto com a Política de Privacidade, constituem o entendimento integral entre as partes sobre o uso do site.</p>
      </section>

      <!-- 15 -->
      <section class="termos-section" id="t15" aria-labelledby="t15-title">
        <p class="termos-section__num">15</p>
        <h2 id="t15-title">Alterações destes Termos</h2>
        <p>Estes Termos de Uso podem ser atualizados periodicamente para refletir mudanças em nossos serviços, no site ou na legislação aplicável. A data da última atualização está sempre indicada no topo desta página. O uso continuado do site após uma alteração implica concordância com os novos termos.</p>
      </section>

      <!-- 16 -->
      <section class="termos-section" id="t16" aria-labelledby="t16-title">
        <p class="termos-section__num">16</p>
        <h2 id="t16-title">Legislação aplicável e foro</h2>
        <p>Estes Termos são regidos pelas leis da República Federativa do Brasil. Fica eleito o foro da Comarca de Araraquara/SP para dirimir quaisquer controvérsias decorrentes destes Termos, com renúncia a qualquer outro, por mais privilegiado que seja, ressalvada a prerrogativa legal de usuários enquadrados no conceito de consumidor.</p>
      </section>

      <!-- 17 -->
      <section class="termos-section" id="t17" aria-labelledby="t17-title">
        <p class="termos-section__num">17</p>
        <h2 id="t17-title">Fale conosco</h2>
        <p>Para dúvidas sobre estes Termos de Uso, entre em contato pelos canais abaixo:</p>
        <div class="termos-contato">
          <p>
            <strong>ST Motors Araraquara</strong><br>
            R. Mauricio Galli, 47 &mdash; Araraquara/SP<br>
            Telefone: (16) 3014-7386<br>
            Instagram: <a href="https://www.instagram.com/stmotors_ara/" target="_blank" rel="noopener noreferrer">@stmotors_ara</a>
          </p>
        </div>
      </section>

    </main>
  </div>

  <!-- ══ CTA FINAL (glassmorfismo) ══════════════════════════ -->
  <section class="termos-cta">
    <div class="termos-cta__container">
      <div class="termos-cta__glass">
        <h2 class="termos-cta__title">Ficou com alguma dúvida sobre estes termos?</h2>
        <p class="termos-cta__text">Fale com a gente antes de fechar negócio ou simular um financiamento. Respondemos rápido pelo WhatsApp.</p>
        <div class="termos-cta__actions">
          <a href="https://wa.me/<?= WHATSAPP_NUMERO ?>" target="_blank" rel="noopener noreferrer" class="termos-cta__btn termos-cta__btn--primary">
            <svg viewBox="0 0 24 24" fill="currentColor" width="16" height="16" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
            Falar no WhatsApp
          </a>
          <a href="/politica-de-privacidade/" class="termos-cta__btn termos-cta__btn--secondary">
            Ver Política de Privacidade
          </a>
        </div>
      </div>
    </div>
  </section>

</div><!-- /.termos-page -->

<?php include __DIR__ . '/../includes/footer.php'; ?>

<script>
  // Marca o link ativo na nav lateral conforme o scroll
  (function () {
    var links = document.querySelectorAll('.termos-nav__link');
    var sections = Array.from(links).map(function (l) {
      return document.querySelector(l.getAttribute('href'));
    });

    function onScroll() {
      var scrollY = window.scrollY + 120;
      var current = sections[0];
      sections.forEach(function (s) {
        if (s && s.offsetTop <= scrollY) current = s;
      });
      links.forEach(function (l) {
        l.classList.toggle('active', l.getAttribute('href') === '#' + (current && current.id));
      });
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
  })();
</script>

</body>
</html>