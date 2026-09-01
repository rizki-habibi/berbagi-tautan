<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

// ── Deteksi environment Vercel ────────────────────────────────────────────────
// Di Vercel, filesystem read-only kecuali /tmp
// Override storage & bootstrap cache ke /tmp agar Laravel bisa menulis
$isVercel = isset($_ENV['VERCEL']) || isset($_SERVER['VERCEL'])
    || getenv('VERCEL') !== false
    || str_starts_with(getenv('HOME') ?? '', '/var/task');

if ($isVercel) {
    // Buat semua direktori yang dibutuhkan Laravel di /tmp
    $tmpDirs = [
        '/tmp/storage/app/public',
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

    // Buat SQLite kosong jika belum ada
    if (!file_exists('/tmp/database.sqlite')) {
        file_put_contents('/tmp/database.sqlite', '');
    }
}

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );
    })->create();

// Override path storage & bootstrap ke /tmp saat di Vercel
if ($isVercel) {
    $app->useStoragePath('/tmp/storage');
    $app->useBootstrapPath('/tmp/bootstrap');
}

return $app;
