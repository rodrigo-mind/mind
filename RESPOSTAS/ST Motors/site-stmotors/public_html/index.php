<?php
define('APP_LOADED', true);
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/security.php';
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/money.php';

$avaliacoes = [];
$destaques  = [];
try {
    $db = getDB();
    $avaliacoes = $db->query('SELECT * FROM avaliacoes WHERE ativo = 1 ORDER BY ordem ASC, criado_em DESC')->fetchAll();
    $destaques  = $db->query(
        'SELECT m.*, (SELECT arquivo FROM moto_fotos WHERE moto_id = m.id AND principal = 1 LIMIT 1) AS foto
         FROM motos m WHERE m.ativo = 1 AND m.destaque = 1
         ORDER BY m.ordem_destaque ASC LIMIT 5'
    )->fetchAll();
} catch (PDOException $e) {
    $avaliacoes = [];
    $destaques = [];
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ST Motors Araraquara | Motos Novas, Seminovas e Usadas com Garantia</title>
    <meta name="description" content="Encontre a moto ideal em Araraquara. Motos usadas e seminovas com procedência garantida, financiamento facilitado e atendimento personalizado.">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#0F0F0F">
    <link rel="canonical" href="<?= SITE_URL ?>">
    
    <meta name="google-site-verification" content="NHip5e3LsNh6DOOAGfLemumBBt8vY2FVnteh8aYCsIU" />

    <meta name="facebook-domain-verification" content="zye328cd49805ckhjci5xpu1fgy3si" />
    
    <meta property="og:type" content="website">
    <meta property="og:title" content="ST Motors Araraquara | Motos Usadas e Seminovas">
    <meta property="og:description" content="Encontre a moto ideal em Araraquara.">
    <meta property="og:url" content="<?= SITE_URL ?>">
    <meta property="og:image" content="<?= SITE_URL ?>/assets/images/st-og.jpg">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:site_name" content="ST Motors Araraquara">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="icon" type="image/png" href="favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/svg+xml" href="favicon.svg">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" href="/assets/styles/components/header.css" as="style">
    <link rel="preload" href="/assets/styles/home.css" as="style">
    <link rel="preload" as="image" href="/assets/images/home/hero-bg.jpg" fetchpriority="high">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/styles/components/header.css">
    <link rel="stylesheet" href="/assets/styles/components/footer.css">
    <link rel="stylesheet" href="/assets/styles/home.css?v2">
        <script type="application/ld+json">
        <?= json_encode([
            '@context' => 'https://schema.org',
            '@type'    => 'MotorcycleDealer',
            '@id'      => SITE_URL . '/#negocio',
            'name'     => 'ST Motors',
            'description' => 'Concessionária especializada em motos usadas e seminovas em Araraquara, com garantia e procedência.',
            'url'      => SITE_URL,
            'telephone' => '+' . TELEFONE_NUMERO,
            'image'    => SITE_URL . '/assets/images/home/st-motors-araraquara-motos-usadas-seminovas-frente.jpg',
            'priceRange' => 'R$$',
            'address'  => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'R. Maurício Galli, 47',
                'addressLocality' => 'Araraquara',
                'addressRegion' => 'SP',
                'postalCode' => '14806-155',
                'addressCountry' => 'BR',
            ],
            'geo' => ['@type' => 'GeoCoordinates', 'latitude' => -21.76789914959822, 'longitude' => -48.16433406697387],
            'openingHoursSpecification' => [
                [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => [
                        'https://schema.org/Monday',
                        'https://schema.org/Tuesday',
                        'https://schema.org/Wednesday',
                        'https://schema.org/Thursday',
                        'https://schema.org/Friday',
                    ],
                    'opens' => '08:30',
                    'closes' => '18:00',
                ],
                [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => 'https://schema.org/Saturday',
                    'opens' => '08:30',
                    'closes' => '13:00',
                ],
            ],
            'sameAs' => ['https://www.instagram.com/stmotors_ara/', 'https://www.facebook.com/St.Motors.Araraquara'],
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>
    </script>
    <script type="application/ld+json">
        <?= json_encode([
            '@context' => 'https://schema.org',
            '@type'    => 'WebSite',
            'name'     => 'ST Motors Araraquara',
            'url'      => SITE_URL,
            'potentialAction' => [
                '@type'  => 'SearchAction',
                'target' => ['@type' => 'EntryPoint', 'urlTemplate' => SITE_URL . '/estoque?q={search_term_string}'],
                'query-input' => 'required name=search_term_string',
            ],
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?>
    </script>
</head>

<body>
    <?php include __DIR__ . '/includes/header.php'; ?>
    <main id="main-content">

        <!-- HERO -->
        <section id="home" class="hero" role="region" aria-label="Busca de motos">
            <div class="hero__background">
                <picture class="hero__background-image">
                    <source srcset="/assets/images/home/hero-bg.jpg" type="image/jpeg">
                    <img src="/assets/images/home/hero-bg.jpg" alt="Motociclista em moto esportiva em estrada" loading="eager" width="1920" height="1080">
                </picture>
                <div class="hero__overlay" aria-hidden="true"></div>
            </div>
            <a href="https://www.google.com/maps/place/ST+Motors/@-21.7671664,-48.1660083,17.1z/data=!4m6!3m5!1s0x94b8f1c6f62fb805:0x94f05eebae7d573d!8m2!3d-21.7679117!4d-48.1643323!16s%2Fg%2F11y6nxlh3c?hl=pt-BR&entry=ttu&g_ep=EgoyMDI2MTExOC4xIKXMDSoASAFQAw%3D%3D"
                target="_blank" rel="noopener noreferrer" class="hero__location-badge" aria-label="Ver localização no Google Maps">
                <svg class="hero__location-icon" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                    <circle cx="12" cy="10" r="3" />
                </svg>
                <div class="hero__location-text">
                    <span class="hero__location-city">Araraquara-SP</span>
                    <span class="hero__location-cta">Pesquisando motos?<br>Venha nos visitar</span>
                </div>
            </a>
            <div class="hero__content">
                <span class="hero__eyebrow">Conquiste Sua Liberdade</span>
                <form class="hero__search" role="search" aria-label="Busca de motos" method="GET" action="/estoque">
                    <div class="hero__search-wrapper">
                        <label for="search-input" class="visually-hidden">Qual moto você procura?</label>
                        <input type="search" id="search-input" name="q" class="hero__search-input"
                            placeholder="Buscar marca, modelo, categoria…"
                            aria-label="Busca de motos" aria-autocomplete="list"
                            aria-controls="search-suggestions" aria-expanded="false"
                            autocomplete="off" spellcheck="false">
                        <button type="submit" class="hero__search-button" aria-label="Buscar">
                            <svg class="hero__search-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.35-4.35" />
                            </svg>
                            <span class="visually-hidden">Buscar</span>
                        </button>
                    </div>
                    <div class="hero__search-suggestions" id="search-suggestions" role="listbox" aria-label="Sugestões" hidden></div>
                </form>
            </div>
        </section>

        <!-- SOCIAL LINKS -->
        <section class="social-links" aria-label="Redes sociais">
            <div class="social-links__container">
                <a href="https://wa.me/<?= WHATSAPP_NUMERO ?>" target="_blank" rel="noopener noreferrer" class="social-links__item social-links__item--whatsapp" aria-label="WhatsApp">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                    </svg>
                </a>
                <a href="https://www.facebook.com/StMotorsPage" target="_blank" rel="noopener noreferrer" class="social-links__item social-links__item--facebook" aria-label="Facebook">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                    </svg>
                </a>
                <a href="https://www.instagram.com/stmotors_ara/" target="_blank" rel="noopener noreferrer" class="social-links__item social-links__item--instagram" aria-label="Instagram">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                    </svg>
                </a>
                <a href="https://www.google.com/maps/place/R.+Maur%C3%ADcio+Galli,+47" target="_blank" rel="noopener noreferrer" class="social-links__item social-links__item--maps" aria-label="Google Maps">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                        <circle cx="12" cy="10" r="3" />
                    </svg>
                </a>
            </div>
        </section>

        <!-- VALUE / TRUST -->
        <section class="value-section" role="region" aria-labelledby="value-heading">
            <div class="value-section__container">
                <h1 id="value-heading" class="value-section__title">Encontre a Moto Ideal em Araraquara com Condições Facilitadas</h1>
                <h2 class="value-section__subtitle">Realize o sonho da sua moto com parceiros de confiança</h2>
                <div class="trust-grid">

                    <a href="/financiamento">
                        <article class="trust-card">
                            <div class="trust-card__icon-wrapper">
                                <div class="trust-card__icon" aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="12" y1="1" x2="12" y2="23" />
                                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                                    </svg>
                                </div>
                            </div>
                            <div class="trust-card__content">
                                <h3 class="trust-card__title">Financiamento Acessível</h3>
                                <p class="trust-card__description">Parcelas que cabem no seu bolso com taxas competitivas e aprovação rápida</p>
                            </div>
                        </article>
                    </a>

                    <a href="/negociacao-garantia">
                        <article class="trust-card">
                            <div class="trust-card__icon-wrapper">
                                <div class="trust-card__icon" aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect width="18" height="11" x="3" y="11" rx="2" ry="2" />
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                    </svg>
                                </div>
                            </div>
                            <div class="trust-card__content">
                                <h3 class="trust-card__title">Negociação Segura</h3>
                                <p class="trust-card__description">Documentação verificada em cada moto para você comprar com tranquilidade</p>
                            </div>
                        </article>
                    </a>

                    <a href="/negociacao-garantia">
                        <article class="trust-card">
                            <div class="trust-card__icon-wrapper">
                                <div class="trust-card__icon" aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                                        <path d="m9 12 2 2 4-4" />
                                    </svg>
                                </div>
                            </div>
                            <div class="trust-card__content">
                                <h3 class="trust-card__title">Garantia</h3>
                                <p class="trust-card__description">Motos revisadas com garantia mecânica e documentação regularizada</p>
                            </div>
                        </article>
                    </a>

                </div>
            </div>
        </section>

        <!-- DESTAQUES -->
        <section id="estoque" class="featured" role="region" aria-labelledby="featured-heading">
            <div class="featured__container">
                <header class="featured__header">
                    <div class="featured__title-wrapper">
                        <span class="featured__line featured__line--top" aria-hidden="true"></span>
                        <h2 id="featured-heading" class="featured__title">Destaques</h2>
                        <span class="featured__line featured__line--bottom" aria-hidden="true"></span>
                    </div>
                    <p class="featured__subtitle">Qualidade e confiança em cada modelo, para quem valoriza boas escolhas</p>
                </header>

                <?php if (!empty($destaques)): ?>
                    <div class="featured__grid">
                        <?php foreach ($destaques as $m): ?>
                            <article class="bike-card">
                                <a href="/estoque/motos/<?= htmlspecialchars($m['slug'], ENT_QUOTES, 'UTF-8') ?>"
                                    class="bike-card__link"
                                    aria-label="Ver detalhes: <?= htmlspecialchars($m['marca'] . ' ' . $m['modelo'], ENT_QUOTES, 'UTF-8') ?>">
                                    <div class="bike-card__image-wrapper">
                                        <?php if (!empty($m['foto'])): ?>
                                            <img src="<?= htmlspecialchars($m['foto'], ENT_QUOTES, 'UTF-8') ?>"
                                                alt="<?= htmlspecialchars($m['marca'] . ' ' . $m['modelo'], ENT_QUOTES, 'UTF-8') ?>"
                                                class="bike-card__image" loading="lazy" width="400" height="300">
                                        <?php else: ?>
                                            <div class="bike-card__no-foto" aria-hidden="true">🏍️</div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="bike-card__content">
                                        <h5 class="bike-card__brand"><?= htmlspecialchars(strtoupper($m['marca']), ENT_QUOTES, 'UTF-8') ?></h5>
                                        <h3 class="bike-card__name"><?= htmlspecialchars($m['modelo'], ENT_QUOTES, 'UTF-8') ?></h3>
                                        <div class="bike-card__specs">
                                            <span class="bike-card__spec">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                    <path d="M7 3h10a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z" />
                                                    <path d="M5 7h14M5 10h14M12 14v4" />
                                                    <circle cx="12" cy="20" r="2" />
                                                </svg>
                                                <?= (int)$m['cilindrada'] ?>cc
                                            </span>
                                            <span class="bike-card__spec">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />
                                                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z" />
                                                </svg>
                                                <?= htmlspecialchars($m['categoria'], ENT_QUOTES, 'UTF-8') ?>
                                            </span>
                                            <span class="bike-card__spec">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                    <rect x="3" y="4" width="18" height="18" rx="2" />
                                                    <line x1="16" y1="2" x2="16" y2="6" />
                                                    <line x1="8" y1="2" x2="8" y2="6" />
                                                    <line x1="3" y1="10" x2="21" y2="10" />
                                                </svg>
                                                <?= htmlspecialchars($m['ano'], ENT_QUOTES, 'UTF-8') ?>
                                            </span>
                                            <?php if ($m['km'] > 0): ?>
                                                <span class="bike-card__spec">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                        <circle cx="12" cy="12" r="10" />
                                                        <polyline points="12 6 12 12 16 14" />
                                                    </svg>
                                                    <?= number_format((int)$m['km'], 0, ',', '.') ?> km
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="bike-card__footer">
                                            <p class="bike-card__price">
                                                <span class="bike-card__price-label">A partir de</span>
                                                <span class="bike-card__price-value">R$ <?= precoExibir($m['preco']) ?></span>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </article>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p style="text-align:center;padding:3rem 1rem;color:rgba(255,255,255,.35);font-size:.95rem">
                        Nenhum destaque configurado no momento. Configure os destaques no painel admin.
                    </p>
                <?php endif; ?>

                <div class="featured__arrows">
                    <svg width="40" height="60" viewBox="0 0 24 40" xmlns="http://www.w3.org/2000/svg">
                        <path class="arrow arrow-1" d="M6 10L12 16L18 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none" />
                        <path class="arrow arrow-2" d="M6 22L12 28L18 22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none" />
                    </svg>
                </div>
                <div class="featured__cta-wrapper">
                    <a href="/estoque" class="featured__cta">Ver estoque completo</a>
                    <div class="featured__cta-subtext">
                        <svg class="check-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" role="img" aria-hidden="true">
                            <polyline points="20 6 9 17 4 12" />
                        </svg>
                        <span>As melhores motos de Araraquara a sua espera</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- AVALIACOES -->
        <section class="testimonials" aria-labelledby="testimonials-title">
            <div class="testimonials__container">
                <header class="testimonials__header">
                    <h2 class="testimonials__title">Avaliacoes</h2>
                    <h2 id="testimonials-title-st" class="testimonials__title">ST Motors</h2>
                    <img src="assets/images/home/google-img.png" id="img-google" alt="Avaliacoes 5 estrelas ST Motors no Google">
                    <p class="testimonials__subtitle">Avaliacoes reais de clientes que conquistaram sua moto com a ST Motors</p>
                </header>
                <?php if (!empty($avaliacoes)): ?>
                    <div class="testimonials__slider-wrapper">
                        <div class="testimonials__slider" id="testimonials-slider" role="region" aria-label="Carrossel de depoimentos">
                            <?php foreach ($avaliacoes as $av): ?>
                                <article class="testimonial-card">
                                    <?php if (!empty($av['foto'])): ?>
                                        <div class="testimonial-card__image-wrapper">
                                            <img src="<?= htmlspecialchars($av['foto'], ENT_QUOTES, 'UTF-8') ?>" alt="Foto de <?= htmlspecialchars($av['nome'], ENT_QUOTES, 'UTF-8') ?>" class="testimonial-card__image" loading="lazy" width="600" height="400">
                                        </div>
                                    <?php else: ?>
                                        <div class="testimonial-card__image-wrapper testimonial-card__image-wrapper--avatar">
                                            <div class="testimonial-card__avatar" aria-hidden="true"><?= mb_strtoupper(mb_substr(htmlspecialchars($av['nome'], ENT_QUOTES, 'UTF-8'), 0, 1)) ?></div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="testimonial-card__content">
                                        <div class="testimonial-card__rating" aria-label="5 de 5 estrelas">
                                            <?php for ($i = 0; $i < 5; $i++): ?><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                                </svg><?php endfor; ?>
                                        </div>
                                        <blockquote class="testimonial-card__text">
                                            <p><?= htmlspecialchars($av['texto'], ENT_QUOTES, 'UTF-8') ?></p>
                                        </blockquote>
                                        <footer class="testimonial-card__author">
                                            <span class="testimonial-card__author-name"><?= htmlspecialchars($av['nome'], ENT_QUOTES, 'UTF-8') ?></span>
                                            <span class="testimonial-card__source">Google Reviews</span>
                                        </footer>
                                    </div>
                                </article>
                            <?php endforeach; ?>
                        </div>
                        <button type="button" class="testimonials__nav testimonials__nav--prev" id="testimonials-prev" aria-label="Anterior"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M15 18l-6-6 6-6" />
                            </svg></button>
                        <button type="button" class="testimonials__nav testimonials__nav--next" id="testimonials-next" aria-label="Proximo"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 18l6-6-6-6" />
                            </svg></button>
                    </div>
                    <div class="testimonials__dots" id="testimonials-dots" role="tablist" aria-label="Navegacao"></div>
                <?php endif; ?>
            </div>
            <div class="testimonials__review-cta">
                <a href="https://g.page/r/CT1Xfa7rXvCUEAE/review" target="_blank" rel="noopener noreferrer" class="testimonials__review-link">Avaliar no Google →</a>
                <p class="testimonials__review-text">Avalie o atendimento e ajude a gente a evoluir</p>
            </div>
        </section>

        <!-- CAPACETES -->
<section class="helmets-banner" aria-labelledby="helmets-banner-title">
    <a href="https://stmotors.com.br/capacetes"
        class="helmets-banner__link"
        title="Comprar capacetes em Araraquara na ST Motors">
        <div class="helmets-banner__container">
            <div class="helmets-banner__content">
                <span class="helmets-banner__eyebrow">Novidade na ST Motors</span>
                <h2 id="helmets-banner-title" class="helmets-banner__title">
                    Agora vendemos capacetes em Araraquara
                </h2>
                <p class="helmets-banner__text">
                    Capacetes para motociclistas com segurança, conforto e qualidade. Venha conferir os modelos disponíveis.
                </p>
                <span class="helmets-banner__cta">
                    Ver capacetes
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M5 12h14" />
                        <path d="m12 5 7 7-7 7" />
                    </svg>
                </span>
            </div>
            <div class="helmets-banner__media">
                <img src="/assets/images/home/capacete-st-motors-araraquara.png"
                    alt="Capacete para motociclista à venda na ST Motors Araraquara"
                    class="helmets-banner__image"
                    width="535" height="466"
                    loading="lazy" decoding="async">
            </div>
        </div>
    </a>
</section>

        <!-- VENDA SUA MOTO -->
        <section id="vender-moto" class="sell-bike" role="region" aria-labelledby="sell-bike-title">
            <div class="sell-bike__overlay"></div>
            <div class="sell-bike__container">
                <article class="sell-bike__glass">
                    <span class="sell-bike__eyebrow">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                            <path d="m9 12 2 2 4-4" />
                        </svg>
                        Evite golpes
                    </span>
                    <h2 id="sell-bike-title" class="sell-bike__title">Venda sua moto<br>de forma segura e rápida</h2>
                    <p class="sell-bike__description">Avaliacão justa + Pagamento à vista + Zero burocracia</p>
                    <a href="https://wa.me/5516997305602?text=Quero%20vender%20minha%20moto%20e%20receber%20avalia%C3%A7%C3%A3o" class="sell-bike__cta" target="_blank" rel="noopener noreferrer">
                        <span class="sell-bike__cta-text">Chamar no WhatsApp</span>
                        <svg class="sell-bike__cta-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14" />
                            <path d="m12 5 7 7-7 7" />
                        </svg>
                    </a>
                </article>
            </div>
        </section>

    </main>
    <?php include __DIR__ . '/includes/footer.php'; ?>

    <script src="/assets/scripts/home.js" defer></script>
</body>

</html>