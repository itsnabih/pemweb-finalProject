<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
            margin: 0 auto;
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
            margin-bottom: 10px;
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

        .pagination-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 50px; /* Menengahkan kontainer secara vertikal */
            max-width: 100%;
        }

        .pagination {
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .pagination-btn {
            background-color: white;
            border: 1px solid black;
            padding: 10px 15px;
            margin: 0 5px;
            cursor: pointer;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pagination-btn.active {
            background-color: black;
            color: white;
        }

        .add-stock-container {
            margin-left: auto; /* Memposisikan kontainer tombol add-stock ke paling kanan */
        }

        .add-stock-btn {
            width: 300px;
            height: 40px;
            background-color: white;
            border: 1px solid black;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
            margin-left: 10px;
        }

        .add-stock-btn:hover {
            background-color: #f0f0f0;
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
            width: 150px;
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
            <img src="logo.png" alt="UB Merch Logo" class="logo-image">
        </div>
        <nav class="nav-links">
            <a href="/produk">Lihat Stok</a>
            <a href="/statistik">Statistik Penjualan</a>
        </nav>
    </div>
    <div class="container">
        @yield('content')
    </div>
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-logo">
                <img src="logo.png" alt="UB Merch Logo" class="footer-logo-image">
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