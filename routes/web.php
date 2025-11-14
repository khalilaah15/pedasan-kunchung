<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\DashboardController as SellerDashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;

// HOMEPAGE
Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/dashboard-katalog', [SellerDashboardController::class, 'index'])->name('dashboard');

// AUTH
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Protected Routes
Route::middleware(['auth'])->group(function () {

    // Admin Routes
    Route::middleware(['admin'])->group(function () {
        Route::get('/admin-katalog', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        
        Route::get('/admin-transaksi', function () {
            return view('admin.transaksi');
        })->name('admin.transaksi');

        Route::get('/admin-marketing', function () {
            return view('admin.marketing');
        })->name('admin.marketing');

        // Katalog CRUD
        Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');
        Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
        Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
        Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    });

    // Seller Routes
    Route::middleware(['seller'])->group(function () {
        Route::get('/dashboard-katalog', [SellerDashboardController::class, 'index'])->name('dashboard');

        Route::prefix('cart')->name('cart.')->group(function () {
            Route::post('/add', [CartController::class, 'addToCart'])->name('add');
            Route::get('/', [CartController::class, 'index'])->name('index');
            Route::delete('/{id}', [CartController::class, 'remove'])->name('remove');
            Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
            Route::get('/checkout/success/{id}', [CartController::class, 'success'])->name('success');
        });
        // Route::get('/transaksi/success', [TransaksiController::class, 'success'])->name('transaksi.success');
        
        Route::get('/cart/checkout', function () {
            $cart = session('cart', []);
            if (empty($cart)) return redirect()->route('cart.index');
            return view('dashboard.checkout', compact('cart'));
        })->name('cart.checkout.form');

        Route::get('/dashboard-histori', function () {
            return view('dashboard.history');
        })->name('dashboard.histori');

        Route::get('/dashboard-marketing', function () {
            return view('dashboard.marketing');
        })->name('dashboard.marketing');
    });
});