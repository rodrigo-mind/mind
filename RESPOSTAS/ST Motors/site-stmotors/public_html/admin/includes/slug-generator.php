<?php
defined('ADMIN_LOADED') or die(http_response_code(403));

function generateSlug(string $text): string {
    $text = mb_strtolower($text, 'UTF-8');
    $text = strtr($text, [
        'á'=>'a','à'=>'a','ã'=>'a','â'=>'a','ä'=>'a',
        'é'=>'e','è'=>'e','ê'=>'e','ë'=>'e',
        'í'=>'i','ì'=>'i','î'=>'i','ï'=>'i',
        'ó'=>'o','ò'=>'o','õ'=>'o','ô'=>'o','ö'=>'o',
        'ú'=>'u','ù'=>'u','û'=>'u','ü'=>'u',
        'ç'=>'c','ñ'=>'n',
    ]);
    $text = preg_replace('/[^a-z0-9\s-]/', '', $text);
    $text = preg_replace('/[\s-]+/', '-', trim($text));
    return $text;
}

function uniqueSlug(PDO $db, string $base, ?int $excludeId = null): string {
    $slug = $candidate = generateSlug($base);
    $i = 1;
    while (true) {
        $sql = 'SELECT id FROM motos WHERE slug = ?';
        $params = [$candidate];
        if ($excludeId) { $sql .= ' AND id != ?'; $params[] = $excludeId; }
        $st = $db->prepare($sql);
        $st->execute($params);
        if (!$st->fetch()) return $candidate;
        $candidate = $slug . '-' . $i++;
    }
}