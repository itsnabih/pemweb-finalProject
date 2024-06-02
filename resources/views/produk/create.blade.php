@extends('layouts.app') @section('content')
<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous"
/>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"
></script>
<style>
    .search-bar {
        display: flex;
        gap: 10px;
    }

    .filter-menu {
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: 5px;
        padding: 15px;
        margin-top: 10px;
    }

    .card-title {
        margin-bottom: 20px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .alert-danger {
        margin-top: 20px;
    }
</style>

    <!-- searchbar, button search-->
    <div class="search-bar">
        <form action="{{ route('produk.search') }}" method="GET"></form>
        <input type="text" placeholder="Cari Stok" class="search-input" />
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
            <input type="checkbox" value="baju" />
        </label>
        <label>
            Celana
            <input type="checkbox" value="celana" />
        </label>
        <label>
            Aksesoris
            <input type="checkbox" value="aksesoris" />
        </label>
        <button class="clear-btn" onclick="clearFilters()">Clear</button>
        <button class="done-btn" onclick="applyFilters()">Done</button>
    </div>
</header>

<div class="card mb-4">
    <div class="card-body">
        <h1 class="card-title">Tambah Produk Baru</h1>

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
            <div class="mb-3">
                <label for="namaProduk" class="form-label">Nama Produk</label>
                <input type="text" name="namaProduk" id="namaProduk" class="form-control" required />
            </div>
            <div class="mb-3">
                <label for="stokProduk" class="form-label">Stok Produk</label>
                <input type="number" name="stokProduk" id="stokProduk" class="form-control" required />
            </div>
            <div class="mb-3">
                <label for="fotoProduk" class="form-label">Foto Produk</label>
                <input type="file" name="fotoProduk" id="fotoProduk" class="form-control" required />
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select name="kategori" id="kategori" class="form-select" required>
                    <option value="baju">Baju</option>
                    <option value="celana">Celana</option>
                    <option value="aksesoris">Aksesoris</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Produk</button>
        </form>
    </div>
    <script>
        function toggleFilterMenu() {
            var filterMenu = document.getElementById('filterMenu');
            filterMenu.style.display = filterMenu.style.display === 'none' ? 'block' : 'none';
        }
    
        function clearFilters() {
            document.querySelectorAll('.form-check-input').forEach(input => input.checked = false);
        }
    
        function applyFilters() {
            // Add your filter logic here
        }
    </script>
</div>
@endsection