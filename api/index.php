<?php

/**
 * Entry point Vercel PHP Serverless — Laravel 13
 * Runtime: vercel-php@0.7.4 (PHP 8.3)
 */

// Tampilkan semua error PHP mentah untuk debugging
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

define('LARAVEL_START', microtime(true));

$rootPath   = dirname(__DIR__);
$publicPath = $rootPath . '/public';

// Tandai environment Vercel
$_ENV['VERCEL']    = '1';
$_SERVER['VERCEL'] = '1';
putenv('VERCEL=1');

// Setup $_SERVER
$_SERVER['DOCUMENT_ROOT']   = $publicPath;
$_SERVER['SCRIPT_FILENAME'] = $publicPath . '/index.php';
$_SERVER['SCRIPT_NAME']     = '/index.php';

// Serve file statis langsung
$uri     = $_SERVER['REQUEST_URI'] ?? '/';
$uriPath = parse_url($uri, PHP_URL_PATH);
$static  = $publicPath . $uriPath;
if ($uriPath !== '/' && file_exists($static) && !is_dir($static)) {
    return false;
}

// Cek apakah autoload ada
if (!file_exists($rootPath . '/vendor/autoload.php')) {
    http_response_code(500);
    echo '<pre>ERROR: vendor/autoload.php tidak ditemukan di: ' . $rootPath . '</pre>';
    echo '<pre>Files in root: ' . implode(', ', scandir($rootPath)) . '</pre>';
    exit(1);
}

// Cek APP_KEY
$appKey = getenv('APP_KEY') ?: ($_ENV['APP_KEY'] ?? '');
if (empty($appKey)) {
    http_response_code(500);
    echo '<pre>ERROR: APP_KEY tidak di-set di environment variables Vercel!</pre>';
    echo '<pre>Pergi ke Vercel Dashboard → Settings → Environment Variables → tambah APP_KEY</pre>';
    exit(1);
}

// Boot Laravel dengan error handler
try {
    require $publicPath . '/index.php';
} catch (\Throwable $e) {
    http_response_code(500);
    echo '<pre>';
    echo 'ERROR: ' . $e->getMessage() . "\n";
    echo 'File: ' . $e->getFile() . ':' . $e->getLine() . "\n\n";
    echo $e->getTraceAsString();
    echo '</pre>';
    exit(1);
}
