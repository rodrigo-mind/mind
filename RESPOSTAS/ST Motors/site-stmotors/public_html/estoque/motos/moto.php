<?php
define('APP_LOADED', true);
require_once __DIR__ . '/../../includes/config.php';
require_once __DIR__ . '/../../includes/security.php';
require_once __DIR__ . '/../../includes/db.php';
require_once __DIR__ . '/../../includes/money.php';

$slug = trim($_GET['slug'] ?? '');
if (!$slug) { header('Location: /estoque/'); exit; }

try {
    $db = getDB();
    $st = $db->prepare('SELECT * FROM motos WHERE slug = ? AND ativo = 1');
    $st->execute([$slug]);
    $moto = $st->fetch();
    if (!$moto) { http_response_code(404); include __DIR__ . '/../../includes/404.php'; exit; }

    $stf = $db->prepare('SELECT * FROM moto_fotos WHERE moto_id = ? ORDER BY principal DESC, ordem ASC');
    $stf->execute([$moto['id']]);
    $fotos = $stf->fetchAll();
} catch (PDOException $e) {
    // Falha de conexão não é "moto não existe" — não usar 404 aqui.
    header('Location: /estoque/?erro=indisponivel');
    exit;
}

// Sugestões (mesma categoria, outras motos)
$stSug = $db->prepare(
    'SELECT m.*, (SELECT arquivo FROM moto_fotos WHERE moto_id = m.id AND principal = 1 LIMIT 1) AS foto
     FROM motos m
     WHERE m.ativo = 1 AND m.id != ? AND m.categoria = ?
     ORDER BY RAND() LIMIT 3'
);
$stSug->execute([$moto['id'], $moto['categoria']]);
$sugestoes = $stSug->fetchAll();

$fotoPrincipal = $fotos[0]['arquivo'] ?? null;
$title  = htmlspecialchars($moto['marca'] . ' ' . $moto['modelo'] . ' ' . $moto['ano'], ENT_QUOTES, 'UTF-8');

// Garante conversão correta independente do formato salvo no banco
$precoFloat = precoToFloat($moto['preco']);
$preco      = precoFormat($precoFloat);

// Estimativa de parcela (48x, ~2.5% ao mês, cálculo simplificado de referência)
$taxa       = 0.025;
$parcelas   = 48;
$coef       = ($taxa * pow(1 + $taxa, $parcelas)) / (pow(1 + $taxa, $parcelas) - 1);
$parcelaRef = number_format($precoFloat * $coef, 2, ',', '.');

$whatsappMsg = urlencode(
    'Olá! Vi o ' . $moto['marca'] . ' ' . $moto['modelo'] . ' ' . $moto['ano'] .
    ' no site e tenho interesse. Ainda está disponível?'
);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> | ST Motors Araraquara</title>
    <meta name="description" content="<?= $title ?> — <?= (int)$moto['cilindrada'] ?>cc, <?= htmlspecialchars($moto['categoria'], ENT_QUOTES, 'UTF-8') ?>, <?= htmlspecialchars($moto['ano'], ENT_QUOTES, 'UTF-8') ?>. R$ <?= $preco ?>. Revisada e pronta para rodar. ST Motors Araraquara.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?= SITE_URL ?>/estoque/motos/<?= htmlspecialchars($slug, ENT_QUOTES, 'UTF-8') ?>">

    <?php
    // URL absoluta da imagem para compartilhamento (com fallback caso a moto não tenha foto)
    $ogImage = $fotoPrincipal
        ? SITE_URL . $fotoPrincipal
        : SITE_URL . '/assets/images/og-default.jpg';
    ?>

    <meta property="og:type"        content="product">
    <meta property="og:title"       content="<?= $title ?> | ST Motors">
    <meta property="og:description" content="R$ <?= $preco ?> — <?= (int)$moto['cilindrada'] ?>cc. Revisada e pronta para rodar.">
    <meta property="og:url"         content="<?= SITE_URL ?>/estoque/motos/<?= htmlspecialchars($slug, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:image"        content="<?= htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:image:secure_url" content="<?= htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:image:width"  content="800">
    <meta property="og:image:height" content="600">
    <meta property="og:image:type"   content="image/jpeg">
    <meta property="og:image:alt"    content="<?= $title ?>">
    <meta property="og:locale" content="pt_BR">

    <!-- Twitter/X card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= $title ?> | ST Motors">
    <meta name="twitter:description" content="R$ <?= $preco ?> — <?= htmlspecialchars($moto['categoria'], ENT_QUOTES, 'UTF-8') ?>, <?= (int)$moto['cilindrada'] ?>cc.">
    <meta name="twitter:image" content="<?= htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8') ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/styles/components/header.css">
    <link rel="stylesheet" href="/assets/styles/components/footer.css">
    <link rel="stylesheet" href="/assets/styles/moto.css">

    <?php
    // JSON-LD montado como array PHP + json_encode — nunca como string concatenada.
    // Isso evita o bug anterior: descrições com \r\n quebravam o JSON (campo "description"
    // virava string com quebra de linha literal = JSON inválido = Google ignora o schema).
    $jsonLd = [
        '@context' => 'https://schema.org',
        '@type'    => 'Motorcycle', // mais específico que "Product" para o Google entender que é veículo
        'name'     => $moto['marca'] . ' ' . $moto['modelo'] . ' ' . $moto['ano'],
        'description' => $moto['descricao'] !== null && $moto['descricao'] !== ''
            ? $moto['descricao']
            : ($moto['marca'] . ' ' . $moto['modelo'] . ' disponível na ST Motors Araraquara.'),
        'brand'    => ['@type' => 'Brand', 'name' => $moto['marca']],
        'model'    => $moto['modelo'],
        'vehicleModelDate' => $moto['ano'],
        'color'    => $moto['cor'],
    ];
    if (!empty($moto['cilindrada'])) {
        $jsonLd['vehicleEngine'] = [
            '@type' => 'EngineSpecification',
            'engineDisplacement' => [
                '@type' => 'QuantitativeValue',
                'value' => (int)$moto['cilindrada'],
                'unitCode' => 'CMQ', // cm³
            ],
        ];
    }
    if ($moto['km'] > 0) {
        $jsonLd['mileageFromOdometer'] = [
            '@type' => 'QuantitativeValue',
            'value' => (int)$moto['km'],
            'unitCode' => 'KMT',
        ];
    }
    if ($fotoPrincipal) {
        $jsonLd['image'] = SITE_URL . $fotoPrincipal;
    }
    $jsonLd['offers'] = [
        '@type'         => 'Offer',
        'price'         => number_format($precoFloat, 2, '.', ''),
        'priceCurrency' => 'BRL',
        'availability'  => 'https://schema.org/InStock',
        'itemCondition' => 'https://schema.org/UsedCondition',
        'url'           => SITE_URL . '/estoque/motos/' . $slug,
        'seller'        => ['@type' => 'AutoDealer', 'name' => 'ST Motors Araraquara'],
    ];
    ?>
    <script type="application/ld+json"><?= json_encode($jsonLd, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) ?></script>
</head>
<body>
<?php include __DIR__ . '/../../includes/header.php'; ?>

<main id="main-content" class="moto-page">

    <!-- Breadcrumb -->
    <nav class="breadcrumb" aria-label="Caminho de navegação">
        <a href="/">Home</a> &rsaquo;
        <a href="/estoque/">Estoque</a> &rsaquo;
        <span><?= $title ?></span>
    </nav>

    <div class="moto-layout">

        <!-- ── GALERIA ──────────────────────────────────────── -->
        <div class="moto-galeria">
            <?php if (empty($fotos)): ?>
                <div class="moto-galeria__placeholder" aria-label="Sem foto disponível">🏍️</div>
            <?php else: ?>
                <div class="moto-galeria__principal">
                    <img src="<?= htmlspecialchars($fotos[0]['arquivo'], ENT_QUOTES, 'UTF-8') ?>"
                         alt="<?= $title ?>"
                         id="foto-principal"
                         width="800" height="600"
                         loading="eager"
                         fetchpriority="high">
                </div>
                <?php if (count($fotos) > 1): ?>
                <div class="moto-galeria__thumbs" role="list" aria-label="Mais fotos">
                    <?php foreach ($fotos as $i => $f): ?>
                        <img src="<?= htmlspecialchars($f['arquivo'], ENT_QUOTES, 'UTF-8') ?>"
                             alt="Foto <?= $i + 1 ?> de <?= $title ?>"
                             role="listitem"
                             class="thumb <?= $f['principal'] ? 'thumb--ativa' : '' ?>"
                             tabindex="0"
                             onclick="trocaFoto(this)"
                             onkeydown="if(event.key==='Enter'||event.key===' ')trocaFoto(this)"
                             width="72" height="54">
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <!-- ── DETALHES ─────────────────────────────────────── -->
        <div class="moto-detalhes">

            <!-- Badge disponibilidade — escassez / urgência -->
            <div class="moto-detalhes__disponivel" aria-label="Disponível em estoque">
                Disponível agora
            </div>

            <!-- Identidade -->
            <h5 class="moto-detalhes__marca"><?= htmlspecialchars($moto['marca'], ENT_QUOTES, 'UTF-8') ?></h5>
            <h1 class="moto-detalhes__nome"><?= htmlspecialchars($moto['modelo'], ENT_QUOTES, 'UTF-8') ?></h1>

            <div class="moto-detalhes__divider" aria-hidden="true"></div>

            <!-- Preço — âncora de valor -->
            <div class="moto-detalhes__preco">
                <span class="preco-label">Preço</span>
                <span class="preco-valor" aria-label="Preço: R$ <?= $preco ?>">R$ <?= $preco ?></span>
                <span class="preco-financie">
                    ou financie em até 48x · consulte condições
                </span>
            </div>

            <!-- Specs -->
            <table class="moto-specs-table" aria-label="Especificações da moto">
                <tbody>
                    <tr>
                        <th scope="row">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                            Ano
                        </th>
                        <td><?= htmlspecialchars($moto['ano'], ENT_QUOTES, 'UTF-8') ?></td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 3h10a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z"/><path d="M5 7h14M5 10h14M12 14v4"/><circle cx="12" cy="20" r="2"/></svg>
                            Cilindrada
                        </th>
                        <td><?= (int)$moto['cilindrada'] ?>cc</td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                            Categoria
                        </th>
                        <td><?= htmlspecialchars($moto['categoria'], ENT_QUOTES, 'UTF-8') ?></td>
                    </tr>
                    <?php if ($moto['km'] > 0): ?>
                    <tr>
                        <th scope="row">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            Quilometragem
                        </th>
                        <td><?= number_format($moto['km'], 0, ',', '.') ?> km</td>
                    </tr>
                    <?php endif; ?>
                    <?php if (!empty($moto['combustivel'])): ?>
                    <tr>
                        <th scope="row">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 22V8a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v14"/><path d="M17 10h2a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-2"/><line x1="3" y1="22" x2="21" y2="22"/><rect x="7" y="10" width="4" height="4"/></svg>
                            Combustível
                        </th>
                        <td><?= htmlspecialchars($moto['combustivel'], ENT_QUOTES, 'UTF-8') ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php if (!empty($moto['cambio'])): ?>
                    <tr>
                        <th scope="row">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="5" cy="12" r="2"/><circle cx="12" cy="5" r="2"/><circle cx="19" cy="12" r="2"/><circle cx="12" cy="19" r="2"/><path d="M5 14v3a2 2 0 0 0 2 2h3M5 10V7a2 2 0 0 1 2-2h3m4 0h3a2 2 0 0 1 2 2v3m0 4v3a2 2 0 0 1-2 2h-3"/></svg>
                            Câmbio
                        </th>
                        <td><?= htmlspecialchars($moto['cambio'], ENT_QUOTES, 'UTF-8') ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php if (!empty($moto['cor'])): ?>
                    <tr>
                        <th scope="row">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="13.5" cy="6.5" r="2.5"/><circle cx="17.5" cy="10.5" r="2.5"/><circle cx="8.5" cy="7.5" r="2.5"/><circle cx="6.5" cy="12.5" r="2.5"/><path d="M12 22c-4.97 0-9-2.69-9-6 0-1.66 1.12-3.14 2.9-4.17"/></svg>
                            Cor
                        </th>
                        <td><?= htmlspecialchars($moto['cor'], ENT_QUOTES, 'UTF-8') ?></td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <!-- Trust badges — prova social / segurança -->
            <div class="moto-trust-badges" aria-label="Garantias">
                
                <div class="trust-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/></svg>
                    Documentação ok
                </div>
                <div class="trust-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                    Financiamento fácil
                </div>
                <div class="trust-badge">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    Resposta rápida
                </div>
            </div>

            <!-- Descrição -->
            <?php if (!empty($moto['descricao'])): ?>
            <div class="moto-descricao">
                <h3>Observações</h3>
                <p><?= nl2br(htmlspecialchars($moto['descricao'], ENT_QUOTES, 'UTF-8')) ?></p>
            </div>
            <?php endif; ?>

            <!-- CTAs -->
            <a href="https://wa.me/<?= WHATSAPP_NUMERO ?>?text=<?= $whatsappMsg ?>"
               class="moto-cta-whatsapp"
               target="_blank"
               rel="noopener noreferrer"
               aria-label="Enviar mensagem pelo WhatsApp para saber mais sobre <?= $title ?>">
                <svg viewBox="0 0 24 24" fill="currentColor" width="20" height="20" aria-hidden="true">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
                Chamar no WhatsApp
            </a>

            <a href="https://www.google.com/maps/place/R.+Maur%C3%ADcio+Galli,+47"
               class="moto-cta-secundario"
               target="_blank"
               rel="noopener noreferrer">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                Conhecer a Loja · Araraquara-SP
            </a>

            <p class="moto-cta-hint">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                Negociação 100% segura · sem surpresas
            </p>

            <!-- Compartilhar -->
            <div class="moto-share" aria-label="Compartilhar esta moto">
                <span class="moto-share__label">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/></svg>
                    Compartilhar
                </span>
                <div class="moto-share__buttons">
                    <a href="https://wa.me/?text=<?= urlencode($title . ' — R$ ' . $preco . ' | ST Motors Araraquara → ' . SITE_URL . '/estoque/motos/' . $slug) ?>"
                       class="moto-share__btn moto-share__btn--whatsapp"
                       target="_blank" rel="noopener noreferrer"
                       aria-label="Compartilhar no WhatsApp"
                       title="WhatsApp">
                        <svg viewBox="0 0 24 24" fill="currentColor" width="18" height="18" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(SITE_URL . '/estoque/motos/' . $slug) ?>"
                       class="moto-share__btn moto-share__btn--facebook"
                       target="_blank" rel="noopener noreferrer"
                       aria-label="Compartilhar no Facebook"
                       title="Facebook">
                        <svg viewBox="0 0 24 24" fill="currentColor" width="18" height="18" aria-hidden="true"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="https://twitter.com/intent/tweet?text=<?= urlencode($title . ' — R$ ' . $preco . ' | ST Motors') ?>&url=<?= urlencode(SITE_URL . '/estoque/motos/' . $slug) ?>"
                       class="moto-share__btn moto-share__btn--x"
                       target="_blank" rel="noopener noreferrer"
                       aria-label="Compartilhar no X"
                       title="X (Twitter)">
                        <svg viewBox="0 0 24 24" fill="currentColor" width="16" height="16" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    <button type="button"
                            class="moto-share__btn moto-share__btn--copy"
                            data-url="<?= SITE_URL ?>/estoque/motos/<?= htmlspecialchars($slug, ENT_QUOTES, 'UTF-8') ?>"
                            aria-label="Copiar link"
                            title="Copiar link">
                        <svg class="icon-copy" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                        <svg class="icon-check" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="display:none"><polyline points="20 6 9 17 4 12"/></svg>
                    </button>
                </div>
            </div>

        </div><!-- .moto-detalhes -->
    </div><!-- .moto-layout -->

    <!-- ── SUGESTÕES ─────────────────────────────────────────── -->
    <?php if (!empty($sugestoes)): ?>
    <section class="moto-sugestoes" aria-labelledby="sugestoes-titulo">
        <h2 id="sugestoes-titulo">Você também pode gostar</h2>
        <div class="estoque-grid">
            <?php foreach ($sugestoes as $s): ?>
            <article class="bike-card">
                <a href="/estoque/motos/<?= htmlspecialchars($s['slug'], ENT_QUOTES, 'UTF-8') ?>"
                   class="bike-card__link"
                   aria-label="Ver detalhes: <?= htmlspecialchars($s['marca'] . ' ' . $s['modelo'], ENT_QUOTES, 'UTF-8') ?>">
                    <div class="bike-card__image-wrapper">
                        <?php if ($s['foto']): ?>
                            <img src="<?= htmlspecialchars($s['foto'], ENT_QUOTES, 'UTF-8') ?>"
                                 alt="<?= htmlspecialchars($s['marca'] . ' ' . $s['modelo'], ENT_QUOTES, 'UTF-8') ?>"
                                 class="bike-card__image" loading="lazy" width="400" height="300">
                        <?php else: ?>
                            <div class="bike-card__no-foto" aria-hidden="true">🏍️</div>
                        <?php endif; ?>
                    </div>
                    <div class="bike-card__content">
                        <h5 class="bike-card__brand"><?= htmlspecialchars(strtoupper($s['marca']), ENT_QUOTES, 'UTF-8') ?></h5>
                        <h3 class="bike-card__name"><?= htmlspecialchars($s['modelo'], ENT_QUOTES, 'UTF-8') ?></h3>
                        <div class="bike-card__footer">
                            <p class="bike-card__price">
                                <span class="bike-card__price-label">A partir de</span>
                                <span class="bike-card__price-value">R$ <?= precoExibir($s['preco']) ?></span>
                            </p>
                        </div>
                    </div>
                </a>
            </article>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

</main>

<?php include __DIR__ . '/../../includes/footer.php'; ?>

<script>
// Troca de foto na galeria
function trocaFoto(thumb) {
    const principal = document.getElementById('foto-principal');
    if (!principal) return;
    principal.src = thumb.src;
    document.querySelectorAll('.thumb').forEach(t => t.classList.remove('thumb--ativa'));
    thumb.classList.add('thumb--ativa');
}

// Copiar link
document.querySelector('.moto-share__btn--copy')?.addEventListener('click', function() {
    const url = this.dataset.url;
    const iconCopy = this.querySelector('.icon-copy');
    const iconCheck = this.querySelector('.icon-check');

    navigator.clipboard.writeText(url).then(() => {
        iconCopy.style.display = 'none';
        iconCheck.style.display = 'block';
        this.classList.add('moto-share__btn--copied');

        setTimeout(() => {
            iconCopy.style.display = '';
            iconCheck.style.display = 'none';
            this.classList.remove('moto-share__btn--copied');
        }, 2000);
    }).catch(() => {
        // Fallback para navegadores antigos
        const ta = document.createElement('textarea');
        ta.value = url;
        ta.style.position = 'fixed';
        ta.style.opacity = '0';
        document.body.appendChild(ta);
        ta.select();
        document.execCommand('copy');
        document.body.removeChild(ta);

        iconCopy.style.display = 'none';
        iconCheck.style.display = 'block';
        this.classList.add('moto-share__btn--copied');

        setTimeout(() => {
            iconCopy.style.display = '';
            iconCheck.style.display = 'none';
            this.classList.remove('moto-share__btn--copied');
        }, 2000);
    });
});
</script>
</body>
</html>
