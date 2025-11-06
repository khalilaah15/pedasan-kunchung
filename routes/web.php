<?php

use Illuminate\Support\Facades\Route;

//  HOMEPAGE
Route::get('/', function () {
    return view('home');
})->name('home');

//  AUTH
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

//  RESELLER
Route::get('/dashboard-katalog', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::get('/dashboard-histori', function () {
    return view('dashboard.history');
})->name('dashboard.histori');

Route::get('/dashboard-marketing', function () {
    return view('dashboard.marketing');
})->name('dashboard.marketing');

// ADMIN
Route::get('/admin-katalog', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin-transaksi', function () {
    return view('admin.transaksi');
})->name('admin.transaksi');

Route::get('/admin-marketing', function () {
    return view('admin.marketing');
})->name('admin.marketing');
