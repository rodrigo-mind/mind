---
titulo: "Template 1: head de site para loja de veículos"
tipo: template
assunto: developer
origem: pesquisa-e-projeto
confianca: media
criado: 2026-11-24
atualizado: 2026-11-24
revisar_ate: 2027-05-24
---

# Template 1: head de site para loja de veículos

Modelo de `<head>` para o site de uma loja de veículos, cobrindo SEO, dados estruturados, compartilhamento, segurança, desempenho, privacidade e instalação como app. Acompanha [[loja-veiculos-TEMPLATE-1]] e vai no arquivo `public_html/includes/head.php`. Esse arquivo ainda não aparece na árvore daquele template, que lista só `header.php` e `footer.php`.

**De onde vem:** do `<head>` das páginas reais da ST Motors (home, estoque e página da moto), das notas do Mind citadas em Conexões e de pesquisa na internet em 2026-11-24. O que a pesquisa mudou em relação ao projeto original está em "O que a pesquisa confirmou ou mudou".

## Decisão de projeto: um head só

No projeto original cada página repetia seu próprio `<head>`. Isso deixou lacunas: a página de estoque não tinha Open Graph nem dados estruturados, e os `href` dos ícones eram relativos na home. Aqui o `<head>` vive em um arquivo, e cada página só informa seus dados antes de incluí-lo.

Antes de incluir, a página define `$pagina` e já mandou `require` de `config.php` e `security.php` (que cria `$cspNonce`):

```php
<?php
define('APP_LOADED', true);
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/security.php';   // gera $cspNonce e envia os cabeçalhos HTTP

$pagina = [
    'titulo'    => 'Honda Civic Touring 1.5 Turbo 2019',
    'descricao' => 'Honda Civic Touring 2019, 42.000 km, único dono, revisado e com garantia. Financie em até 60x em [CIDADE].',
    'caminho'   => '/estoque/veiculos/honda-civic-touring-2019',
    'tipo'      => 'veiculo',
    'og_imagem' => SITE_URL . '/assets/images/veiculos/foto-principal.jpg',
    'lcp'       => ['src' => '/assets/images/veiculos/foto-principal.jpg'],
    'css'       => ['/assets/styles/veiculo.css'],
    'jsonld'    => [jsonldVeiculo($veiculo, SITE_URL . '/estoque/veiculos/' . $slug), jsonldMigalhas([...])],
];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<?php require __DIR__ . '/includes/head.php'; ?>
<body>...
```

Constantes esperadas em `includes/config.php`: `SITE_URL`, `NOME_LOJA`, `COR_TEMA`, `COR_TEMA_ESCURO`, `VERIF_GOOGLE`, `VERIF_META`, `VERIF_BING` (tokens vazios ficam de fora do HTML).

## O arquivo `includes/head.php`

```php
<?php
defined('APP_LOADED') or exit;

if (!function_exists('e')) {
    function e(string $s): string { return htmlspecialchars($s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); }
}

$p = ($pagina ?? []) + [
    'titulo'    => '',
    'sufixo'    => true,                       // false: o título já traz a marca (home)
    'descricao' => '',
    'caminho'   => '/',                        // sem domínio e sem parâmetros: é o endereço canônico
    'tipo'      => 'website',                  // website | listagem | veiculo
    'robots'    => null,                       // null = indexável; 'noindex, follow' ou 'noindex, nofollow'
    'og_imagem' => SITE_URL . '/assets/images/loja-og.jpg',
    'og_alt'    => NOME_LOJA,
    'lcp'       => null,                       // ['src'=>..., 'srcset'=>..., 'sizes'=>...] da maior imagem visível
    'css'       => [],                         // CSS próprio da página
    'jsonld'    => [],                         // blocos já montados (arrays)
    'preco'     => null,                       // só para tipo veiculo
];

$urlCanonica = SITE_URL . $p['caminho'];
$tituloFinal = $p['sufixo'] ? $p['titulo'] . ' | ' . NOME_LOJA : $p['titulo'];
$robots      = $p['robots'] ?? 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1';
$n           = e($cspNonce);                   // nonce do CSP, gerado em security.php
?>
<head>
    <!-- 1. CODIFICAÇÃO E VIEWPORT: nos primeiros 1024 bytes; sem maximum-scale (bloqueia o zoom e prejudica acessibilidade) -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">   <!-- impede o iOS de transformar preço, ano e km em link de telefone -->

    <!-- 2. IDENTIDADE DA PÁGINA (SEO): título e descrição únicos por URL -->
    <title><?= e($tituloFinal) ?></title>
    <meta name="description" content="<?= e($p['descricao']) ?>">
    <meta name="robots" content="<?= e($robots) ?>">
    <link rel="canonical" href="<?= e($urlCanonica) ?>">
    <!-- Sem hreflang: o site é só para o Brasil. Sem meta keywords, geo.*, revisit-after ou rel=prev/next: o Google as ignora. -->

    <!-- 3. VERIFICAÇÃO DE PROPRIEDADE: o token vem do config; vazio, a linha não sai -->
    <?php if (VERIF_GOOGLE): ?><meta name="google-site-verification" content="<?= e(VERIF_GOOGLE) ?>"><?php endif; ?>
    <?php if (VERIF_META): ?><meta name="facebook-domain-verification" content="<?= e(VERIF_META) ?>"><?php endif; ?>
    <?php if (VERIF_BING): ?><meta name="msvalidate.01" content="<?= e(VERIF_BING) ?>"><?php endif; ?>

    <!-- 4. COMPARTILHAMENTO (WhatsApp, Facebook, Instagram, LinkedIn, X): imagem 1200x630, leve, com texto alternativo -->
    <meta property="og:site_name" content="<?= e(NOME_LOJA) ?>">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:type" content="<?= $p['tipo'] === 'veiculo' ? 'product' : 'website' ?>">
    <meta property="og:title" content="<?= e($tituloFinal) ?>">
    <meta property="og:description" content="<?= e($p['descricao']) ?>">
    <meta property="og:url" content="<?= e($urlCanonica) ?>">
    <meta property="og:image" content="<?= e($p['og_imagem']) ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="<?= e($p['og_alt']) ?>">
    <?php if ($p['tipo'] === 'veiculo' && $p['preco']): ?>
    <meta property="product:price:amount" content="<?= e(number_format((float)$p['preco'], 2, '.', '')) ?>">
    <meta property="product:price:currency" content="BRL">
    <?php endif; ?>
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= e($tituloFinal) ?>">
    <meta name="twitter:description" content="<?= e($p['descricao']) ?>">
    <meta name="twitter:image" content="<?= e($p['og_imagem']) ?>">

    <!-- 5. ÍCONES E APP: caminhos SEMPRE absolutos (começam com /), senão quebram em subpastas -->
    <link rel="icon" href="/favicon.ico" sizes="32x32">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">            <!-- 180x180, fundo sólido; o iOS ignora SVG aqui -->
    <link rel="manifest" href="/site.webmanifest">                         <!-- ícones 192 e 512 (um deles maskable) ficam dentro dele -->
    <meta name="theme-color" content="<?= e(COR_TEMA) ?>" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="<?= e(COR_TEMA_ESCURO) ?>" media="(prefers-color-scheme: dark)">

    <!-- 6. DESEMPENHO: o que o navegador deve buscar primeiro, nesta ordem -->
    <?php if ($p['lcp']): /* imagem principal da página (LCP): nunca com loading="lazy" */ ?>
    <link rel="preload" as="image" href="<?= e($p['lcp']['src']) ?>"
          <?php if (!empty($p['lcp']['srcset'])): ?>imagesrcset="<?= e($p['lcp']['srcset']) ?>" imagesizes="<?= e($p['lcp']['sizes'] ?? '100vw') ?>"<?php endif; ?>
          fetchpriority="high">
    <?php endif; ?>
    <!-- Fontes hospedadas no próprio site (sem Google Fonts): menos conexões, CSP mais simples e sem envio de IP a terceiros -->
    <link rel="preload" as="font" type="font/woff2" href="/assets/fonts/fonte-principal.woff2" crossorigin>
    <!-- No CSS: @font-face com font-display: swap e unicode-range; no máximo 2 famílias -->

    <!-- 7. CSS: poucos arquivos, o do componente primeiro; versão no nome ou ?v= para renovar o cache de 1 mês -->
    <link rel="stylesheet" href="/assets/styles/components/header.css">
    <link rel="stylesheet" href="/assets/styles/components/footer.css">
    <?php foreach ($p['css'] as $css): ?>
    <link rel="stylesheet" href="<?= e($css) ?>">
    <?php endforeach; ?>

    <!-- 8. NAVEGAÇÃO RÁPIDA (Chrome/Edge; os demais ignoram): busca antes o HTML das páginas de veículo quando o cursor passa sobre o link.
         Prefetch, não prerender: não executa o JavaScript da página, então não conta visualização falsa. -->
    <script type="speculationrules" nonce="<?= $n ?>">
    {"prefetch":[{"where":{"and":[{"href_matches":"/estoque/veiculos/*"},{"not":{"selector_matches":"[rel~=nofollow]"}}]},"eagerness":"moderate"}]}
    </script>

    <!-- 9. DADOS ESTRUTURADOS (JSON-LD): HEX_TAG impede que um texto com </script> feche o bloco e vire XSS -->
    <?php foreach ($p['jsonld'] as $bloco): ?>
    <script type="application/ld+json"><?= json_encode($bloco, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP) ?></script>
    <?php endforeach; ?>

    <!-- 10. SCRIPTS: sempre defer e com nonce. O de consentimento só carrega pixels e tags DEPOIS do aceite (LGPD). -->
    <script defer nonce="<?= $n ?>" src="/assets/scripts/components/consent-tracking.js"></script>
    <script defer nonce="<?= $n ?>" src="/assets/scripts/components/header.js"></script>
</head>
```

## Dados estruturados (`includes/jsonld.php`)

Escolha o tipo pelo que a página mostra, e só marque o que o visitante vê na página.

```php
<?php
defined('APP_LOADED') or exit;

// Home e página "Sobre nós": a loja como negócio local. AutoDealer é o tipo específico para revenda de veículos.
function jsonldLoja(): array {
    return [
        '@context'  => 'https://schema.org',
        '@type'     => 'AutoDealer',
        '@id'       => SITE_URL . '/#loja',
        'name'      => NOME_LOJA,
        'url'       => SITE_URL,
        'image'     => SITE_URL . '/assets/images/home/loja-veiculos-usados-seminovos-frente.jpg',
        'logo'      => SITE_URL . '/assets/images/logo-header.svg',
        'telephone' => '+' . TELEFONE_NUMERO,
        'priceRange'=> 'R$$',
        'address'   => ['@type' => 'PostalAddress', 'streetAddress' => '[RUA, NÚMERO]', 'addressLocality' => '[CIDADE]',
                        'addressRegion' => '[UF]', 'postalCode' => '[CEP]', 'addressCountry' => 'BR'],
        'geo'       => ['@type' => 'GeoCoordinates', 'latitude' => 0.0, 'longitude' => 0.0],
        'openingHoursSpecification' => [[
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => ['Monday','Tuesday','Wednesday','Thursday','Friday'],
            'opens' => '08:00', 'closes' => '18:00',
        ]],
        'sameAs'    => ['[URL do Instagram]', '[URL do Facebook]', '[URL do Perfil da Empresa no Google]'],
    ];
}

// Página de um veículo. Tipo: Car, Motorcycle, BusOrCoach ou, na falta de um específico, Vehicle.
function jsonldVeiculo(array $v, string $url): array {
    return [
        '@context' => 'https://schema.org',
        '@type'    => $v['tipo_schema'],                    // 'Car', 'Motorcycle'...
        '@id'      => $url . '#veiculo',
        'name'     => $v['marca'] . ' ' . $v['modelo'] . ' ' . $v['versao'] . ' ' . $v['ano_modelo'],
        'url'      => $url,
        'sku'      => (string)$v['codigo_interno'],         // código do estoque; nunca placa nem chassi completo
        'image'    => array_map(fn($f) => SITE_URL . '/assets/images/veiculos/' . $f, $v['fotos']),
        'description' => $v['descricao'],
        'brand'    => ['@type' => 'Brand', 'name' => $v['marca']],
        'model'    => $v['modelo'],
        'vehicleModelDate'  => (string)$v['ano_modelo'],
        'productionDate'    => (string)$v['ano_fabricacao'],
        'color'             => $v['cor'],
        'bodyType'          => $v['carroceria'],
        'fuelType'          => $v['combustivel'],
        'vehicleTransmission' => $v['cambio'],
        'mileageFromOdometer' => ['@type' => 'QuantitativeValue', 'value' => (int)$v['km'], 'unitCode' => 'KMT'],
        'vehicleEngine'     => ['@type' => 'EngineSpecification',
            'engineDisplacement' => ['@type' => 'QuantitativeValue', 'value' => (int)$v['cilindrada_cc'], 'unitCode' => 'CMQ']],
        'itemCondition'     => $v['usado'] ? 'https://schema.org/UsedCondition' : 'https://schema.org/NewCondition',
        'offers'   => [
            '@type'         => 'Offer',
            'url'           => $url,
            'price'         => number_format((float)$v['preco'], 2, '.', ''),
            'priceCurrency' => 'BRL',
            'availability'  => $v['vendido'] ? 'https://schema.org/SoldOut' : 'https://schema.org/InStock',
            'seller'        => ['@id' => SITE_URL . '/#loja'],
        ],
    ];
}

// Páginas internas: trilha de navegação (Início > Estoque > Veículo)
function jsonldMigalhas(array $itens): array {            // [['Início', '/'], ['Estoque', '/estoque'], ['Honda Civic', '/estoque/veiculos/...']]
    $lista = [];
    foreach ($itens as $i => [$nome, $caminho]) {
        $lista[] = ['@type' => 'ListItem', 'position' => $i + 1, 'name' => $nome, 'item' => SITE_URL . $caminho];
    }
    return ['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => $lista];
}

// Só na home, uma vez: dá nome ao site para o Google. A caixa de busca nos resultados (SearchAction) foi descontinuada.
function jsonldSite(): array {
    return ['@context' => 'https://schema.org', '@type' => 'WebSite', '@id' => SITE_URL . '/#site',
            'name' => NOME_LOJA, 'url' => SITE_URL, 'inLanguage' => 'pt-BR'];
}
```

## Variações por tipo de página

| Página | `titulo` (padrão) | `robots` | `canonical` | `jsonld` | Observação |
|---|---|---|---|---|---|
| Home | `Veículos Novos, Seminovos e Usados em [CIDADE] com Garantia` (`sufixo` falso, marca no texto) | indexável | `/` | `jsonldLoja`, `jsonldSite` | `lcp`: imagem do hero |
| Listagem `/estoque` | `Estoque de Veículos Usados e Seminovos \| [LOJA]` | indexável | a própria URL, sem parâmetros | `jsonldMigalhas` | Páginas 2, 3...: canonical para si mesmas, nunca para a página 1 |
| Listagem com filtro, ordenação ou busca (`?q=`, `?ordem=`) | igual à listagem | `noindex, follow` | `/estoque` | nenhum | Não bloquear no robots.txt: o Google precisa ler o noindex |
| Veículo | `Marca Modelo Versão Ano \| [LOJA]` | indexável | `/estoque/veiculos/<slug>` | `jsonldVeiculo`, `jsonldMigalhas` | `lcp`: foto principal, com `srcset` |
| Veículo vendido | igual | ver abaixo | igual | `availability` SoldOut, se a página ficar no ar | Decisão de negócio |
| Financiamento, Sobre nós, Garantia | descrição do assunto + marca | indexável | a própria URL | `jsonldLoja` em Sobre nós | |
| Política de privacidade, termos | nome da página | indexável | a própria URL | nenhum | Exigidas pela LGPD; precisam bater com o que o site faz |
| Páginas-ponte do WhatsApp, `links/`, obrigado | nome interno | `noindex, nofollow` | a própria URL | nenhum | Sem `og:` nem ícones extras |
| Admin, login, `hash/` | nome interno | `noindex, nofollow` | nenhum | nenhum | Reforçar com o cabeçalho `X-Robots-Tag` e bloquear no robots.txt |
| 404 | `Página não encontrada \| [LOJA]` | `noindex` | nenhum | nenhum | Responder com status HTTP 404 de verdade |

**Veículo vendido.** Cada veículo é único e não volta ao estoque, então, seguindo o guia de SEO do Mind para produto descontinuado:
- há um veículo parecido (mesmo modelo, ano próximo): redirecionar com 301 para ele ou para a listagem da categoria;
- não há equivalente: responder 410 (ou 404);
- a página tem tráfego e vale mantê-la como "vendido, veja similares": deixe 200, `availability` SoldOut e links para parecidos.

## Cabeçalhos HTTP que acompanham o head

O `<head>` não substitui os cabeçalhos: CSP, HSTS e `frame-ancestors` só funcionam como cabeçalho HTTP, não como `<meta>`. Mantenha tudo em **um** lugar, o `security.php`, com o `.htaccess` só para compressão, cache e redirecionamentos.

```php
<?php
// includes/security.php (trecho)
$cspNonce = base64_encode(random_bytes(16));            // um nonce novo por resposta

header_remove('X-Powered-By');
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: strict-origin-when-cross-origin');
header('Permissions-Policy: geolocation=(), microphone=(), camera=(), payment=(), usb=(), interest-cohort=()');
header('Cross-Origin-Opener-Policy: same-origin');
header('Strict-Transport-Security: max-age=31536000');   // sem preload e sem includeSubDomains até ter certeza (ver notas)

// Comece com Content-Security-Policy-Report-Only; troque pelo cabeçalho de verdade quando o painel do navegador não acusar bloqueios.
header('Content-Security-Policy: ' . implode('; ', [
    "default-src 'self'",
    "script-src 'nonce-{$cspNonce}' 'strict-dynamic' 'inline-speculation-rules'",
    "style-src 'self'",                                  // sem 'unsafe-inline': estilo inline vira classe CSS
    "img-src 'self' data: https:",
    "font-src 'self'",
    "connect-src 'self'",                                // acrescente só os domínios de análise que forem usados após o consentimento
    "frame-src https://www.google.com",                  // mapa incorporado; remova se não houver
    "object-src 'none'",
    "base-uri 'none'",
    "form-action 'self'",
    "frame-ancestors 'none'",                            // vale no lugar de X-Frame-Options
    "upgrade-insecure-requests",
]));
```

## O que a pesquisa confirmou ou mudou

| Ponto | Fato verificado | Efeito no template |
|---|---|---|
| Dados estruturados de veículo | O Google deixou de dar suporte ao tipo "Vehicle Listing" nos resultados da busca em junho de 2025, sem efeito no ranqueamento. Isso já constava no guia de SEO do Mind. | Mantive `Car`/`Offer` do schema.org porque o vocabulário continua válido, ajuda a descrever a página e serve a outros consumidores. **Não conte com um rich result** de veículo no Google; teste no Teste de pesquisa aprimorada. |
| Caixa de busca nos resultados | Retirada pelo Google em novembro de 2024; o `WebSite` usado para o nome do site continua suportado. | O `SearchAction` da ST Motors saiu do template; ficou só o `WebSite`. |
| Core Web Vitals | Limites "bons" no percentil 75 dos usuários reais: LCP até 2,5 s, INP até 200 ms, CLS até 0,1. Para o LCP, a web.dev manda usar `fetchpriority="high"` ou `preload` na imagem principal. | Seção 6 do head. Informe `width` e `height` em toda imagem (CLS) e nunca use `loading="lazy"` na `lcp`. |
| CSP | OWASP e web.dev recomendam CSP estrita com nonce por resposta e `strict-dynamic`, com `object-src 'none'` e `base-uri 'none'`, começando por `Content-Security-Policy-Report-Only`. | O template troca a lista de domínios da ST Motors por nonce. Com `strict-dynamic`, scripts carregados pelo script de consentimento (pixels e tags) dispensam entrada na lista. |
| Speculation Rules | Funciona no Chrome e no Edge; o `prefetch` é o primeiro passo mais seguro; `moderate` age ao passar o cursor por 200 ms (no celular, ao tocar). Em CSP, o script inline precisa de nonce ou de `'inline-speculation-rules'`. | Seção 8 do head. Prerender ficou de fora porque executa o JavaScript da página. |
| Robots meta | Google documenta `max-snippet`, `max-image-preview` e `unavailable_after`. A fonte oficial lista `none`, `standard` e `large` para imagem; o uso de `large` para o Discover vem de terceiros. | O padrão do template traz `max-image-preview:large`. É escolha, não exigência. |
| Anúncios de veículos | Os anúncios de veículos do Google exigem conta própria no Merchant Center e **não** aceitam veículos nas listagens gratuitas. A documentação consultada confirma lançamentos em outros países, mas **não** confirma o Brasil. | O template não traz marcação para o feed. Antes de planejar anúncios de veículos, confira a disponibilidade no Brasil dentro da conta. |
| Consent Mode | O Consent Mode v2 acrescentou os sinais `ad_user_data` e `ad_personalization`; a obrigatoriedade citada é para EEE e Reino Unido. A pesquisa não achou orientação da ANPD nem do Google sobre o assunto no Brasil. | O template segue o modelo do projeto original: **nenhum** pixel ou tag carrega antes do aceite. Se usar o modo avançado do Google, os quatro sinais começam em `denied`. A base legal e o texto do banner são decisão com o jurídico. |
| Cabeçalhos | `X-Frame-Options` fica redundante com `frame-ancestors`; `Expect-CT` e CSP com prefixo estão obsoletos. HSTS com `preload` é difícil de desfazer. | O template usa `frame-ancestors 'none'`, não inclui `Expect-CT` e deixa HSTS sem `preload`. |

## Lições do projeto ST Motors

- **Cabeçalhos duplicados.** O `.htaccess` mandava `X-Frame-Options: SAMEORIGIN`, uma CSP com `frame-ancestors 'self'` e HSTS com `includeSubDomains`. O `security.php` mandava `DENY`, `frame-ancestors 'none'` e deixava HSTS comentado. As duas CSPs valem ao mesmo tempo, e a mais restritiva vence na prática. Fica difícil saber qual regra manda. Use uma fonte só.
- **`includeSubDomains` no HSTS** afeta todos os subdomínios. Só use depois de conferir que todos têm HTTPS.
- **Páginas sem cobertura.** A listagem de estoque não tinha Open Graph, Twitter Card nem JSON-LD, e a página da moto não tinha trilha de navegação (`BreadcrumbList`).
- **`json_encode` sem `JSON_HEX_TAG`.** Os blocos do projeto usavam `JSON_UNESCAPED_SLASHES`, e um campo com `</script>` fecharia o bloco. A entrada vem do painel administrativo, então o risco é baixo, mas a proteção custa uma flag.
- **Ícones com caminho relativo** (`favicon-96x96.png`) funcionam na home e quebram em subpastas.
- **Fontes do Google Fonts** exigiam liberar dois domínios na CSP e abriam conexões extras. O guia de velocidade do Mind recomenda hospedar as fontes no próprio site.
- **O que ficou:** `lang="pt-BR"`, preload da imagem do hero com `fetchpriority="high"`, canonical absoluto, slug em minúsculas contra duplicação, `og:locale pt_BR`, `sameAs` com redes sociais, `AutoDealer` como vendedor no `Offer` e tokens de verificação no `<head>`.

## Antes de publicar

1. **Rich Results Test** em home, listagem e um veículo, sem erros nem avisos.
2. **Inspeção de URL** no Search Console: a página é indexável e o canonical escolhido pelo Google é o declarado.
3. **Depurador de compartilhamento** da Meta e teste real no WhatsApp: título, imagem e descrição certos.
4. **PageSpeed Insights** em celular na home e em um veículo: LCP, INP e CLS, com os dados de campo quando houver.
5. **Console do navegador sem violação de CSP** durante uma semana em modo Report-Only, antes de ativar a política.
6. **Cabeçalhos** conferidos em uma ferramenta de análise de segurança (por exemplo, securityheaders.com).
7. **Conteúdo versus marcação:** preço, quilometragem e disponibilidade do JSON-LD iguais aos da tela.
8. **Nenhuma página privada sem `noindex`** e nenhum token ou segredo no HTML gerado.

## Fontes pesquisadas

- Google Search Central, [simplificação dos resultados (jun/2025)](https://developers.google.com/search/blog/2025/06/simplifying-search-results) e [fim da caixa de busca de sitelinks (out/2024)](https://developers.google.com/search/blog/2024/10/sitelinks-search-box)
- Google Search Central, [especificações do robots meta e X-Robots-Tag](https://developers.google.com/search/docs/crawling-indexing/robots-meta-tag)
- web.dev, [maneiras mais eficazes de melhorar o Core Web Vitals](https://web.dev/articles/top-cwv) e [como os limites foram definidos](https://web.dev/articles/defining-core-web-vitals-thresholds)
- web.dev, [CSP estrita contra XSS](https://web.dev/articles/strict-csp); OWASP, [CSP Cheat Sheet](https://cheatsheetseries.owasp.org/cheatsheets/Content_Security_Policy_Cheat_Sheet.html) e [HTTP Headers Cheat Sheet](https://cheatsheetseries.owasp.org/cheatsheets/HTTP_Headers_Cheat_Sheet.html); MDN, [implementação de CSP](https://developer.mozilla.org/en-US/docs/Web/Security/Practical_implementation_guides/CSP)
- Chrome for Developers, [prerender e speculation rules](https://developer.chrome.com/docs/web-platform/prerender-pages)
- schema.org, [Car](https://schema.org/Car) e [proposta de vocabulário de veículos (W3C)](https://www.w3.org/wiki/WebSchemas/Vehicles)
- Google Merchant Center, [visão geral dos anúncios de veículos](https://support.google.com/merchants/answer/11189169) e [registro de alterações](https://support.google.com/merchants/answer/10060790)
- Fontes de apoio, de qualidade menor (blogs e fornecedores), usadas só para ícones e Consent Mode: [Evil Martians sobre favicons](https://evilmartians.com/chronicles/how-to-favicon-in-six-files-that-fit-most-needs) e [iubenda sobre Consent Mode](https://www.iubenda.com/pt-br/blog/google-consent-mode-o-que-e-como-funciona-e-o-que-mudou-na-v2/)

**Não verificado em fonte oficial nesta pesquisa:** as tags `product:price:*` do Open Graph (use o depurador da Meta para confirmar), os códigos de unidade `KMT` e `CMQ` (são do padrão UN/CEFACT adotado pelo schema.org) e o `'inline-speculation-rules'` em CSP (confira na documentação do Chrome ao ativar). Revise esta nota até a data de `revisar_ate`: Google, navegadores e a LGPD mudam rápido.

## Conexões

- [[developer]] — centralizador do assunto: o template segue a stack de referência e o checklist de publicação dele
- [[operador-do-mind]] — prompt do Operador, que consulta este template ao criar ou revisar o `<head>` do site de uma loja de veículos
- [[loja-veiculos-TEMPLATE-1]] — a estrutura de pastas à qual este arquivo (`includes/head.php`) pertence
- [[adicionar-marcacao-schema-org-a-um-site]] — método de dados estruturados que o bloco JSON-LD aplica (tipo mais específico, coerência com o que a página mostra)
- [[controlar-o-robo-de-busca-robots-txt-metatags-e-canonical]] — base das decisões de robots, canonical e noindex da tabela por tipo de página
- [[otimizar-os-elementos-de-uma-pagina-para-palavras-chave]] — regras de título e meta descrição usadas no head
- [[melhorar-velocidade-e-experiencia-movel-de-um-site]] — origem das práticas de preload, fontes próprias e imagem principal sem lazy
- [[regra-escape-a-saida-contra-xss]] — justifica o `e()` em todo valor e o `JSON_HEX_TAG` nos blocos JSON-LD
- [[otimizar-o-site-para-busca-com-ia-e-decidir-a-politica-de-rastreadores]] — dados consistentes da loja e política de robôs que complementam o robots.txt ligado ao head
- [[guia-seo-brasil]] — fonte das decisões de canonical, noindex, hreflang (só Brasil), dados estruturados e produto fora de estoque da tabela por tipo de página
- [[modelo-de-seguranca-da-web-no-navegador]] — explica a origem e a CSP em que se apoiam a política de scripts e os cabeçalhos do template
- [[configurar-pixel-api-de-conversoes-e-eventos-de-whatsapp-na-meta]] — o respeito ao consentimento que ela exige é o que o script de consentimento do head garante, sem pixel antes do aceite
