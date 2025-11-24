<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\Admin\SyaratFasilitasController;
use App\Http\Controllers\Admin\PetugasFasilitasController;
use App\Http\Controllers\Admin\PembayaranFasilitasController;
use App\Http\Controllers\PeminjamanController;


// Default page (login)
Route::get('/', function () {
    return view('pages/auth/login-form');
});

// Login
Route::get('/auth', [AuthController::class, 'index'])->name('auth.index');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

// Register
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// =====================
// Resource utama
// =====================
Route::resource('warga', WargaController::class);
Route::resource('petugas', PetugasController::class);
Route::resource('fasilitas', FasilitasController::class);
Route::resource('peminjaman', PeminjamanController::class);


// =====================
// Resource dari folder Admin TANPA PREFIX
// =====================
Route::resource('syarat', SyaratFasilitasController::class);
Route::resource('pembayaran', PembayaranFasilitasController::class);
Route::resource('petugas-fasilitas', PetugasFasilitasController::class);
Route::resource('peminjaman-fasilitas', PeminjamanFasilitasController::class);

