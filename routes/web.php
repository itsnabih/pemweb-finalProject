<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('produk', ProdukController::class);
Route::get('/produk/search', [ProdukController::class, 'search'])->name('produk.search');