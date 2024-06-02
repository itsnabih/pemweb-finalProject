<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Card</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   
</head>

<header class="header">
    <div class="logo">
        <img src="logo.png" alt="UB Merch Logo" class="logo-image">
    </div>
    <nav class="nav-links">
        <a href="/produk">Lihat Stok</a>
        <a href="/statistik">Statistik Penjualan</a>
    </nav>

    <!-- searchbar, button search-->
    <div class="search-bar">
        <form action="{{ route('produk.search') }}" method="GET"></form>
        <input type="text" placeholder="Cari Stok" class="search-input">
        <button class="search-button">
            <i class="fas fa-search"></i>
        </button>


    <!-- filter-->
        <button class="filter-button" onclick="toggleFilterMenu()">
            <i class="fas fa-filter"></i>
        </button>
    </div>

    <div class="filter-menu" id="filterMenu">
        <h3>Filter</h3>
        <label>
            Baju
            <input type="checkbox" value="baju">
        </label>
        <label>
            Celana
            <input type="checkbox" value="celana">
        </label>
        <label>
            Aksesoris
            <input type="checkbox" value="aksesoris">
        </label>
        <button class="clear-btn" onclick="clearFilters()">Clear</button>
        <button class="done-btn" onclick="applyFilters()">Done</button>
    </div>
</header>

<body>
@extends('layouts.app')

@section('content')
    <h1>Tambah Produk Baru</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="namaProduk">Nama Produk</label>
            <input type="text" name="namaProduk" id="namaProduk" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="stokProduk">Stok Produk</label>
            <input type="number" name="stokProduk" id="stokProduk" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="fotoProduk">Foto Produk</label>
            <input type="file" name="fotoProduk" id="fotoProduk" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="kategori">Kategori</label>
            <select name="kategori" id="kategori" class="form-control" required>
                <option value="baju">Baju</option>
                <option value="celana">Celana</option>
                <option value="aksesoris">Aksesoris</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Produk</button>
    </form>
@endsection
</body>
</html>