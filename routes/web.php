<?php

use App\Http\Controllers\backend\v1\DashboardController;
use App\Http\Controllers\backend\v1\ProgramController;
use App\Http\Controllers\backend\v1\KegiatanController;
use App\Http\Controllers\backend\v1\RealisasiController;
use App\Http\Controllers\backend\v1\UserController;
use App\Http\Controllers\backend\v1\ListController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('logout', [DashboardController::class,'logout'])->name('logout');
    Route::get('/', [DashboardController::class, 'index'])->name('beranda');
    Route::resource('program', ProgramController::class);
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('realisasi', RealisasiController::class);
    Route::get('realisasi-kegiatan', [RealisasiController::class, 'pilihKegiatan'])->name('realisasi.realisasi-kegiatan');
    Route::resource('user', UserController::class);
    Route::get("report-program", [ProgramController::class, 'cetakProgram'])->name('report-program');
    Route::get("report-kegiatan", [KegiatanController::class, 'cetakKegiatan'])->name('report-kegiatan');
    Route::get("report-realisasi", [RealisasiController::class, 'cetakRealisasi'])->name('report-realisasi');
    Route::get("report", [RealisasiController::class, 'cetakRealisasiAdmin'])->name('report');
    Route::get("report-user", [UserController::class, 'cetakUser'])->name('report-user');
    Route::get("report-triwulanI", [RealisasiController::class, 'cetakTriwulanI'])->name('report-triwulanI');
    Route::get("report-triwulanII", [RealisasiController::class, 'cetakTriwulanII'])->name('report-triwulanII');
    Route::get("report-triwulanIII", [RealisasiController::class, 'cetakTriwulanIII'])->name('report-triwulanIII');
    Route::get("report-triwulanIV", [RealisasiController::class, 'cetakTriwulanIV'])->name('report-triwulanIV');
});
