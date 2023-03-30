<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\JawabanrespondenController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\PertanyaanController;
use App\Http\Controllers\Admin\PilihanjawabanController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/* Route User */
Route::get('/', [UserController::class, 'profileView']);
Route::post('/profile', [UserController::class, 'profile']);
Route::get('/layanan', [UserController::class, 'layananView']);
Route::post('/layanan', [UserController::class, 'layanan']);
Route::get('/pertanyaan', [UserController::class, 'pertanyaan']);
Route::post('/simpan', [UserController::class, 'jawaban']);

/* Route Admin */
Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth', 'SuperadminAdmin');

Route::prefix('/survey')->middleware('auth')->group(function () {
    Route::resource('/layanan', LayananController::class)->middleware('admin');
    Route::resource('/pertanyaan', PertanyaanController::class)->middleware('admin');
    Route::resource('/responden', JawabanrespondenController::class)->middleware('SuperadminAdmin');
    Route::resource('/pilihan', PilihanjawabanController::class)->middleware('admin');
});