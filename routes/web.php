<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\Auth\KaryawanLoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\InventarisAdminController;
use App\Http\Controllers\RegisterKaryawanController;

Route::get('/register-karyawan', [RegisterKaryawanController::class, 'showForm'])->name('register.karyawan');
Route::post('/register-karyawan', [RegisterKaryawanController::class, 'store'])->name('register.karyawan.store');


Route::get('inventaris-admin', [InventarisAdminController::class, 'index']);


Route::get('/keuangan-admin', [KeuanganController::class, 'index']);

Route::get('/admin-home', [AdminController::class, 'index'])->name('admin.home');
Route::match(['get', 'post'], '/admin-home', [AdminController::class, 'index']);

Route::match(['get', 'post'], '/karyawan-home', [KaryawanController::class, 'index']);

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('auth/admin-login', function () {
    return view('auth.admin-login');
});

Route::get('auth/karyawan-login', function () {
    return view('auth.karyawan-login');
});

Route::post('auth/karyawan-login', [KaryawanLoginController::class, 'login'])->name('karyawan.login');

require __DIR__.'/auth.php';
