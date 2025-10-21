<?php

use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\DashboardController;
// ====================
// Auth Controllers
// ====================
use App\Http\Controllers\Admin\GaleriController;
// ====================
// Admin Controllers
// ====================
use App\Http\Controllers\Admin\LayananController as AdminLayananController;
use App\Http\Controllers\Admin\PengajuanProposalController;
use App\Http\Controllers\Admin\PengaturanController;
use App\Http\Controllers\Admin\PotensiController as AdminPotensiController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\StatistikController;
use App\Http\Controllers\Admin\StrukturalController as AdminStrukturalController;
use App\Http\Controllers\Admin\TamplateSuratController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\BerandaController as UserBerandaController;
use App\Http\Controllers\User\BeritaController as UserBeritaController;
// ====================
// User Controllers
// ====================
use App\Http\Controllers\User\LayananController as UserLayananController;
use App\Http\Controllers\User\PotensiController as UserPotensiController;
use App\Http\Controllers\User\ProfilController as UserProfilController;
use App\Http\Controllers\User\StrukturalController as UserStrukturalController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// storage link
Route::get('/link', function () {
    Artisan::call('storage:link');
});

// ====================
// User Routes (Frontend)
// ====================
Route::prefix('/')->name('user.')->group(function () {
    // Beranda
    Route::get('/', [UserBerandaController::class, 'index'])->name('beranda');

    // Struktural
    Route::prefix('struktural')->name('struktural.')->group(function () {
        Route::get('kepengurusan', [UserStrukturalController::class, 'kepengurusan'])->name('kepengurusan');
        Route::get('lembaga-bpd', [UserStrukturalController::class, 'lembagaBPD'])->name('lembaga_bpd');
    });

    // Potensi
    Route::get('potensi', [UserPotensiController::class, 'index'])->name('potensi.index');

    // Berita
    Route::prefix('berita')->name('berita.')->group(function () {
        Route::get('/', [UserBeritaController::class, 'index'])->name('index');
        Route::get('{slug}', [UserBeritaController::class, 'show'])->name('show');
    });

    // Profil
    Route::prefix('profil')->name('profil.')->group(function () {
        Route::get('/', [UserProfilController::class, 'index'])->name('index');
        Route::get('visi-misi', [UserProfilController::class, 'visiMisi'])->name('visi_misi');
        Route::get('sejarah', [UserProfilController::class, 'sejarah'])->name('sejarah_desa');
    });

    // Layanan
    Route::prefix('layanan')->name('layanan.')->group(function () {
        Route::get('surat', [UserLayananController::class, 'surat'])->name('surat');
        Route::get('proposal', [UserLayananController::class, 'proposal'])->name('proposal');

        // Download
        Route::get('surat/download/{id}', [UserLayananController::class, 'downloadSurat'])->name('surat.download');
        Route::get('proposal/download/{id}', [UserLayananController::class, 'downloadProposal'])->name('proposal.download');
    });
});

// ====================
// Auth Routes
// ====================
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ====================
// Admin Routes (Backend)
// ====================
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Berita
    Route::resource('berita', AdminBeritaController::class)->names('berita');

    // Galeri
    Route::resource('galeri', GaleriController::class)->names('galeri');

    // Pengaturan
    Route::get('pengaturan', [PengaturanController::class, 'index'])->name('pengaturan.index');

    // Struktural
    Route::resource('struktural', AdminStrukturalController::class)->names('struktural');

    // Potensi
    Route::get('potensi', [AdminPotensiController::class, 'index'])->name('potensi.index');

    // Layanan
    Route::prefix('layanan')->name('layanan.')->group(function () {
        // Custom page (opsional)
        Route::get('pengajuan-proposal', [AdminLayananController::class, 'pengajuanProposal'])->name('pengajuan_proposal');
        Route::get('template-surat', [AdminLayananController::class, 'templateSurat'])->name('template_surat');

        // Resource route (dengan penamaan underscore)
        Route::resource('tamplate-surat', TamplateSuratController::class)->names('tamplate_surat');
        Route::resource('pengajuan-proposal', PengajuanProposalController::class)->names('pengajuan_proposal');

        // Download
        Route::get('tamplate-surat/{tamplateSurat}/download', [TamplateSuratController::class, 'download'])
            ->name('tamplate_surat.download');
    });

    // Beranda Admin
    Route::prefix('beranda')->name('beranda.')->group(function () {
        Route::resource('slide', SlideController::class)->names('slide');
        Route::resource('statistik', StatistikController::class)->names('statistik');
    });
});
