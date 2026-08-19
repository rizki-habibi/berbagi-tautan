<?php

// Entry point untuk Vercel PHP Serverless Runtime
// Semua request diarahkan ke Laravel melalui file ini

// Pastikan path ke public folder benar
$publicPath = __DIR__ . '/../public';

// Override $_SERVER supaya Laravel tahu root yang benar
$_SERVER['DOCUMENT_ROOT']   = $publicPath;
$_SERVER['SCRIPT_FILENAME'] = $publicPath . '/index.php';

// Serve static assets dari public/build langsung (CSS/JS)
$uri = $_SERVER['REQUEST_URI'] ?? '/';
$filePath = $publicPath . parse_url($uri, PHP_URL_PATH);

if (
    $uri !== '/'
    && file_exists($filePath)
    && !is_dir($filePath)
) {
    // Biarkan file statis diserve langsung
    return false;
}

// Semua request lain → masuk ke Laravel
require $publicPath . '/index.php';
