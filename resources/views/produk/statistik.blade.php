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
    .chart-container1 {
        width: 100%;
        margin: auto;
        padding-top: 20px;
    }
    .chart-container2 {
        width: 60%;
        margin: auto;
        padding-top: 20px;
    }
    .legend-container {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
    }
    .legend-container span {
        margin: 0 10px;
        display: flex;
        align-items: center;
    }
    .legend-container span::before {
        content: "";
        display: inline-block;
        width: 10px;
        height: 10px;
        margin-right: 5px;
        border-radius: 50%;
    }
    .legend-offline::before {
        background-color: blue;
    }
    .legend-online::before {
        background-color: orange;
    }
    .dropdown-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
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
<!-- <div class="filter-menu">
            <h3>Filter Kategori</h3>
            <form action="{{ route('produk.index') }}" method="GET" class="filter-form">
                <label>
                    <input type="checkbox" name="kategori[]" value="baju">
                    Baju
                </label>
                <label>
                    <input type="checkbox" name="kategori[]" value="celana">
                    Celana
                </label>
                <label>
                    <input type="checkbox" name="kategori[]" value="aksesoris">
                    Aksesoris
                </label>
                <div class="filter-menu-buttons">
                    <button type="submit" class="done-btn">Simpan</button>
                    <button type="reset" class="clear-btn" onclick="resetFilter()">Hapus Filter</button>
                </div>
            </form>
        </div> -->

<!-- Section statistik -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <div
                        class="d-flex justify-content-center align-items-center"
                    >
                        <h3>89,935</h3>
                        <img src="people.png" alt="Icon" class="ml-2" />
                    </div>

                    <p>Total pengunjung</p>
                    <div
                        class="d-flex justify-content-center align-items-center"
                    >
                        <span class="text-success"
                            >&#9650; 10.2 +1.01% minggu ini</span
                        >
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <div
                        class="d-flex justify-content-center align-items-center"
                    >
                        <h3>23,283.5</h3>
                        <img src="produk.png" alt="Icon" class="ml-2" />
                    </div>

                    <p>Total produk</p>
                    <div
                        class="d-flex justify-content-center align-items-center"
                    >
                        <span class="text-success"
                            >&#9650; 3.1 +0.49% minggu ini</span
                        >
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <div
                        class="d-flex justify-content-center align-items-center"
                    >
                        <h3>46,827</h3>
                        <img src="check.png" alt="Icon" class="ml-2" />
                    </div>

                    <p>Total pembeli</p>
                    <div
                        class="d-flex justify-content-center align-items-center"
                    >
                        <span class="text-danger"
                            >&#9660; 2.56 -0.91% minggu ini</span
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- section chart -->
<div>
    <div class="container mt-5">
        <div class="row">
            <h2 class="text-center">Statistik Penjualan</h2>
            <div class="card-container">
                <div class="chart-container1 card">
                    <canvas id="salesChart"></canvas>
                </div>
                <div class="chart-container2 card">
                    <h5 class="text-center mt-3">Pendapatan</h5>
                    <canvas id="incomeChart"></canvas>
                    <div class="legend-container">
                        <span style="color: green">Offline</span>
                        <span style="color: orange">Online</span>
                        <span style="color: blue">Rata-Rata</span>
                    </div>
                </div>
            </div>
            <div class="dropdown-container">
                <select class="custom-select" style="width: 200px">
                    <option selected>Bulanan</option>
                    <option value="1">Mingguan</option>
                    <option value="2">Harian</option>
                </select>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const salesCtx = document.getElementById("salesChart").getContext("2d");
        const salesChart = new Chart(salesCtx, {
            type: "line",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul"],
                datasets: [
                    {
                        label: "Pembelian Offline",
                        backgroundColor: "rgba(0, 123, 255, 0.2)",
                        borderColor: "rgba(0, 123, 255, 1)",
                        data: [20, 30, 40, 50, 60, 70, 80],
                        fill: true,
                    },
                    {
                        label: "Pembelian Online",
                        backgroundColor: "rgba(255, 159, 64, 0.2)",
                        borderColor: "rgba(255, 159, 64, 1)",
                        data: [30, 40, 20, 60, 80, 50, 70],
                        fill: true,
                    },
                ],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                let label = context.dataset.label || "";
                                if (label) {
                                    label += ": ";
                                }
                                label += "$" + context.parsed.y.toFixed(2);
                                return label;
                            },
                        },
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function (value) {
                                return "$" + value;
                            },
                        },
                    },
                },
            },
        });

        const incomeCtx = document
            .getElementById("incomeChart")
            .getContext("2d");
        const incomeChart = new Chart(incomeCtx, {
            type: "doughnut",
            data: {
                labels: ["Offline", "Online", "Rata-Rata"],
                datasets: [
                    {
                        data: [30000, 40000, 20000],
                        backgroundColor: [
                            "rgb(0, 123, 255)",
                            "rgb(255, 159, 64)",
                            "rgb(75, 192, 192)",
                        ],
                        hoverOffset: 4,
                    },
                ],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                    },
                },
            },
        });
    </script>
</div>

@endsection
