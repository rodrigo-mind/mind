<?php
// ============================================================
// sitemap.php — gera o sitemap.xml a partir do banco
//
// ONDE COLOCAR: public_html/sitemap.php
// ACESSO: https://stmotors.com.br/sitemap.xml (via regra no .htaccess)
//
// STATUS: NÃO TESTADO (sem PHP no ambiente de criação). Teste antes de publicar:
//   1. Abra /sitemap.php no navegador e confira que o XML aparece com as motos.
//   2. Compare o número de <loc> de /estoque/motos/ com o contador do /estoque.
//   3. Só então ative a regra do .htaccess e apague o sitemap.xml estático.
//
// O que faz:
//  - lista as páginas fixas indexáveis;
//  - lista toda moto com ativo = 1 (a mesma condição de moto.php, então
//    nenhuma URL do sitemap devolve 404);
//  - anexa a foto principal de cada moto (extensão de imagem do Google);
//  - usa criado_em como <lastmod> (a tabela não tem coluna de atualização;
//    ver "lastmod" no guia que acompanha este arquivo).
// ============================================================

define('APP_LOADED', true);
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/db.php';

function xmlEsc(string $s): string {
    return htmlspecialchars($s, ENT_XML1 | ENT_QUOTES, 'UTF-8');
}

// Páginas fixas indexáveis. Use exatamente a URL canônica de cada página
// (com ou sem barra final, igual ao <link rel="canonical"> dela).
$paginas = [
    '/',
    '/estoque/',
    '/financiamento/',
    '/sobre-nos/',
    '/negociacao-garantia/',
    '/capacetes/',
];

try {
    $db = getDB();
    $st = $db->query(
        'SELECT m.slug, m.criado_em,
                (SELECT f.arquivo FROM moto_fotos f
                  WHERE f.moto_id = m.id
                  ORDER BY f.principal DESC, f.ordem ASC LIMIT 1) AS foto
           FROM motos m
          WHERE m.ativo = 1
          ORDER BY m.criado_em DESC, m.id DESC'
    );
    $motos = $st->fetchAll();
} catch (PDOException $e) {
    // Falha de banco: 503 faz o Google tentar de novo, em vez de achar que as
    // motos saíram do ar (o que aconteceria com um sitemap parcial).
    error_log('sitemap.php: ' . $e->getMessage());
    http_response_code(503);
    header('Retry-After: 3600');
    exit;
}

header('Content-Type: application/xml; charset=utf-8');
header('Cache-Control: public, max-age=3600');
header('X-Robots-Tag: noindex'); // o sitemap em si não deve aparecer nas buscas

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" '
   . 'xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";

foreach ($paginas as $p) {
    echo '  <url><loc>' . xmlEsc(SITE_URL . $p) . '</loc></url>' . "\n";
}

foreach ($motos as $m) {
    // Defesa: só slugs no mesmo formato aceito pela regra de roteamento do .htaccess.
    if (!preg_match('/^[a-z0-9-]+$/', (string)$m['slug'])) continue;

    $loc = SITE_URL . '/estoque/motos/' . $m['slug'];
    echo '  <url><loc>' . xmlEsc($loc) . '</loc>';

    if (!empty($m['criado_em'])) {
        $ts = strtotime((string)$m['criado_em']);
        if ($ts !== false) echo '<lastmod>' . date('c', $ts) . '</lastmod>';
    }

    if (!empty($m['foto'])) {
        $foto = (string)$m['foto'];
        $fotoUrl = preg_match('#^https?://#i', $foto) ? $foto : SITE_URL . '/' . ltrim($foto, '/');
        echo '<image:image><image:loc>' . xmlEsc($fotoUrl) . '</image:loc></image:image>';
    }

    echo '</url>' . "\n";
}

echo '</urlset>' . "\n";
