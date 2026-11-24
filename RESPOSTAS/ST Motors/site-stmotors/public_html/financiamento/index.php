<?php
define('APP_LOADED', true);
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/security.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- SEO Meta Tags -->
  <title>Financiamento de Motos Facilitado | ST Motors Araraquara</title>
  <meta name="description"
    content="Realize o sonho da sua moto com financiamento acessível. Aprovação rápida, taxas competitivas e parcelas que cabem no bolso. Simule agora!">
  <meta name="author" content="ST Motors">
  <meta name="robots" content="index, follow">
  <meta name="theme-color" content="#4f9e21">
  <link rel="canonical" href="<?= SITE_URL ?>/financiamento/">

  <!-- Open Graph -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="Financiamento de Motos Facilitado | ST Motors Araraquara">
  <meta property="og:description"
    content="Parcelas que cabem no bolso. Aprovação rápida, taxas competitivas e condições personalizadas para você.">
  <meta property="og:url" content="<?= SITE_URL ?>/financiamento/">
  <meta property="og:image" content="<?= SITE_URL ?>/assets/images/st-og.jpg">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:locale" content="pt_BR">
  <meta property="og:site_name" content="ST Motors Araraquara">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Financiamento de Motos Facilitado | ST Motors">
  <meta name="twitter:description" content="Parcelas que cabem no bolso. Aprovação rápida e taxas competitivas.">
  <meta name="twitter:image" content="<?= SITE_URL ?>/assets/images/st-og.jpg">

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="../favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="../favicon.svg" />
  <link rel="shortcut icon" href="../favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png" />
  <link rel="manifest" href="../site.webmanifest" />

  <!-- Fonte otimizada com display swap -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
    as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap">
  </noscript>

  <!-- Preload Critical Resources -->
  <link rel="preload" href="/assets/styles/components/header.css" as="style">
  <link rel="preload" href="/assets/styles/components/footer.css" as="style">
  <link rel="preload" href="/assets/styles/financiamento.css" as="style">
  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
    as="style">

  <!-- DNS Prefetch para recursos externos futuros -->
  <link rel="dns-prefetch" href="https://www.google-analytics.com">
  <link rel="dns-prefetch" href="https://api.whatsapp.com">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" href="/assets/styles/components/header.css">
  <link rel="stylesheet" href="/assets/styles/components/footer.css">
  <!-- CSS Específico de Financiamento -->
  <link rel="stylesheet" href="/assets/styles/financiamento.css">

  <!-- Schema.org - WebPage (Financiamento) -->
  <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Financiamento de Motos | ST Motors Araraquara",
  "description": "Financiamento facilitado para motos usadas e seminovas. Aprovação rápida, taxas competitivas e parcelas flexíveis.",
  "url": "<?= SITE_URL ?>/financiamento/",
  "inLanguage": "pt-BR",
  "isPartOf": {
    "@type": "WebSite",
    "name": "ST Motors Araraquara",
    "url": "<?= SITE_URL ?>"
  },
  "breadcrumb": {
    "@type": "BreadcrumbList",
    "itemListElement": [
      {
        "@type": "ListItem",
        "position": 1,
        "name": "Home",
        "item": "<?= SITE_URL ?>"
      },
      {
        "@type": "ListItem",
        "position": 2,
        "name": "Financiamento",
        "item": "<?= SITE_URL ?>/financiamento/"
      }
    ]
  },
  "about": {
    "@type": "FinancialProduct",
    "name": "Financiamento de Motocicletas",
    "description": "Crédito para compra de motos usadas e seminovas com aprovação rápida e taxas competitivas",
    "provider": {
      "@type": "MotorcycleDealer",
      "name": "ST Motors",
      "url": "<?= SITE_URL ?>",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "R. Maurício Galli, 47",
        "addressLocality": "Araraquara",
        "addressRegion": "SP",
        "postalCode": "14806-155",
        "addressCountry": "BR"
      },
      "telephone": "+5516997305602"
    },
    "offers": {
      "@type": "Offer",
      "category": "Financiamento de Veículos",
      "priceCurrency": "BRL",
      "availableAtOrFrom": {
        "@type": "Place",
        "address": {
          "@type": "PostalAddress",
          "addressLocality": "Araraquara",
          "addressRegion": "SP"
        }
      }
    }
  },
  "mainEntity": {
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "Como funciona o financiamento de motos?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "O financiamento permite dividir o valor da moto em parcelas mensais. Após análise de crédito e aprovação, você escolhe entrada, prazo e recebe a moto imediatamente."
        }
      },
      {
        "@type": "Question",
        "name": "Qual o score mínimo para financiar uma moto?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Não há score mínimo fixo. Scores entre 501-700 têm ótimas chances. Scores acima de 701 garantem melhores taxas. Mesmo com score em construção, há opções disponíveis."
        }
      },
      {
        "@type": "Question",
        "name": "Quais documentos são necessários?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "CPF, RG, CNH, comprovante de residência, comprovante de renda (holerite ou extrato bancário) e dados para análise de crédito."
        }
      }
    ]
  }
}
</script>

  <!-- Schema.org - Local Business (Herança da página principal) -->
  <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "MotorcycleDealer",
  "name": "ST Motors",
  "description": "Loja especializada em motos usadas, seminovas e novas em Araraquara-SP. Financiamento facilitado, procedência garantida e atendimento personalizado.",
  "image": [
    "<?= SITE_URL ?>/assets/images/st-og.jpg",
    "<?= SITE_URL ?>/assets/images/logo-header.svg"
  ],
  "url": "<?= SITE_URL ?>",
  "telephone": "+551630147386",
  "priceRange": "R$ 5.000 - R$ 50.000",
  "paymentAccepted": "Dinheiro, Cartão de Crédito, Cartão de Débito, Financiamento",
  "currenciesAccepted": "BRL",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+5516997305602",
    "contactType": "sales",
    "areaServed": "BR",
    "availableLanguage": ["Portuguese"],
    "contactOption": "TollFree"
  },
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "R. Maurício Galli, 47",
    "addressLocality": "Araraquara",
    "addressRegion": "SP",
    "postalCode": "14806-155",
    "addressCountry": "BR"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": -21.767900187638183,
    "longitude": -48.164309978264384
  },
  "openingHoursSpecification": [
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": [
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday"
      ],
      "opens": "08:30",
      "closes": "18:00"
    },
    {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": "Saturday",
      "opens": "08:30",
      "closes": "13:00"
    }
  ],
  "sameAs": [
    "https://www.instagram.com/stmotors_ara/",
    "https://www.facebook.com/St.Motors.Araraquara"
  ]
}
</script>
</head>

<body>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

  <!-- MAIN CONTENT -->
  <main id="main-content" class="financing-page">

    <!-- HERO SECTION -->
    <section class="hero-financing" aria-labelledby="hero-title">
      <div class="hero-financing__container">

        <!-- Título Principal -->
        <h1 id="hero-title" class="hero-financing__title">
          <p>Entenda</p> <span class="highlight">Financiamento</span>
        </h1>

        <!-- Subtítulo -->
        <p class="hero-financing__subtitle">
         Financiamento é uma forma de parcelamento que os bancos disponibilizam para você parcelar a moto que deseja, em até 48x, do jeito que cabe no seu bolso.
        </p>
        
        <p class="hero-financing__subtitle">
         Simule sua parcela sem compromisso.
        </p>

        <!-- Trust Indicators -->
        <div class="hero-financing__trust">
          <div class="trust-item">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <path d="M12 2v20M2 12h20" />
            </svg>
            <span>Aprovação rápida</span>
          </div>
          <div class="trust-item">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <path d="M12 2L2 7l10 5 10-5-10-5z" />
              <path d="M2 17l10 5 10-5M2 12l10 5 10-5" />
            </svg>
            <span>Taxas competitivas</span>
          </div>
        </div>

      </div>

      <!-- ================================
     SIMULATION LINK SECTION
     ================================ -->
      <section class="simulation-link-section" aria-labelledby="simulation-link-title">
        <div class="simulation-link-section__container">

          

          <a href="whatsapp-simulacao/" class="simulation-glass-link" target="_blank"
  rel="noopener noreferrer" aria-label="Fazer simulação de financiamento agora">

  <div class="simulation-glass-link__main">
    <!-- Ícone de Calculadora -->
    <div class="simulation-glass-link__icon">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <rect x="4" y="2" width="16" height="20" rx="2" />
        <line x1="8" y1="6" x2="16" y2="6" />
        <line x1="16" y1="14" x2="16" y2="18" />
        <line x1="8" y1="14" x2="8" y2="18" />
        <line x1="12" y1="14" x2="12" y2="18" />
        <line x1="8" y1="10" x2="16" y2="10" />
      </svg>
    </div>

    <!-- Conteúdo -->
    <div class="simulation-glass-link__content">
      <h3 id="simulation-link-title" class="simulation-glass-link__title">
        Simule Agora
      </h3>
    </div>
  </div>

</a>

        <!-- Explicação curta sobre a simulação -->
          <p class="simulation-link-section__hint">
            <strong>O que é a simulação?</strong> É uma consulta rápida e gratuita para descobrir suas condições de financiamento, sem compromisso.
          </p>
          
        </div>
      </section>

      <!-- Imagem Hero -->
      <div class="hero-financing__image-wrapper">
        <img src="recebendo-chave.png" alt="Cliente sorrindo ao receber a chave de uma moto na ST Motors, com a moto ao fundo"
          width="1536" height="1024" loading="eager" class="hero-financing__image">
      </div>
    </section>

    <!-- ANALYSIS SECTION -->
    <section class="analysis-section" aria-labelledby="analysis-title">
      <div class="analysis-section__container">

        <div class="analysis-section__content">
          <span class="section-eyebrow">Critérios de Aprovação</span>
          <h2 id="analysis-title" class="section-title">
            O Que os Bancos Avaliam?
          </h2>
          <p class="section-intro">
            As instituições analisam seu perfil completo para garantir uma proposta que te atenda.
          </p>
        </div>

        <div class="analysis-grid">

          <div class="analysis-item">
            <div class="analysis-item__icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path
                  d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
              </svg>
            </div>
            <h3 class="analysis-item__title">Score de Crédito</h3>
            <p class="analysis-item__description">Reflete seu histórico financeiro e ajuda a definir <strong>taxas e
                condições</strong></p>
          </div>

          <div class="analysis-item">
            <div class="analysis-item__icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12" />
              </svg>
            </div>
            <h3 class="analysis-item__title">Histórico Positivo</h3>
            <p class="analysis-item__description">Pagamentos em dia das contas</p>
          </div>

          <div class="analysis-item">
            <div class="analysis-item__icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                <polyline points="9 22 9 12 15 12 15 22" />
              </svg>
            </div>
            <h3 class="analysis-item__title">Estabilidade</h3>
            <p class="analysis-item__description">Endereço comprovado, emprego fixo ou negócio próprio gera <strong>confiança</strong>
            </p>
          </div>

        </div>

      </div>
    </section>

    <!-- BENEFITS SECTION -->
    <section class="benefits-section" aria-labelledby="benefits-title">
      <div class="benefits-section__container">

        <div class="benefits-section__header">
          <span class="section-eyebrow">Por Que Financiar?</span>
          <h2 id="benefits-title" class="section-title">
            Vantagens de Financiar Sua Moto
          </h2>
        </div>

        <div class="benefits-grid">

          <article class="benefit-card">
            <div class="benefit-card__number">01</div>
            <div class="benefit-card__content">
              <h3 class="benefit-card__title">Entrega Imediata</h3>
              <p class="benefit-card__description">
                Diferente de consórcios, não tem sorteio. <strong>Aprovou, a moto é sua!</strong>
              </p>
            </div>
          </article>

          <article class="benefit-card">
            <div class="benefit-card__number">02</div>
            <div class="benefit-card__content">
              <h3 class="benefit-card__title">Parcelas Fixas</h3>
              <p class="benefit-card__description">
                Controle total do orçamento, sabendo o valor exato do <strong>início ao fim</strong>
              </p>
            </div>
          </article>

          <article class="benefit-card">
            <div class="benefit-card__number">03</div>
            <div class="benefit-card__content">
              <h3 class="benefit-card__title">Antecipação Inteligente</h3>
              <p class="benefit-card__description">
                Quite antes com <strong>descontos nos juros</strong> e economize bastante
              </p>
            </div>
          </article>

        </div>

      </div>
    </section>

    <!-- STEPS SECTION -->
    <section class="steps-section" aria-labelledby="steps-title">
      <div class="steps-section__container">

        <div class="steps-section__header">
          <span class="section-eyebrow">Como Funciona</span>
          <h2 id="steps-title" class="section-title">
            Passo a Passo para Realizar o Sonho
          </h2>
        </div>

        <div class="steps-timeline">

          <div class="step-item">
            <div class="step-item__marker">
              <span class="step-number">1</span>
            </div>
            <div class="step-item__content">
              <h3 class="step-item__title">Escolha seu Modelo</h3>
              <p class="step-item__description">Defina a moto que melhor atende sua rotina (trabalho ou lazer)</p>
            </div>
          </div>

          <div class="step-item">
            <div class="step-item__marker">
              <span class="step-number">2</span>
            </div>
            <div class="step-item__content">
              <h3 class="step-item__title">Organize as Informações</h3>
              <p class="step-item__description">CPF, data de nascimento, telefone, CNH, renda mensal e, se pretende
                dar entrada, qual valor</p>
            </div>
          </div>

          <div class="step-item">
            <div class="step-item__marker">
              <span class="step-number">3</span>
            </div>
            <div class="step-item__content">
              <h3 class="step-item__title">Comprovação de Renda</h3>
              <p class="step-item__description">Em alguns casos pode ser pedido holerite ou extrato bancário que engloba todos os ganhos mensais</p>
            </div>
          </div>

        </div>

      </div>
    </section>

    <!-- CTA FINAL SECTION -->
    <section class="cta-final-section" aria-labelledby="cta-title">
      <div class="cta-final-section__container">

        <div class="cta-glass-card">

          <div class="cta-glass-card__content">
            <h2 id="cta-title" class="cta-glass-card__title">
              Planeje Agora, <br class="hide-mobile">Desfrute Para Sempre
            </h2>
            <p class="cta-glass-card__description">
              A chave para uma compra perfeita é um pequeno planejamento inicial. Faça sua simulação gratuita e descubra
              as melhores condições para você.
            </p>
          </div>

          <!-- Explicação sobre Simulação -->
          <div class="simulation-info">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="10" />
              <path d="M12 16v-4" />
              <path d="M12 8h.01" />
            </svg>
            <p class="simulation-info__text">
              <strong>O que é a simulação?</strong> É uma análise gratuita onde calculamos as melhores condições de
              financiamento baseadas no seu perfil. Você recebe valores de parcelas, prazos e taxas sem compromisso.
            </p>
          </div>

          <!-- Botão WhatsApp Simulation -->
          <a href="whatsapp-simulacao/"
            class="cta-whatsapp-button" target="_blank" rel="noopener noreferrer"
            aria-label="Fazer simulação de financiamento pelo WhatsApp">
            <svg class="cta-whatsapp-button__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
              viewBox="0 0 24 24" fill="currentColor">
              <path
                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
            </svg>
            <span class="cta-whatsapp-button__text">Quero Simular Grátis</span>
          </a>

        </div>

      </div>
    </section>

  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>

  <!-- WhatsApp Floating Button -->
  <a href="https://wa.me/5516997305602?text=Olá!%20Vim%20pelo%20site%20e%20gostaria%20de%20mais%20informações"
    target="_blank" rel="noopener noreferrer" class="whatsapp-float" aria-label="Fale conosco pelo WhatsApp"
    title="Fale conosco pelo WhatsApp">
    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
      <path fill="currentColor"
        d="M16.002 3C8.82 3 3 8.82 3 16.002c0 2.278.593 4.506 1.721 6.464L3.039 28.96l6.707-1.759A12.954 12.954 0 0016.002 29C23.182 29 29 23.182 29 16.002S23.182 3 16.002 3zm7.538 18.423c-.314.885-1.562 1.623-2.565 1.835-.682.143-1.572.259-4.568-.982-3.83-1.586-6.307-5.463-6.497-5.715-.182-.252-1.544-2.055-1.544-3.921 0-1.867.98-2.784 1.328-3.164.348-.38.76-.475 1.015-.475.254 0 .507.002.729.013.234.012.548-.089.857.654.314.757 1.071 2.613 1.165 2.803.094.19.157.412.032.664-.126.253-.189.41-.377.631-.19.222-.397.495-.568.664-.19.19-.388.395-.167.775.222.38 .986 1.624 2.116 2.631 1.456 1.297 2.683 1.701 3.063 1.892.38.19.602.158.823-.095.222-.253.949-1.108 1.202-1.488.253-.38.507-.317.855-.19.348.126 2.213 1.043 2.593 1.234.38.19.633.285.728.443.094.158.094.917-.22 1.802z" />
    </svg>
    <span class="whatsapp-float__pulse"></span>
  </a>

  <!-- JavaScript -->
  <script src="/assets/scripts/financiamento.js" defer></script>

</body>

</html>