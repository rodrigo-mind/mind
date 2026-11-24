<?php
define('APP_LOADED', true);
require_once __DIR__ . '/../../includes/security.php';
require_once __DIR__ . '/../../includes/db.php';

header('Content-Type: application/json; charset=utf-8');

$q = trim($_GET['q'] ?? '');
if (strlen($q) < 2) { echo '[]'; exit; }

/**
 * Normaliza uma string para comparação fuzzy:
 * - Remove acentos
 * - Lowercase
 * - Remove espaços, traços e caracteres especiais
 * Exemplos:
 *   "CB 300 R"  → "cb300r"
 *   "faser 250" → "faser250"
 *   "CB-300"    → "cb300"
 */
function normalizeSearch(string $s): string {
    // Transliteração de acentos
    $map = [
        'á'=>'a','à'=>'a','ã'=>'a','â'=>'a','ä'=>'a',
        'é'=>'e','è'=>'e','ê'=>'e','ë'=>'e',
        'í'=>'i','ì'=>'i','î'=>'i','ï'=>'i',
        'ó'=>'o','ò'=>'o','õ'=>'o','ô'=>'o','ö'=>'o',
        'ú'=>'u','ù'=>'u','û'=>'u','ü'=>'u',
        'ç'=>'c','ñ'=>'n',
        'Á'=>'a','À'=>'a','Ã'=>'a','Â'=>'a','Ä'=>'a',
        'É'=>'e','È'=>'e','Ê'=>'e','Ë'=>'e',
        'Í'=>'i','Ì'=>'i','Î'=>'i','Ï'=>'i',
        'Ó'=>'o','Ò'=>'o','Õ'=>'o','Ô'=>'o','Ö'=>'o',
        'Ú'=>'u','Ù'=>'u','Û'=>'u','Ü'=>'u',
        'Ç'=>'c','Ñ'=>'n',
    ];
    $s = strtr($s, $map);
    $s = strtolower($s);
    // Remove tudo que não seja letra ou número
    $s = preg_replace('/[^a-z0-9]/', '', $s);
    return $s;
}

/**
 * Gera variações de busca para o termo informado.
 * Garante que CB300, CB 300, cb300r etc. todos batam.
 */
function buildSearchVariants(string $raw): array {
    $variants = [];

    // Original com wildcards
    $variants[] = '%' . $raw . '%';

    // Sem espaços
    $noSpace = preg_replace('/\s+/', '', $raw);
    if ($noSpace !== $raw) {
        $variants[] = '%' . $noSpace . '%';
    }

    // Versão normalizada (sem acento, lowercase, sem separadores)
    $norm = normalizeSearch($raw);
    if ($norm !== strtolower($raw)) {
        $variants[] = '%' . $norm . '%';
    }

    // Adiciona espaço entre letras e números (CB300 → CB 300)
    $spaced = preg_replace('/([a-zA-Z])(\d)/', '$1 $2', $raw);
    $spaced = preg_replace('/(\d)([a-zA-Z])/', '$1 $2', $spaced);
    if ($spaced !== $raw) {
        $variants[] = '%' . $spaced . '%';
        $variants[] = '%' . preg_replace('/\s+/', '', $spaced) . '%';
    }

    // Remove espaços entre palavras e números para concat (Fazer 250 → Fazer250)
    $concat = preg_replace('/\s*(\d+)\s*/', '$1', $raw);
    if ($concat !== $raw) {
        $variants[] = '%' . $concat . '%';
    }

    return array_unique($variants);
}

/**
 * Substitui variações fonéticas comuns no mercado de motos BR:
 * faser/fazer, xtz/xt z, nxr/nx r, etc.
 */
function phoneticExpand(string $norm): array {
    $alts = [$norm];

    $phonetic = [
        'faser'  => 'fazer',
        'fazer'  => 'faser',
        'bros'   => 'bross',
        'bross'  => 'bros',
        'titan'  => 'titan',
        'hornet' => 'hornet',
        'lander' => 'lander',
        'crypton'=> 'criptom',
        'criptom'=> 'crypton',
    ];

    foreach ($phonetic as $from => $to) {
        if (str_contains($norm, $from)) {
            $alts[] = str_replace($from, $to, $norm);
        }
    }

    return array_unique($alts);
}

/**
 * Calcula similaridade entre dois strings normalizados.
 * Retorna 0.0–1.0. Usa similar_text + levenshtein combinados.
 */
function fuzzyScore(string $a, string $b): float {
    if ($a === $b) return 1.0;
    if (str_contains($b, $a) || str_contains($a, $b)) return 0.9;

    similar_text($a, $b, $pct);
    $score = $pct / 100;

    $maxLen = max(strlen($a), strlen($b));
    if ($maxLen > 0) {
        $lev      = levenshtein($a, $b);
        $levScore = 1 - ($lev / $maxLen);
        $score    = ($score + $levScore) / 2;
    }

    return $score;
}

try {
    $db   = getDB();
    $qNorm = normalizeSearch($q);

    // ── PASSO 1: busca SQL com múltiplas variantes ──────────
    $variants = buildSearchVariants($q);

    // Monta WHERE dinâmico: (marca LIKE ? OR modelo LIKE ? OR categoria LIKE ?) OR ...
    $conditions = [];
    $params     = [];
    foreach ($variants as $v) {
        $conditions[] = '(LOWER(REPLACE(REPLACE(m.marca," ",""),"-","")) LIKE LOWER(REPLACE(REPLACE(?," ",""),"-",""))
                       OR LOWER(REPLACE(REPLACE(m.modelo," ",""),"-","")) LIKE LOWER(REPLACE(REPLACE(?," ",""),"-",""))
                       OR LOWER(m.categoria) LIKE LOWER(?)
                       OR LOWER(CONCAT(m.marca," ",m.modelo)) LIKE LOWER(?))';
        $vNorm = preg_replace('/[^a-z0-9]/i', '%', $v); // suaviza internamente
        $params = array_merge($params, [$v, $v, $v, '%' . trim($v, '%') . '%']);
    }

    $sql = 'SELECT m.slug, m.marca, m.modelo, m.ano, m.preco, m.categoria, m.cilindrada
            FROM motos m
            WHERE m.ativo = 1 AND (' . implode(' OR ', $conditions) . ')
            ORDER BY m.criado_em DESC
            LIMIT 30';

    $st = $db->prepare($sql);
    $st->execute($params);
    $rows = $st->fetchAll(PDO::FETCH_ASSOC);

    // ── PASSO 2: Se poucos resultados, tenta fonética ────────
    if (count($rows) < 3) {
        $phonetics = phoneticExpand($qNorm);
        foreach ($phonetics as $alt) {
            if ($alt === $qNorm) continue;
            $stAlt = $db->prepare(
                'SELECT m.slug, m.marca, m.modelo, m.ano, m.preco, m.categoria, m.cilindrada
                 FROM motos m
                 WHERE m.ativo = 1
                   AND (LOWER(REPLACE(REPLACE(m.marca," ",""),"-","")) LIKE ?
                     OR LOWER(REPLACE(REPLACE(m.modelo," ",""),"-","")) LIKE ?)
                 LIMIT 10'
            );
            $stAlt->execute(['%' . $alt . '%', '%' . $alt . '%']);
            $extra = $stAlt->fetchAll(PDO::FETCH_ASSOC);
            $rows  = array_merge($rows, $extra);
        }
    }

    // ── PASSO 3: Deduplica por slug ──────────────────────────
    $seen = [];
    $unique = [];
    foreach ($rows as $r) {
        if (!isset($seen[$r['slug']])) {
            $seen[$r['slug']] = true;
            $unique[] = $r;
        }
    }

    // ── PASSO 4: Score de relevância fuzzy ──────────────────
    $scored = array_map(function ($r) use ($qNorm) {
        $haystack = normalizeSearch($r['marca'] . ' ' . $r['modelo']);
        $score    = fuzzyScore($qNorm, $haystack);

        // Boost se contém o termo
        if (str_contains($haystack, $qNorm)) $score += 0.3;

        // Boost se começa com o termo
        if (str_starts_with($haystack, $qNorm)) $score += 0.2;

        $r['_score'] = $score;
        return $r;
    }, $unique);

    // Ordena por score desc
    usort($scored, fn($a, $b) => $b['_score'] <=> $a['_score']);

    // ── PASSO 5: Formata output ──────────────────────────────
    $out = array_map(function ($r) {
        return [
            'slug'       => $r['slug'],
            'marca'      => $r['marca'],
            'modelo'     => $r['modelo'],
            'ano'        => $r['ano'],
            'preco'      => number_format((float)$r['preco'], 2, ',', '.'),
            'categoria'  => $r['categoria'],
            'cilindrada' => (int)$r['cilindrada'],
        ];
    }, array_slice($scored, 0, 8));

    echo json_encode($out, JSON_UNESCAPED_UNICODE);

} catch (PDOException $e) {
    echo '[]';
}