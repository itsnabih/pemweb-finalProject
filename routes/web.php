<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;


Route::get('/', [ProdukController::class, 'index'])->name('produk.index');

Route::resource('produk', ProdukController::class);
Route::get('/produk/search', [ProdukController::class, 'search'])->name('produk.search');
Route::get('/statistik', function () {
    return view('produk/statistik');
});