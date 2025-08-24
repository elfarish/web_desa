<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// ====================
// User Controllers
// ====================
use App\Http\Controllers\User\BerandaController as UserBerandaController;
use App\Http\Controllers\User\BeritaController as UserBeritaController;
use App\Http\Controllers\User\ProfilController as UserProfilController;
use App\Http\Controllers\User\StrukturalController as UserStrukturalController;
use App\Http\Controllers\User\PotensiController as UserPotensiController;
use App\Http\Controllers\User\LayananController as UserLayananController;

// ====================
// Admin Controllers
// ====================
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BerandaController as AdminBerandaController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\StatistikController;
use App\Http\Controllers\Admin\StrukturalController as AdminStrukturalController;
use App\Http\Controllers\Admin\PotensiController as AdminPotensiController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\LayananController as AdminLayananController;
use App\Http\Controllers\Admin\SuratController;
use App\Http\Controllers\Admin\ProposalController;

// ====================
// Public (User) Routes
// ====================
Route::prefix('/')->name('user.')->group(function () {

    // Beranda
    Route::get('/', [UserBerandaController::class, 'index'])->name('beranda');

    // Struktural & Potensi
    // Kepengurusan
    Route::get('/struktural/kepengurusan', [UserStrukturalController::class, 'kepengurusan'])
        ->name('user.struktural.kepengurusan');

    // Lembaga BPD
    Route::get('/struktural/kepengurusan', [UserStrukturalController::class, 'kepengurusan'])
        ->name('struktural.kepengurusan'); // nama lengkap jadi user.struktural.kepengurusan

    Route::get('/struktural/lembaga_bpd', [UserStrukturalController::class, 'lembagaBPD'])
        ->name('struktural.lembaga_bpd'); // nama lengkap jadi user.struktural.lembaga_bpd

    Route::get('/potensi', [UserPotensiController::class, 'index'])->name('potensi.index');


    // Berita
    Route::get('/berita', [UserBeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/{id}', [UserBeritaController::class, 'show'])->name('berita.show');

    // Layanan
    Route::prefix('layanan')->name('layanan.')->group(function () {
        Route::get('/', [UserLayananController::class, 'index'])->name('index');
        Route::get('/surat', [UserLayananController::class, 'surat'])->name('surat');
        Route::get('/pengajuan', [UserLayananController::class, 'pengajuan'])->name('pengajuan');
    });
});

// Profil Desa
Route::prefix('profil')->name('user.profil.')->group(function () {
    Route::get('/', [UserProfilController::class, 'index'])->name('index');           // Profil utama
    Route::get('/visi-misi', [UserProfilController::class, 'visiMisi'])->name('visi_misi'); // Visi & Misi
    Route::get('/sejarah', [UserProfilController::class, 'sejarah'])->name('sejarah_desa'); // Sejarah Desa
});

// ====================
// Authentication Routes
// ====================
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// ====================
// Admin Routes (Protected)
// ====================
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    // Dashboard & Beranda
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/beranda', [AdminBerandaController::class, 'index'])->name('beranda');

    // Slide CRUD
    Route::resource('slide', SlideController::class)->except(['show']);

    // Statistik CRUD
    Route::resource('statistik', StatistikController::class)->except(['show']);

    // Struktural CRUD
    Route::resource('struktural', AdminStrukturalController::class);

    // Potensi
    Route::get('/potensi', [AdminPotensiController::class, 'index'])->name('potensi');

    // Berita CRUD
    Route::resource('berita', AdminBeritaController::class);

    // Galeri CRUD
    Route::resource('galeri', AdminGaleriController::class);

    // Layanan
    Route::prefix('layanan')->name('layanan.')->group(function () {
        Route::get('/', [AdminLayananController::class, 'index'])->name('index');
        Route::get('/surat', [SuratController::class, 'index'])->name('surat.index');
        Route::get('/proposal', [ProposalController::class, 'index'])->name('proposal.index');
    });
});
