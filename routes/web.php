<?php

use App\Http\Controllers\ProfilController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LinkController;
use Illuminate\Support\Facades\Route;

// ─── Halaman Publik ──────────────────────────────────────────────────────────
Route::get('/', [ProfilController::class, 'tampilkan'])->name('profil');
Route::get('/klik/{link}', [ProfilController::class, 'klik'])->name('link.klik');

// Halaman berbagi per link (slug) — misal /berbagi/lazada-murah
Route::get('/berbagi/{slug}', [ProfilController::class, 'halamanBerbagi'])->name('link.berbagi');

// ─── Auth ────────────────────────────────────────────────────────────────────
Route::get('/admin/login', [AuthController::class, 'tampilkanLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

// ─── Admin (hanya bisa diakses setelah login) ─────────────────────────────────
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('links', LinkController::class);
    Route::patch('/links/{link}/toggle', [LinkController::class, 'toggleAktif'])->name('links.toggle');
    Route::patch('/links/{link}/unggulan', [LinkController::class, 'toggleUnggulan'])->name('links.unggulan');
});
