@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<style>
     /* tambah stock */
        .container {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            background-color: #fff;
            width: 500px;
            display: block; 
            position : center;
            margin: 25px auto;
        }
    
        .form-group {
            margin-bottom: 10px;
            text-align: left;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 95%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .stock-control-container {
            display: flex;
            flex-direction: column;
        }
        .stock-control {
            display: flex;
            align-items: center;
            gap: 1px;
            margin-top: 5px;
        }
        .stock-button:active {
            background-color: #d0d0d0;
        }
        input[type="number"] {
            width: 100px;
            text-align: flex;
            border: 1px solid #ddd; 
            border-radius: 5px; 
            height: 30px;
            pointer-events: none;
            padding-left: 15px;
            padding-right: 0px; 
        }
        
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 5px;
            margin-top: 15px;
        }
        .action-button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 12px;
        }
        .footer-logo, .footer-contact, .footer-info {
            flex: 1;
        }
</style>
<!-- <header>
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
    </div> -->
<!---</header> -->

<body>

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

</body>
</html>
@endsection

