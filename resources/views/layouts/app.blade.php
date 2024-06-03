<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #ffffff;
            margin: 0;
        }

        .header {
            width: 100%;
            max-width: 960px;
            margin: 20px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 244px;
            height: 50px;
            margin: 40px;
        }

        .logo-image {
            width: 244px;
            height: 50px;
        }

        .nav-links {
            display: flex;
            gap: 80px;
            justify-content: center;
            margin-top: 10px; /* Atur margin atas */
            width: 100%;
            margin-top: 10px;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-size: 16px;
            font-weight: bold; /* Membuat teks tebal */
            margin-top: 10px;
        }

        .search-bar {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 20px;
            width: 960px;
        }

        .search-input {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .search-button,
        .filter-button {
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            background-color: #000;
            border-radius: 5px;
            color: #fff;
        }

        .search-button i,
        .filter-button i {
            font-size: 16px;
            color: #fff;
        }

        .filter-menu {
            display: none;
            position: absolute;
            top: 190px;
            right: 278px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .filter-menu h3 {
            margin-top: 0;
        }

        .filter-menu label {
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
            margin-bottom: 10px;
            padding-right: 10px; 
        }

        .filter-menu button {
            margin-top: 10px;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .filter-menu .clear-btn {
            background-color: #f0f0f0;
            margin-right: 10px;
        }

        .filter-menu .done-btn {
            background-color: #000;
            color: #fff;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            width: 100%;
            max-width: 960px;
            margin: 20px auto;
        }

        .product-image {
            width: 100%;
            border-bottom: 1px solid #eee;
            padding-bottom: 20px;
            margin-bottom: 20px;
            object-fit: cover;
            height: 200px;
        }

        .product-title {
            font-size: 18px;
            margin: 0 0 10px;
        }

        .stock-status {
            color: red;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .quantity-control {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .quantity-btn {
            background-color: #f0f0f0;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
        }

        .quantity {
            margin: 0 10px;
            font-size: 16px;
        }

        .product-actions {
            display: flex;
            justify-content: space-between;
        }

        .action-btn {
            flex: 1;
            padding: 10px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            margin: 0 5px;
            border-radius: 5px;
        }

        .delete-btn {
            background-color: red;
            color: white;
        }

        .save-btn {
            background-color: green;
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .product-grid {
                grid-template-columns: 1fr;
            }

            .nav-links {
                flex-direction: column;
                gap: 10px;
                align-items: center;
            }

            .search-bar {
                flex-direction: column;
                gap: 10px;
            }

            .search-input {
                width: 100%;
            }
        }

        .add-product-container {
            display: flex;
            position: absolute;
            right: 0;
        }

        .add-product-btn {
            width: 130px;
            height: 40px;
            background-color: white;
            border: 1px solid black;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
            justify-content: center;
            align-items: center;
            text-decoration: none;
        }

        .footer {
            margin-top: 30px;
            width: 960px;
            background-color: #ffffff;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-top: 1px solid #eaeaea;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            width: 100%;
            max-width: 1200px;
        }

        .footer-logo, .footer-contact, .footer-info {
            flex: 1;
        }

        .footer-logo {
            text-align: left;
        }

        .footer-logo img {
            width: 70%;
        }

        .footer-tagline {
            margin-top: 10px;
            font-size: 14px;
            color: #333;
        }

        .footer-contact, .footer-info {
            padding: 0px 20px;
        }

        .footer-contact h3, .footer-info h3 {
            margin-bottom: 10px;
            font-size: 16px;
            color: #000;
        }

        .footer-contact p, .footer-info ul {
            margin: 0;
            font-size: 14px;
            color: #333;
        }

        .footer-contact p, .footer-info ul {
            list-style: none;
            padding: 0;
        }

        .footer-contact p, .footer-info ul li {
            margin-bottom: 10px;
        }

        .footer-contact p, .footer-info ul li a {
            color: #333;
            text-decoration: none;
        }

        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            max-width: 1200px;
            margin-top: 20px;
        }

        .footer-bottom p {
            margin: 0;
            font-size: 14px;
            color: #333;
        }

        .social-media {
            display: flex;
        }

        .social-media a {
            margin-left: 10px;
            color: #333;
            font-size: 18px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">
                <img
                    src="{{ asset('logo.png') }}"
                    alt="UB Merch Logo"
                    class="logo-image"
                />
            </div>
        <nav class="nav-links">
            <a href="/produk">Lihat Stok</a>
            <a href="/statistik">Statistik Penjualan</a>
            <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
        </nav>
    </div>
    <div class="container">
        @yield('content')
    </div>
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-logo">
                <img
                    src="{{ asset('logo.png') }}"
                    alt="UB Merch Logo"
                    class="logo-image"
                />
            </div>
            <div class="footer-contact">
                <h3>Contact</h3>
                <p><i class="fas fa-map-marker-alt"></i> UB Merch & Creative<br>
                    (Sebelah KPRI UB) Universitas Brawijaya<br>
                    Jl MT Haryono No 169 Malang</p>
                <p><i class="fas fa-phone"></i> +62 8212 666 7575</p>
                <p><i class="fas fa-envelope"></i> hello@ubmerch.id<br>
                    marketing@ubmerch.id<br>
                    ubmerch@ub.ac.id</p>
            </div>
            <div class="footer-info">
                <h3>Information</h3>
                <ul>
                    <li><a href="#">How to Order</a></li>
                    <li><a href="#">Size Chart</a></li>
                    <li><a href="#">F.A.Q</a></li>
                    <li><a href="#">Terms and Conditions</a></li>
                    <li><a href="#">Portfolio</a></li>
                    <li><a href="#">Digital Flipbook</a></li>
                    <li><a href="#">Tokopedia</a></li>
                    <li><a href="#">Shopee</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2024 UB Merch & Creative. All Rights Reserved.</p>
            <div class="social-media">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
                <a href="#"><i class="far fa-envelope"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>