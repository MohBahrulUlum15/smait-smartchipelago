<?php

use App\Http\Controllers\Admin\BasePageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Backend\DashboardController as BackendDashboardController;
use App\Http\Controllers\Backend\MottoTujuanController;
use App\Http\Controllers\Backend\NewsController as BackendNewsController;
use App\Http\Controllers\Backend\PengajarController;
use App\Http\Controllers\Backend\ProgramController;
use App\Http\Controllers\Backend\SambutanController;
use App\Http\Controllers\Backend\SessionController;
use App\Http\Controllers\Backend\VisiMisiController;
use App\Http\Controllers\Global\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Landing Page Route
Route::get('/', [HomeController::class, 'index'])->name('home');


// Admin / Backend Route
// Dashboard Backend
Route::get('/dashboard-backend', [BackendDashboardController::class, 'index'])->name('dashboard-backend.index');

// ----------------- VISI MISI ROUTE ----------------- //
Route::get('/visi-misi', [VisiMisiController::class, 'index'])->name('visi-misi.index');
// for VISI
Route::put('/visi-misi/visi-update/{id}', [VisiMisiController::class, 'updateVisi'])->name('visi.update');
//  for MISI
Route::post('visi-misi/misi', [VisiMisiController::class, 'storeMisi'])->name('misi.store');
Route::put('visi-misi/misi/{id}', [VisiMisiController::class, 'updateMisi'])->name('misi.update');
Route::delete('visi-misi/misi/{id}', [VisiMisiController::class, 'destroyMisi'])->name('misi.destroy');

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
Route::get('/pengajar/{id}', [PengajarController::class, 'edit'])->name('pengajar.edit');
Route::put('/pengajar/{id}', [PengajarController::class, 'update'])->name('pengajar.update');
Route::delete('/pengajar/{id}', [PengajarController::class, 'destroy'])->name('pengajar.destroy');

// Program Backend
Route::get('/program', [ProgramController::class, 'index'])->name('program.index');
Route::get('/program/create', [ProgramController::class, 'create'])->name('program.create');
Route::post('/program', [ProgramController::class, 'store'])->name('program.store');
Route::get('/program/{id}', [ProgramController::class, 'edit'])->name('program.edit');
Route::put('/program/{id}', [ProgramController::class, 'update'])->name('program.update');
Route::delete('/program/{id}', [ProgramController::class, 'destroy'])->name('program.destroy');

// News Backend
Route::get('/news-backend', [BackendNewsController::class, 'index'])->name('news-backend.index');
Route::get('/news-backend/create', [BackendNewsController::class, 'create'])->name('news-backend.create');
Route::post('/news-backend', [BackendNewsController::class, 'store'])->name('news-backend.store');
Route::get('/news-backend/{id}/edit', [BackendNewsController::class, 'edit'])->name('news-backend.edit');
Route::put('/news-backend/{id}', [BackendNewsController::class, 'update'])->name('news-backend.update');
Route::delete('/news-backend/{id}', [BackendNewsController::class, 'destroy'])->name('news-backend.destroy');


// ----------------- CLEAR SESSION ROUTE ----------------- //
Route::post('/clear-session', [SessionController::class, 'clearSession'])->name('clear.session');
