<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\FeedbackController;
use App\Http\Controllers\Dashboard\IqController;
use App\Http\Controllers\Dashboard\PerkembanganController;
use App\Http\Controllers\Dashboard\RekomendasiController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Siswa\DashboardController as SiswaDashboardController;
use App\Http\Controllers\Siswa\IqtestController;
use App\Http\Controllers\Siswa\PerkembanganController as SiswaPerkembanganController;
use App\Http\Controllers\Siswa\RekomendasiController as SiswaRekomendasiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    //dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //siswa
    Route::get('/dashboard/siswa', [UserController::class, 'siswa'])->name('siswa');
    Route::get('/dashboard/siswa/{id}', [UserController::class, 'siswaDelete'])->name('siswa.delete');
    Route::post('/dashboard/siswa/create', [UserController::class, 'siswaCreate'])->name('siswa.create');
    Route::post('/dashboard/siswa/update/{id}', [UserController::class, 'siswaUpdate'])->name('siswa.update');
    //guru
    Route::get('/dashboard/guru', [UserController::class, 'guru'])->name('guru');
    Route::get('/dashboard/guru/{id}', [UserController::class, 'guruDelete'])->name('guru.delete');
    Route::post('/dashboard/guru/create', [UserController::class, 'guruCreate'])->name('guru.create');
    Route::post('/dashboard/guru/update/{id}', [UserController::class, 'guruUpdate'])->name('guru.update');
    //perkembangan
    Route::get('/dashboard/perkembangan', [PerkembanganController::class, 'index'])->name('perkembangan');
    Route::get('/dashboard/perkembangan/{id}', [PerkembanganController::class, 'delete'])->name('perkembangan.delete');
    Route::post('/dashboard/perkembangan/create', [PerkembanganController::class, 'create'])->name('perkembangan.create');
    Route::get('/dashboard/perkembangan/detail/{id}', [PerkembanganController::class, 'detail'])->name('perkembangan.detail');
    Route::post('/dashboard/perkembangan/update/{id}', [PerkembanganController::class, 'update'])->name('perkembangan.update');
    //test-iq
    Route::get('/dashboard/test-iq', [IqController::class, 'index'])->name('testiq');
    Route::get('/dashboard/test-iq/{id}', [IqController::class, 'delete'])->name('testiq.delete');
    Route::post('/dashboard/test-iq/create', [IqController::class, 'create'])->name('testiq.create');
    Route::post('/dashboard/test-iq/update/{id}', [IqController::class, 'update'])->name('testiq.update');
    //rekomendasi
    Route::get('/dashboard/rekomendasi', [RekomendasiController::class, 'index'])->name('rekomendasi');
    Route::get('/dashboard/rekomendasi/{id}', [RekomendasiController::class, 'delete'])->name('rekomendasi.delete');
    Route::post('/dashboard/rekomendasi/create/{id}', [RekomendasiController::class, 'create'])->name('rekomendasi.create');
    Route::post('/dashboard/rekomendasi/update/{id}', [RekomendasiController::class, 'update'])->name('rekomendasi.update');
    Route::get('/dashboard/rekomendasi/detail/{id}', [RekomendasiController::class, 'detail'])->name('rekomendasi.detail');
    //rekomendasi-feedback
    Route::get('/dashboard/rekomendasi-feedback', [FeedbackController::class, 'index'])->name('feedback');
    //laporan
    Route::get('/dashboard/laporan', [LaporanController::class, 'index'])->name('laporan');
    Route::GET('/dashboard/laporan/create', [LaporanController::class, 'create'])->name('laporan.create');
    Route::get('/dashboard/laporan-iq', [LaporanController::class, 'indexIQ'])->name('laporanIq');
    Route::GET('/dashboard/laporan-iq/create', [LaporanController::class, 'createIQ'])->name('laporanIq.create');
});
Route::middleware('auth')->group(function () {
    //dashboard
    Route::get('/home', [SiswaDashboardController::class, 'index'])->name('siswa.dashboard');
    Route::get('/home/iq-test', [IqtestController::class, 'index'])->name('siswa.iqtest');
    Route::get('/home/perkembangan/{id}', [SiswaPerkembanganController::class, 'index'])->name('siswa.perkembangan');
    Route::post('/home/perkembangan/send-feedback/{id}', [SiswaPerkembanganController::class, 'feedback'])->name('siswa.perkembanganFeedback');
    Route::get('/home/rekomendasi', [SiswaRekomendasiController::class, 'index'])->name('siswa.rekomendasi');
    Route::post('/home/upload-image/{id}', [SiswaDashboardController::class, 'uploadImage'])->name('siswa.uploadImage');
});

require __DIR__ . '/auth.php';
