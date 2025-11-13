<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

//  HOMEPAGE
Route::get('/', function () {
    return view('home');
})->name('home');

//  AUTH
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


// Protected Routes
Route::middleware(['auth'])->group(function () {

    // Admin Routes
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin-katalog', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::get('/admin-transaksi', function () {
            return view('admin.transaksi');
        })->name('admin.transaksi');

        Route::get('/admin-marketing', function () {
            return view('admin.marketing');
        })->name('admin.marketing');
    });

    // Seller Routes
    Route::middleware(['seller'])->group(function () {
        Route::get('/dashboard-katalog', function () {
            return view('dashboard.index');
        })->name('dashboard');

        Route::get('/dashboard-histori', function () {
            return view('dashboard.history');
        })->name('dashboard.histori');

        Route::get('/dashboard-marketing', function () {
            return view('dashboard.marketing');
        })->name('dashboard.marketing');
    });

});

//  RESELLER
// Route::get('/dashboard-katalog', function () {
//     return view('dashboard.index');
// })->name('dashboard');



// ADMIN
// Route::get('/admin-katalog', function () {
//     return view('admin.dashboard');
// })->name('admin.dashboard');


