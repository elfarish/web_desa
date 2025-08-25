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
use App\Http\Controllers\User\LayananController;

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
use App\Http\Controllers\Admin\SettingController;

// ====================
// Public (User) Routes
// ====================
Route::prefix('/')->name('user.')->group(function () {

    Route::get('/', [UserBerandaController::class, 'index'])->name('beranda');

    // Struktural
    Route::get('/struktural/kepengurusan', [UserStrukturalController::class, 'kepengurusan'])
        ->name('struktural.kepengurusan');
    Route::get('/struktural/lembaga_bpd', [UserStrukturalController::class, 'lembagaBPD'])
        ->name('struktural.lembaga_bpd');

    // Potensi
    Route::get('/potensi', [UserPotensiController::class, 'index'])->name('potensi.index');

    // Berita
    Route::get('/berita', [UserBeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/{slug}', [UserBeritaController::class, 'show'])->name('berita.show');

    // Profil
    Route::prefix('profil')->name('profil.')->group(function () {
        Route::get('/', [UserProfilController::class, 'index'])->name('index');
        Route::get('/visi-misi', [UserProfilController::class, 'visiMisi'])->name('visi_misi');
        Route::get('/sejarah', [UserProfilController::class, 'sejarah'])->name('sejarah_desa');
    });

    // Layanan
    Route::prefix('layanan')->name('layanan.')->group(function () {
        // Halaman daftar template surat
        Route::get('surat', [LayananController::class, 'surat'])->name('surat');
        Route::get('proposal', [LayananController::class, 'proposal'])->name('proposal');
        // Download template surat
        Route::get('surat/download/{id}', [LayananController::class, 'downloadSurat'])->name('surat.download');
        Route::get('proposal/download/{id}', [LayananController::class, 'downloadProposal'])->name('proposal.download');
        // (Jika nanti ingin tambah proposal, bisa ditambahkan di sini)
    });
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

    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/beranda', [AdminBerandaController::class, 'index'])->name('beranda');

    // Slide
    Route::resource('slide', SlideController::class)->except(['show']);

    // Statistik
    Route::resource('statistik', StatistikController::class)->except(['show']);

    // Struktural
    Route::resource('struktural', AdminStrukturalController::class);

    // Potensi
    Route::get('/potensi', [AdminPotensiController::class, 'index'])->name('potensi');

    // Berita
    Route::resource('berita', AdminBeritaController::class);

    // Galeri
    Route::resource('galeri', AdminGaleriController::class);

    // Layanan
    Route::get('layanan', [AdminLayananController::class, 'index'])->name('layanan.index');
    Route::get('layanan/create', [AdminLayananController::class, 'create'])->name('layanan.create');
    Route::post('layanan', [AdminLayananController::class, 'store'])->name('layanan.store');
    Route::get('layanan/{id}/edit', [AdminLayananController::class, 'edit'])->name('layanan.edit');
    Route::put('layanan/{id}', [AdminLayananController::class, 'update'])->name('layanan.update');
    Route::delete('layanan/{id}', [AdminLayananController::class, 'destroy'])->name('layanan.destroy');
    Route::get('layanan/download/{id}', [AdminLayananController::class, 'downloadFile'])->name('layanan.download');

    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings/update', [SettingController::class, 'update'])->name('settings.update');
});
