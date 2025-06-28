<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PetugasController;

// ✅ Halaman utama publik (pakai controller)
Route::get('/', [HomeController::class, 'index'])->name('home');

// ✅ Halaman publik tambahan (statis)
Route::get('/profil', [HomeController::class, 'profil'])->name('profil');
Route::get('/visi-misi', [HomeController::class, 'visiMisi'])->name('visi-misi');
Route::view('/kontak', 'frontend.kontak')->name('kontak');

// ✅ Halaman publik berita (mengambil dari database)
Route::get('/berita-umum', [BeritaController::class, 'publicIndex'])->name('berita.publik');
Route::get('/berita-umum/{slug}', [BeritaController::class, 'showPublic'])->name('berita.show.public');

// ✅ Dashboard admin (harus login)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// ✅ Semua route admin hanya untuk user yang login
Route::middleware('auth')->group(function () {
    // Profil user
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin konten
    Route::resource('kategori', KategoriController::class);
    Route::resource('berita', BeritaController::class)->parameters([
        'berita' => 'berita'
    ]);
    Route::resource('petugas', PetugasController::class);

    // Chart dashboard
    Route::get('/dashboard/chart-data', [DashboardController::class, 'chartData'])->name('dashboard.chart');
});

// ✅ Route logout manual (POST)
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// ✅ Autentikasi Laravel Breeze / Jetstream
require __DIR__ . '/auth.php';
