<?php

/**
 * Entry point Vercel PHP Serverless — Laravel 13
 * Runtime: vercel-php@0.7.4 (PHP 8.3 / Node 22)
 */

define('LARAVEL_START', microtime(true));

$rootPath   = dirname(__DIR__);
$publicPath = $rootPath . '/public';

// Setup $_SERVER untuk Laravel
$_SERVER['DOCUMENT_ROOT']   = $publicPath;
$_SERVER['SCRIPT_FILENAME'] = $publicPath . '/index.php';
$_SERVER['SCRIPT_NAME']     = '/index.php';

// Tandai bahwa kita di Vercel (dipakai bootstrap/app.php)
$_ENV['VERCEL']    = '1';
$_SERVER['VERCEL'] = '1';
putenv('VERCEL=1');

// Serve file statis dari public/ langsung
$uri     = $_SERVER['REQUEST_URI'] ?? '/';
$uriPath = parse_url($uri, PHP_URL_PATH);
$static  = $publicPath . $uriPath;

if ($uriPath !== '/' && file_exists($static) && !is_dir($static)) {
    return false;
}

// Boot Laravel
require $publicPath . '/index.php';
