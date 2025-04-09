<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\ArtikelController;
use App\Http\Controllers\Backend\BerandaController as BackendBerandaController;
use App\Http\Controllers\Backend\DashboardController as BackendDashboardController;
use App\Http\Controllers\Backend\DetailInformationController;
use App\Http\Controllers\Backend\FasilitasController;
use App\Http\Controllers\Backend\KaryaController;
use App\Http\Controllers\Backend\KegiatanController;
use App\Http\Controllers\Backend\MottoTujuanController;
use App\Http\Controllers\Backend\NewsController as BackendNewsController;
use App\Http\Controllers\Backend\PengajarController;
use App\Http\Controllers\Backend\PrestasiController;
use App\Http\Controllers\Backend\ProgramController;
use App\Http\Controllers\Backend\SambutanController;
use App\Http\Controllers\Backend\SessionController;
use App\Http\Controllers\Backend\StatistikController;
use App\Http\Controllers\Backend\VisiMisiController;
use App\Http\Controllers\Frontend\BerandaController;
use App\Http\Controllers\Frontend\ArtikelController as FrontendArtikelController;
use App\Http\Controllers\Frontend\BeritaController as FrontendBeritaController;
use App\Http\Controllers\Frontend\FasilitasController as FrontendFasilitasController;
use App\Http\Controllers\Frontend\KegiatanController as FrontendKegiatanController;
use App\Http\Controllers\Frontend\PengajarController as FrontendPengajarController;
use App\Http\Controllers\Frontend\PrestasiController as FrontendPrestasiController;
use App\Http\Controllers\Frontend\VisiMisiController as FrontendVisiMisiController;
use App\Http\Controllers\Frontend\ProgramUnggulanController as FrontendProgramUnggulanController;

Route::get('/', [BerandaController::class, 'index'])->name('base-frontend-beranda.index');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/website/login', [AuthenticatedSessionController::class, 'create'])->name('login-admin');

// Landing Page Route
Route::get('/website/', [BerandaController::class, 'index'])->name('frontend-beranda.index');
Route::get('/website/visi-misi', [FrontendVisiMisiController::class, 'index'])->name('frontend-visi-misi.index');
Route::get('/website/pengajar', [FrontendPengajarController::class, 'index'])->name('frontend-pengajar.index');
Route::get('/website/program-unggulan', [FrontendProgramUnggulanController::class, 'index'])->name('frontend-program-unggulan.index');
Route::get('/website/fasilitas', [FrontendFasilitasController::class, 'index'])->name('frontend-fasilitas.index');
Route::get('/website/prestasi', [FrontendPrestasiController::class, 'index'])->name('frontend-prestasi.index');

Route::get('/website/berita', [FrontendBeritaController::class, 'index'])->name('frontend-berita.index');
Route::get('/website/berita/{id}', [FrontendBeritaController::class, 'show'])->name('frontend-berita.show');
Route::post('/website/berita/post-komentar/{id}', [FrontendBeritaController::class, 'postKomentar'])->name('frontend-berita.komentar');

Route::get('/website/kegiatan', [FrontendKegiatanController::class, 'index'])->name('frontend-kegiatan.index');
Route::get('/website/artikel', [FrontendArtikelController::class, 'index'])->name('frontend-artikel.index');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard-backend', [BackendDashboardController::class, 'index'])->name('dashboard');

    Route::get('/beranda', [BackendBerandaController::class, 'index'])->name('beranda.index');
    Route::put('/beranda/{id}', [BackendBerandaController::class, 'update'])->name('beranda.update');

    // ----------------- VISI MISI ROUTE ----------------- //
    Route::get('/visi-misi', [VisiMisiController::class, 'index'])->name('visi-misi.index');
    // for VISI
    Route::put('/visi-misi/visi-update/{id}', [VisiMisiController::class, 'updateVisi'])->name('visi.update');
    //  for MISI
    Route::post('/visi-misi/misi', [VisiMisiController::class, 'storeMisi'])->name('misi.store');
    Route::put('/visi-misi/misi/{id}', [VisiMisiController::class, 'updateMisi'])->name('misi.update');
    Route::delete('/visi-misi/misi/{id}', [VisiMisiController::class, 'destroyMisi'])->name('misi.destroy');

    // ----------------- MOTTO TUJUAN ROUTE ----------------- //
    Route::get('/motto-tujuan', [MottoTujuanController::class, 'index'])->name('motto-tujuan.index');
    // for MOTTO
    Route::put('/motto-tujuan/motto-update/{id}', [MottoTujuanController::class, 'updateMotto'])->name('motto.update');
    // for TUJUAN
    Route::post('motto-tujuan/tujuan', [MottoTujuanController::class, 'storeTujuan'])->name('tujuan.store');
    Route::put('motto-tujuan/tujuan/{id}', [MottoTujuanController::class, 'updateTujuan'])->name('tujuan.update');
    Route::delete('motto-tujuan/tujuan/{id}', [MottoTujuanController::class, 'destroyTujuan'])->name('tujuan.destroy');

    // Sambutan Backend
    Route::get('/sambutan', [SambutanController::class, 'index'])->name('sambutan.index');
    Route::put('/sambutan/{id}', [SambutanController::class, 'update'])->name('sambutan.update');

    // Pengajar Backend
    Route::get('/pengajar', [PengajarController::class, 'index'])->name('pengajar.index');
    Route::get('/pengajar/create', [PengajarController::class, 'create'])->name('pengajar.create');
    Route::post('/pengajar', [PengajarController::class, 'store'])->name('pengajar.store');
    Route::get('/pengajar/{id}/edit', [PengajarController::class, 'edit'])->name('pengajar.edit');
    Route::put('/pengajar/{id}', [PengajarController::class, 'update'])->name('pengajar.update');
    Route::delete('/pengajar/{id}', [PengajarController::class, 'destroy'])->name('pengajar.destroy');

    // Program Backend
    Route::get('/program', [ProgramController::class, 'index'])->name('program.index');
    Route::get('/program/create', [ProgramController::class, 'create'])->name('program.create');
    Route::post('/program', [ProgramController::class, 'store'])->name('program.store');
    Route::get('/program/{id}/edit', [ProgramController::class, 'edit'])->name('program.edit');
    Route::put('/program/{id}', [ProgramController::class, 'update'])->name('program.update');
    Route::delete('/program/{id}', [ProgramController::class, 'destroy'])->name('program.destroy');

    // Fasilitas Backend
    Route::get('/fasilitas', [FasilitasController::class, 'index'])->name('fasilitas.index');
    Route::get('/fasilitas/create', [FasilitasController::class, 'create'])->name('fasilitas.create');
    Route::post('/fasilitas', [FasilitasController::class, 'store'])->name('fasilitas.store');
    Route::get('/fasilitas/{id}/edit', [FasilitasController::class, 'edit'])->name('fasilitas.edit');
    Route::put('/fasilitas/{id}', [FasilitasController::class, 'update'])->name('fasilitas.update');
    Route::delete('/fasilitas/{id}', [FasilitasController::class, 'destroy'])->name('fasilitas.destroy');

    // Prestasi Backend
    Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi.index');
    Route::get('/prestasi/create', [PrestasiController::class, 'create'])->name('prestasi.create');
    Route::post('/prestasi', [PrestasiController::class, 'store'])->name('prestasi.store');
    Route::get('/prestasi{id}/edit', [PrestasiController::class, 'edit'])->name('prestasi.edit');
    Route::put('/prestasi/{id}', [PrestasiController::class, 'update'])->name('prestasi.update');
    Route::delete('/prestasi/{id}', [PrestasiController::class, 'destroy'])->name('prestasi.destroy');

    // Karya Backend
    Route::get('/karya', [KaryaController::class, 'index'])->name('karya.index');
    Route::get('/karya/create', [KaryaController::class, 'create'])->name('karya.create');
    Route::post('/karya', [KaryaController::class, 'store'])->name('karya.store');
    Route::get('/karya/{id}/edit', [KaryaController::class, 'edit'])->name('karya.edit');
    Route::put('/karya/{id}', [KaryaController::class, 'update'])->name('karya.update');
    Route::delete('/karya/{id}', [KaryaController::class, 'destroy'])->name('karya.destroy');

    // Kegiatan Backend
    Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
    Route::get('/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
    Route::post('/kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');
    Route::get('/kegiatan/{id}/edit', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
    Route::put('/kegiatan/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
    Route::delete('/kegiatan/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');

    // Berita Backend
    Route::get('/berita', [BackendNewsController::class, 'index'])->name('berita.index');
    Route::get('/berita/create', [BackendNewsController::class, 'create'])->name('berita.create');
    Route::post('/berita', [BackendNewsController::class, 'store'])->name('berita.store');
    Route::get('/berita/{id}/edit', [BackendNewsController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{id}', [BackendNewsController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{id}', [BackendNewsController::class, 'destroy'])->name('berita.destroy');

    // Artikel Backend
    Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
    Route::get('/artikel/create', [ArtikelController::class, 'create'])->name('artikel.create');
    Route::post('/artikel', [ArtikelController::class, 'store'])->name('artikel.store');
    Route::get('/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
    Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
    Route::delete('/artikel/{id}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');

    // Statistik Backend
    Route::get('/statistik', [StatistikController::class, 'index'])->name('statistik.index');
    Route::put('/statistik/{id}', [StatistikController::class, 'update'])->name('statistik.update');

    // Detail Information Backend
    Route::get('/detail-info', [DetailInformationController::class, 'index'])->name('detail-info.index');
    Route::put('/detail-info/{id}', [DetailInformationController::class, 'update'])->name('detail-info.update');

    // ----------------- CLEAR SESSION ROUTE ----------------- //
    Route::post('/clear-session', [SessionController::class, 'clearSession'])->name('clear.session');
});

// Admin / Backend Route
// Dashboard Backend
// Route::get('/dashboard-backend', [BackendDashboardController::class, 'index'])->name('dashboard-backend.index');

// Route::get('/beranda', [BackendBerandaController::class, 'index'])->name('beranda.index');
// Route::put('/beranda/{id}', [BackendBerandaController::class, 'update'])->name('beranda.update');


require __DIR__ . '/auth.php';
