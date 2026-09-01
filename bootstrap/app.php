<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\ApplicationBuilder;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

// ── Siapkan /tmp sebelum Laravel boot ────────────────────────────────────────
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
file_exists('/tmp/database.sqlite') || file_put_contents('/tmp/database.sqlite', '');

// ── Buat Application instance dan set storage path SEBELUM service providers ──
$basePath = dirname(__DIR__);
$app = new Application(basePath: $basePath);

// Override storage & bootstrap path ke /tmp — WAJIB sebelum create()
// Ini memastikan MaintenanceModeManager cari file di /tmp bukan di /var/task/user/storage
$app->useStoragePath('/tmp/storage');
$app->useBootstrapPath('/tmp/bootstrap');

// ── Configure via ApplicationBuilder dengan instance yang sudah di-setup ──────
return (new ApplicationBuilder($app))
    ->withKernels()
    ->withRouting(
        web: $basePath . '/routes/web.php',
        commands: $basePath . '/routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Exclude PreventRequestsDuringMaintenance
        // (maintenance mode tidak bisa di-set di Vercel serverless)
        $middleware->remove([
            \Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );
    })
    ->create();
