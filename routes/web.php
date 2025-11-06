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

Route::get('/we', function () {
    return view('welcome');
});
Route::resource('/admin/fasilitas', FasilitasController::class)->names([
    'index' => 'fasilitas.index',
    'create' => 'fasilitas.create',
    'store' => 'fasilitas.store',
    'edit' => 'fasilitas.edit',
    'update' => 'fasilitas.update',
    'destroy' => 'fasilitas.destroy',
]);
Route::get('/auth', [AuthController::class, 'index'])->name('auth.index');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');

//Dahboard

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

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
