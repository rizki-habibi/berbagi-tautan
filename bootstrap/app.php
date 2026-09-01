<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

// ── Buat direktori /tmp yang dibutuhkan Laravel ───────────────────────────────
// Di Vercel, filesystem read-only kecuali /tmp
// Di lokal, /tmp juga bisa ditulis — aman untuk semua environment
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

// SQLite kosong jika belum ada
file_exists('/tmp/database.sqlite') || file_put_contents('/tmp/database.sqlite', '');

// ── Bootstrap Laravel dengan storage path ke /tmp ─────────────────────────────
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

// Override path storage dan bootstrap cache ke /tmp
// Ini yang membuat Vercel bisa menulis (maintenance flag, views cache, dll)
$app->useStoragePath('/tmp/storage');
$app->useBootstrapPath('/tmp/bootstrap');

return $app;
