<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserRegisterController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\PemesananController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\KendaraanController;
use App\Http\Controllers\User\KendaraanController as UserKendaraanController;
use Illuminate\Support\Facades\Auth;

// Halaman utama
Route::get('/', function () {
    return view('home');
});


// Auth

// Halaman login & register hanya untuk user yang belum login
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::get('register', [UserRegisterController::class, 'create'])->name('register');
    Route::post('register', [UserRegisterController::class, 'store']);
});


Route::post('logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Dashboard User
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/user/kendaraan/{id}', [PemesananController::class, 'show'])->name('user.motor.show');
    Route::post('/user/kendaraan/{id}/pesan', [PemesananController::class, 'pesan'])->name('user.kendaraan.pesan');


});

// Dashboard Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    // CRUD kendaraan untuk user/admin umum (ganti sesuai role-mu)
    Route::resource('admin/kendaraan', KendaraanController::class);
});


// Route untuk detail motor
Route::middleware(['auth'])->group(function () {
    Route::get('/user/motor/{id}', [PemesananController::class, 'show'])->name('user.motor.show');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');  // Dashboard admin
    
    // Route CRUD untuk motor
    Route::resource('admin/kendaraan', KendaraanController::class);  // Menangani daftar, tambah, edit, dan hapus motor
});
