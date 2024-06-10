<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\Auth\GoogleController;

Route::get('login', function () {
    return view('auth.login');
})->name('login');

Route::get('logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/', [ProdukController::class, 'index'])->name('produk.index')->middleware('auth');

Route::resource('produk', ProdukController::class);
Route::get('/produk/search', [ProdukController::class, 'search'])->name('produk.search');
Route::get('/statistik', function () {
    return view('produk/statistik');
});
