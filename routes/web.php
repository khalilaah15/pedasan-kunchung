<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/dashboard-katalog', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::get('/dashboard-histori', function () {
    return view('dashboard.history');
})->name('dashboard.histori');

Route::get('/dashboard-marketing', function () {
    return view('dashboard.marketing');
})->name('dashboard.marketing');