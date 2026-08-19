<?php

/**
 * Entry point Vercel PHP Serverless Runtime untuk Laravel
 * Runtime: vercel-php@0.7.4 (PHP 8.3 / Node 22)
 */

// Tolak PHP < 8.1 — Laravel 13 butuh minimal PHP 8.2
if (PHP_MAJOR_VERSION < 8 || (PHP_MAJOR_VERSION === 8 && PHP_MINOR_VERSION < 2)) {
    http_response_code(500);
    header('Content-Type: text/plain');
    echo 'Error: PHP ' . PHP_VERSION . ' tidak didukung. Laravel 13 butuh PHP 8.2+';
    exit(1);
}

// Root folder proyek (satu level di atas /api)
$rootPath   = dirname(__DIR__);
$publicPath = $rootPath . '/public';

// Setup $_SERVER agar Laravel bisa resolve path dengan benar
$_SERVER['DOCUMENT_ROOT']   = $publicPath;
$_SERVER['SCRIPT_FILENAME'] = $publicPath . '/index.php';
$_SERVER['SCRIPT_NAME']     = '/index.php';

// Pastikan storage/framework tersedia di /tmp (Vercel read-only FS)
$tmpDirs = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
];
foreach ($tmpDirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Override path storage Laravel ke /tmp
$_ENV['APP_STORAGE']             = '/tmp/storage';
$_SERVER['APP_STORAGE']          = '/tmp/storage';

// Inisialisasi database SQLite kosong jika belum ada
$sqliteDb = '/tmp/database.sqlite';
if (!file_exists($sqliteDb)) {
    touch($sqliteDb);
}

// Serve file statis dari public/ langsung (favicon, robots, dll)
$uri      = $_SERVER['REQUEST_URI'] ?? '/';
$uriPath  = parse_url($uri, PHP_URL_PATH);
$filePath = $publicPath . $uriPath;

if (
    $uriPath !== '/'
    && file_exists($filePath)
    && !is_dir($filePath)
) {
    return false; // Biarkan web server serve file statis
}

// Boot Laravel
require $publicPath . '/index.php';
