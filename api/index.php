<?php

/**
 * Entry point Vercel PHP Serverless — Laravel 13
 * Runtime: vercel-php@0.7.4 (PHP 8.3 / Node 22)
 */

define('LARAVEL_START', microtime(true));

$rootPath   = dirname(__DIR__);
$publicPath = $rootPath . '/public';

// ── 1. Buat semua direktori yang dibutuhkan Laravel di /tmp ──────────────────
$dirs = [
    '/tmp/storage/app/public',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
];
foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// ── 2. Inisialisasi SQLite kosong di /tmp ─────────────────────────────────────
if (!file_exists('/tmp/database.sqlite')) {
    file_put_contents('/tmp/database.sqlite', '');
}

// ── 3. Symlink storage/ → /tmp/storage (supaya Laravel pakai /tmp) ───────────
$storageLink = $rootPath . '/storage';
if (!is_link($storageLink) && is_dir($storageLink)) {
    // Salin isi storage yang perlu ke /tmp dulu jika ada
    // Lalu buat symlink
    rename($storageLink, $rootPath . '/storage_original');
    symlink('/tmp/storage', $storageLink);
} elseif (!file_exists($storageLink)) {
    symlink('/tmp/storage', $storageLink);
}

// ── 4. Symlink bootstrap/cache/ → /tmp/bootstrap/cache ───────────────────────
$bootstrapCache = $rootPath . '/bootstrap/cache';
if (!is_link($bootstrapCache) && is_dir($bootstrapCache)) {
    // Hapus isi cache lama (tidak perlu di serverless)
    array_map('unlink', glob($bootstrapCache . '/*'));
    rmdir($bootstrapCache);
    symlink('/tmp/bootstrap/cache', $bootstrapCache);
} elseif (!file_exists($bootstrapCache)) {
    symlink('/tmp/bootstrap/cache', $bootstrapCache);
}

// ── 5. Setup $_SERVER untuk Laravel ─────────────────────────────────────────
$_SERVER['DOCUMENT_ROOT']   = $publicPath;
$_SERVER['SCRIPT_FILENAME'] = $publicPath . '/index.php';
$_SERVER['SCRIPT_NAME']     = '/index.php';

// ── 6. Serve file statis dari public/ langsung ───────────────────────────────
$uri     = $_SERVER['REQUEST_URI'] ?? '/';
$uriPath = parse_url($uri, PHP_URL_PATH);
$static  = $publicPath . $uriPath;

if ($uriPath !== '/' && file_exists($static) && !is_dir($static)) {
    return false;
}

// ── 7. Boot Laravel ───────────────────────────────────────────────────────────
require $publicPath . '/index.php';
