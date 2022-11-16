<?php

use App\Http\Controllers\backend\v1\DashboardController;
use App\Http\Controllers\backend\v1\ProgramController;
use App\Http\Controllers\backend\v1\KegiatanController;
use App\Http\Controllers\backend\v1\RealisasiController;
use App\Http\Controllers\backend\v1\UserController;
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
    Route::resource('user', UserController::class);
});
