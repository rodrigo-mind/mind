<?php
defined('ADMIN_LOADED') or die(http_response_code(403));

const MOTO_UPLOAD_DIR      = __DIR__ . '/../../assets/images/motos/';
const MOTO_UPLOAD_URL_BASE = '/assets/images/motos/';
const MOTO_UPLOAD_MAX_MB   = 8;
const MOTO_UPLOAD_ALLOWED  = ['image/jpeg','image/png','image/webp'];

function handleMotoUpload(array $file): string {
    if ($file['error'] !== UPLOAD_ERR_OK) throw new RuntimeException('Erro no upload.');

    $max = MOTO_UPLOAD_MAX_MB * 1024 * 1024;
    if ($file['size'] > $max) throw new RuntimeException('Arquivo muito grande. Máx ' . MOTO_UPLOAD_MAX_MB . 'MB.');

    $finfo    = new finfo(FILEINFO_MIME_TYPE);
    $mimeReal = $finfo->file($file['tmp_name']);
    if (!in_array($mimeReal, MOTO_UPLOAD_ALLOWED, true)) throw new RuntimeException('Formato inválido. Use JPG, PNG ou WebP.');

    if (!is_dir(MOTO_UPLOAD_DIR)) mkdir(MOTO_UPLOAD_DIR, 0755, true);

    $extMap   = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp'];
    $ext      = $extMap[$mimeReal] ?? 'jpg'; // seguro: $mimeReal já passou pela allowlist acima
    $filename = bin2hex(random_bytes(16)) . '.' . $ext;
    $dest     = MOTO_UPLOAD_DIR . $filename;

    if (!move_uploaded_file($file['tmp_name'], $dest)) throw new RuntimeException('Falha ao salvar arquivo.');

    return MOTO_UPLOAD_URL_BASE . $filename;
}

function deleteMotoFoto(string $url): void {
    $path = __DIR__ . '/../../' . ltrim($url, '/');
    if (file_exists($path)) unlink($path);
}