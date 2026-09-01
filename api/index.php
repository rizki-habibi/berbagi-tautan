<?php

/**
 * Entry point Vercel PHP Serverless — Laravel 13
 * Runtime: vercel-php@0.8.0 (PHP 8.4)
 */

ini_set('display_errors', '1');
error_reporting(E_ALL);

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

// Cek APP_KEY
$appKey = getenv('APP_KEY') ?: ($_ENV['APP_KEY'] ?? '');
if (empty($appKey)) {
    http_response_code(500);
    echo '<pre>ERROR: APP_KEY tidak di-set! Pergi ke Vercel Dashboard → Settings → Environment Variables</pre>';
    exit(1);
}

// Serve file statis langsung
$uri     = $_SERVER['REQUEST_URI'] ?? '/';
$uriPath = parse_url($uri, PHP_URL_PATH);
$static  = $publicPath . $uriPath;
if ($uriPath !== '/' && file_exists($static) && !is_dir($static)) {
    return false;
}

// Boot Laravel (LARAVEL_START didefinisikan di public/index.php)
try {
    require $publicPath . '/index.php';
} catch (\Throwable $e) {
    http_response_code(500);
    echo '<pre>ERROR: ' . $e->getMessage() . "\n" . $e->getFile() . ':' . $e->getLine() . "\n\n" . $e->getTraceAsString() . '</pre>';
    exit(1);
}
