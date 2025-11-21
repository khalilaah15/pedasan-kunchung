<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\HistoriController as AdminHistoryController;
use App\Http\Controllers\Admin\MarketingKitController as AdminMarketingKitController;
use App\Http\Controllers\DashboardController as SellerDashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HistoryController as SellerHistoryController;
use App\Http\Controllers\MarketingKitController as SellerMarketingKitController;
use App\Http\Controllers\InvoiceController;

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
        
        Route::get('/admin-histori', [AdminHistoryController::class, 'index'])->name('admin.histori');
        Route::post('/admin-histori/{id}/status', [AdminHistoryController::class, 'updateStatus'])->name('admin.histori.update-status');

        // Marketing Kit Admin
        Route::get('/admin-marketing', [AdminMarketingKitController::class, 'index'])->name('admin.marketing');
        Route::post('/admin/marketing', [AdminMarketingKitController::class, 'store'])->name('admin.marketing.store');
        Route::get('/admin/marketing/{id}/edit', [AdminMarketingKitController::class, 'edit'])->name('admin.marketing.edit');
        Route::put('/admin/marketing/{id}', [AdminMarketingKitController::class, 'update'])->name('admin.marketing.update');
        Route::delete('/admin/marketing/{id}', [AdminMarketingKitController::class, 'destroy'])->name('admin.marketing.destroy');

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
        Route::get('/cart/checkout/success/{id}', [CartController::class, 'success'])
                ->name('checkout.success');
        // Route::get('/transaksi/success', [TransaksiController::class, 'success'])->name('transaksi.success');
        
        Route::get('/cart/checkout', function () {
            $cart = session('cart', []);
            if (empty($cart)) return redirect()->route('cart.index');
            return view('dashboard.checkout', compact('cart'));
        })->name('cart.checkout.form');

        Route::get('/histori', [SellerHistoryController::class, 'index'])->name('dashboard.histori');

        // Marketing Kit Seller
        Route::get('/dashboard-marketing', [SellerMarketingKitController::class, 'index'])->name('dashboard.marketing');
        Route::post('/marketing/copy', [SellerMarketingKitController::class, 'copyText'])->name('marketing.copy');
    });
    Route::get('/invoice/{id}', [InvoiceController::class, 'download'])->name('invoice.download');
});