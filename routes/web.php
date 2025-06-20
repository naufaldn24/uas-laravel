<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth; // Tambahan untuk logout

// ✅ Halaman utama publik
Route::get('/', function () {
    return view('frontend.home');
});

// ✅ Halaman publik tambahan (statis)
Route::view('/profil', 'frontend.profil')->name('profil');
Route::view('/visi-misi', 'frontend.visi-misi')->name('visi-misi');
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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin berita dan kategori
    Route::resource('kategori', KategoriController::class);
    Route::resource('berita', BeritaController::class)->parameters([
        'berita' => 'berita'
    ]);
});

// ✅ Route logout manual (POST)
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// ✅ Autentikasi Laravel Breeze / Jetstream
require __DIR__ . '/auth.php';
