<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\PeminjamanFasilitasController;
use App\Http\Controllers\Admin\SyaratFasilitasController;
use App\Http\Controllers\Admin\PetugasFasilitasController;
use App\Http\Controllers\Admin\PembayaranFasilitasController;



Route::resource('warga', WargaController::class);

Route::get('/', function () {
    return view('pages/auth/login-form');
});

// Halaman login
Route::get('/auth', [AuthController::class, 'index'])->name('auth.index');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

// Halaman register
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');


//Dahboard

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

Route::resource('fasilitas', FasilitasController::class);
Route::resource('/warga', WargaController::class);
Route::resource('warga', WargaController::class);
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('peminjaman', PeminjamanFasilitasController::class);
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('pembayaran', PembayaranFasilitasController::class);
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('syarat', SyaratFasilitasController::class);
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('petugas', PetugasFasilitasController::class);
});
Route::resource('petugas', PetugasController::class);
