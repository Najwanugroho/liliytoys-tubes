<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\InventarisAdminController;
use App\Http\Controllers\RegisterKaryawanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\PengeluaranController;

Route::get('/laporan-keuangan-harian', [LaporanController::class, 'index']);


Route::get('/register-karyawan', [RegisterKaryawanController::class, 'showForm'])->name('register.karyawan');
Route::post('/register-karyawan', [RegisterKaryawanController::class, 'store'])->name('register-karyawan');

Route::get('auth/admin-login', [AdminLoginController::class, 'showLoginForm'])->name('auth.admin-login');
Route::post('auth/admin-login', [AdminLoginController::class, 'login']);


Route::post('/logout', function () {
    Auth::logout();
    return redirect('/landing');
})->name('logout');


Route::get('/catatan', [CatatanController::class, 'index'])->name('catatan.index');
Route::post('/catatan/tambah', [CatatanController::class, 'tambah'])->name('catatan.tambah');
Route::post('/catatan/update', [CatatanController::class, 'update'])->name('catatan.update');
Route::post('/catatan/update-status', [CatatanController::class, 'updateStatus'])->name('catatan.updateStatus');
Route::post('/catatan/update-checkbox', [CatatanController::class, 'updateCheckbox'])->name('catatan.updateCheckbox');

Route::post('/karyawan/pengeluaran', [PengeluaranController::class, 'store'])->name('karyawan.addPengeluaran');

Route::get('/karyawan-home', [KaryawanController::class, 'index'])->name('karyawan.home');
Route::match(['get', 'post'], '/karyawan-home', [KaryawanController::class, 'index']);

Route::get('auth/karyawan-login', [KaryawanController::class, 'showLoginForm'])->name('karyawan.login');

Route::post('auth/karyawan-login', [KaryawanController::class, 'login'])->name('karyawan.login.post');


Route::get('/admin-home', [AdminController::class, 'index'])->name('admin.home');
Route::match(['get', 'post'], '/admin-home', [AdminController::class, 'index']);

Route::get('auth/admin-login', function () {
    return view('auth.admin-login');
});

Route::get('inventaris-admin', [InventarisAdminController::class, 'index']);
Route::post('/inventaris-admin/tambah', [InventarisAdminController::class, 'tambah'])->name('inventaris.tambah');
Route::post('/inventaris/update', [InventarisController::class, 'update'])->name('inventaris.update');


Route::get('/keuangan-admin', [KeuanganController::class, 'index']);

Route::get('/landing', function () {
    return view('landing');
})->name('landing');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
