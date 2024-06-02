@extends('layouts.app')

@section('content')
        <!-- searchbar, button search-->
        <div class="search-bar">
            <form action="{{ route('produk.search') }}" method="GET"></form>
            <input type="text" placeholder="Cari Stok" class="search-input">
            <button type="button" class="search-button">
                <i class="fas fa-search"></i>
            </button>

        <!-- filter-->
            <button class="filter-button" onclick="toggleFilterMenu()">
                <i class="fas fa-filter"></i>
            </button>
        </div>
        <!-- <div class="filter-menu">
            <h3>Filter Kategori</h3>
            <form action="{{ route('produk.index') }}" method="GET" class="filter-form">
                <label>
                Baju
                    <input type="checkbox" name="kategori[]" value="baju">  
                </label>
                <label>
                Celana
                    <input type="checkbox" name="kategori[]" value="celana">
                </label>
                <label>
                Aksesoris
                    <input type="checkbox" name="kategori[]" value="aksesoris">
                </label>
                
                <div class="filter-menu-buttons">
                    <button type="submit" class="done-btn">Simpan</button>
                    <button type="reset" class="clear-btn" onclick="resetFilter()">Hapus Filter</button>
                </div>
            </form>
        </div> -->

    <!-- <h1>Daftar Produk</h1> -->

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="product-grid">
        @if ($produk->isEmpty())
            <p>Tidak ada produk yang ditemukan.</p>
        @else
            @foreach ($produk as $item)
                <div class="product-card">
                    <img src="{{ Storage::url($item->fotoProduk) }}" alt="{{ $item->namaProduk }}" class="product-image">
                    <h2 class="product-title">{{ $item->namaProduk }}</h2>
                    <div class="stock-status">
                        @if ($item->stokProduk <= 0)
                            Stock Habis
                        @else
                            Stok: <span class="quantity">{{ $item->stokProduk }}</span>
                        @endif
                    </div>
                    <div class="quantity-control">
                        <button class="quantity-btn" onclick="changeQuantity(this, -1)">-</button>
                        <span class="quantity">{{ $item->stokProduk }}</span>
                        <button class="quantity-btn" onclick="changeQuantity(this, 1)">+</button>
                    </div>
                    <div class="product-actions">
                        <form action="{{ route('produk.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn delete-btn">Hapus Produk</button>
                        </form>
                        <form action="{{ route('produk.update', $item->id) }}" method="POST" class="update-form">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="stokProduk" value="{{ $item->stokProduk }}">
                            <button type="submit" class="action-btn save-btn">Simpan</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <div class="add-product">
        <a href="{{ route('produk.create') }}" class="add-product-btn">Tambah Barang</a>
    </div>

    <script>
        // TAMBAH STOCK
        function changeQuantity(button, change) {
            let quantityElement = button.parentNode.querySelector('.quantity');
            let currentQuantity = parseInt(quantityElement.textContent);
            let newQuantity = currentQuantity + change;

            if (newQuantity >= 0) {
                quantityElement.textContent = newQuantity;

                let form = button.closest('.product-card').querySelector('.update-form');
                form.querySelector('input[name="stokProduk"]').value = newQuantity;
            }
        }

        // FILTER

        function toggleFilterMenu() {
            let filterMenu = document.querySelector('.filter-menu');
            filterMenu.style.display = filterMenu.style.display === 'block' ? 'none' : 'block';
        }
        
        function clearFilters() {
            let checkboxes = document.querySelectorAll('.filter-menu input[type="checkbox"]');
            checkboxes.forEach(checkbox => checkbox.checked = false);
        }

        function applyFilters() {
            let checkboxes = document.querySelectorAll('.filter-menu input[type="checkbox"]');
            let filters = [];
            checkboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    filters.push(checkbox.value);
                }
            });
            console.log('Selected filters:', filters);
            toggleFilterMenu();
        }

        document.addEventListener('click', function(event) {
            let filterMenu = document.getElementById('filterMenu');
            let filterButton = document.querySelector('.filter-button');
            if (!filterMenu.contains(event.target) && !filterButton.contains(event.target)) {
                filterMenu.style.display = 'none';
            }
        });

        function resetFilter() {
            document.querySelectorAll('.filter-form input[type="checkbox"]').forEach(checkbox => {
                checkbox.checked = false;
            });
        }

        //SEARCH
        document.addEventListener('DOMContentLoaded', function() {
    let searchButton = document.querySelector('.search-bar .search-button');
    let searchInput = document.querySelector('.search-bar .search-input');

    searchButton.addEventListener('click', function() {
        let searchValue = searchInput.value.trim();
        if (searchValue !== '') {
            window.location.href = "{{ route('produk.index') }}?search=" + encodeURIComponent(searchValue);
        } else {
            alert('Masukkan kata kunci pencarian.');
        }
    });
});


    </script>
    @endsection