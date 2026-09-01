<?php

/**
 * Entry point Vercel PHP Serverless — Laravel 13
 * Runtime: vercel-php@0.8.0 (PHP 8.4)
 */

ini_set('display_errors', '1');
error_reporting(E_ALL);

$rootPath   = dirname(__DIR__);
$publicPath = $rootPath . '/public';

// ── Set env vars SEBELUM Laravel boot ──────────────────────────────────────
// Ini memastikan semua config Laravel terbaca dengan benar di serverless
$envVars = [
    'VERCEL'                => '1',
    'APP_ENV'               => 'production',
    'APP_DEBUG'             => 'true',
    'APP_URL'               => 'https://berbagi-tautan-rizki.vercel.app',
    'SESSION_DRIVER'        => 'cookie',
    'SESSION_SECURE_COOKIE' => 'true',
    'SESSION_LIFETIME'      => '120',
    'CACHE_STORE'           => 'array',
    'CACHE_PREFIX'          => '',
    'LOG_CHANNEL'           => 'stderr',
    'LOG_LEVEL'             => 'debug',
    'DB_CONNECTION'         => 'sqlite',
    'DB_DATABASE'           => '/tmp/database.sqlite',
    'FILESYSTEM_DISK'       => 'local',
    'QUEUE_CONNECTION'      => 'sync',
    'BROADCAST_CONNECTION'  => 'log',
    'MAIL_MAILER'           => 'log',
    'VIEW_COMPILED_PATH'    => '/tmp/storage/framework/views',
];

foreach ($envVars as $key => $value) {
    // Jangan override jika sudah di-set dari Vercel Dashboard
    if (getenv($key) === false) {
        putenv("$key=$value");
        $_ENV[$key]    = $value;
        $_SERVER[$key] = $value;
    }
}

// APP_KEY wajib ada
$appKey = getenv('APP_KEY') ?: ($_ENV['APP_KEY'] ?? '');
if (empty($appKey)) {
    http_response_code(500);
    echo '<h2>ERROR: APP_KEY tidak di-set!</h2>';
    echo '<p>Pergi ke Vercel Dashboard → Settings → Environment Variables → tambah APP_KEY</p>';
    exit(1);
}

// ── Setup $_SERVER ──────────────────────────────────────────────────────────
$_SERVER['DOCUMENT_ROOT']   = $publicPath;
$_SERVER['SCRIPT_FILENAME'] = $publicPath . '/index.php';
$_SERVER['SCRIPT_NAME']     = '/index.php';

// ── Buat direktori /tmp yang dibutuhkan Laravel ─────────────────────────────
foreach ([
    '/tmp/storage/app/public',
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
] as $dir) {
    is_dir($dir) || mkdir($dir, 0755, true);
}

// SQLite kosong
file_exists('/tmp/database.sqlite') || file_put_contents('/tmp/database.sqlite', '');

// ── Serve file statis ───────────────────────────────────────────────────────
$uriPath = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$static  = $publicPath . $uriPath;
if ($uriPath !== '/' && file_exists($static) && !is_dir($static)) {
    return false;
}

// ── Boot Laravel ────────────────────────────────────────────────────────────
try {
    require $publicPath . '/index.php';
} catch (\Throwable $e) {
    http_response_code(500);
    echo '<pre><strong>' . get_class($e) . '</strong>: ' . $e->getMessage()
        . "\n" . $e->getFile() . ':' . $e->getLine()
        . "\n\n" . $e->getTraceAsString() . '</pre>';
    exit(1);
}
