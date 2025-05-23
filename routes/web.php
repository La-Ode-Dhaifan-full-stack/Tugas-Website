<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;


// Route untuk halaman utama
Route::get('/', function () {
    return view('home');
});


// Dashboard untuk admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth')->name('admin.dashboard');

// Dashboard untuk klien
Route::get('/klien/dashboard', function () {
    return view('klien.dashboard');
})->middleware('auth')->name('klien.dashboard');



// Resource controller
Route::resource('/kendaraan', KendaraanController::class);

// Login & Register
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware('auth')->group(function () {

    // Dashboard umum, bisa dihapus jika tidak digunakan
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Dashboard berdasarkan role
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/klien/dashboard', function () {
        return view('klien.dashboard');
    })->name('klien.dashboard');

    // Resource Kendaraan hanya untuk admin (jika diinginkan)
    Route::resource('/kendaraan', KendaraanController::class);
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'admin'])->name('admin.dashboard');
