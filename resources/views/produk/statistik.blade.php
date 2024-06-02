@extends('layouts.app') @section('content')
<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous"
/><link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet"
/>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"
></script>
<link rel="stylesheet" href="../contrast-bootstrap-pro/css/bootstrap.min.css" />
<link rel="stylesheet" href="../contrast-bootstrap-pro/css/cdb.css" />
<script src="../contrast-bootstrap-pro/js/bootstrap.min.js"></script>
<script
    src="https://kit.fontawesome.com/9d1d9a82d2.js"
    crossorigin="anonymous"
></script>

<style>
    .chart-container {
        width: 100%;
        margin: auto;
        padding-top: 2px;
    }
    .chart-container2 {
        width: 100%;
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

    .card {
        margin-bottom: 20px;
    }

    .table thead th {
        text-align: center;
    }

    .table tbody td {
        text-align: center;
    }

    .badge {
        font-size: 1em;
    }
    /* Adjust the size of the pie chart canvas */
    .pie-chart-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100; /* Increase the height for a larger pie chart */
    }

    .pie-chart-container canvas {
        max-width: 100% !important;
        max-height: 400% !important;
    }
</style>

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
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Statistik Penjualan</h5>
                        <div class="chart-container">
                            <canvas id="salesChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pendapatan</h5>
                        <div class="pie-chart-container">
                            <canvas id="revenueChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order List</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Customer Name</th>
                                    <th>Location</th>
                                    <th>Amount</th>
                                    <th>Status Order</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>#12594</td>
                                    <td>Dec 1, 2021</td>
                                    <td>Frank Murlo</td>
                                    <td>312 S Wilmette Ave</td>
                                    <td>$847.69</td>
                                    <td>
                                        <span class="badge bg-success"
                                            >New Order</span
                                        >
                                    </td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>#12490</td>
                                    <td>Nov 15, 2021</td>
                                    <td>Thomas Bleir</td>
                                    <td>Lathrop Ave, Harvey</td>
                                    <td>$477.14</td>
                                    <td>
                                        <span class="badge bg-warning"
                                            >On Delivery</span
                                        >
                                    </td>
                                    <td>...</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>#12306</td>
                                    <td>Nov 02, 2021</td>
                                    <td>Bill Norton</td>
                                    <td>5685 Bruce Ave, Portage</td>
                                    <td>$477.14</td>
                                    <td>
                                        <span class="badge bg-warning"
                                            >On Delivery</span
                                        >
                                    </td>
                                    <td>...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", (event) => {
            const salesCtx = document
                .getElementById("salesChart")
                .getContext("2d");
            const salesChart = new Chart(salesCtx, {
                type: "line",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul"],
                    datasets: [
                        {
                            label: "Pembelian Offline",
                            data: [30, 20, 50, 60, 70, 60, 80],
                            borderColor: "blue",
                            backgroundColor: "rgba(0, 0, 255, 0.1)",
                        },
                        {
                            label: "Pembelian Online",
                            data: [20, 30, 40, 50, 60, 50, 70],
                            borderColor: "orange",
                            backgroundColor: "rgba(255, 165, 0, 0.1)",
                        },
                    ],
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                },
            });

            const revenueCtx = document
                .getElementById("revenueChart")
                .getContext("2d");
            const revenueChart = new Chart(revenueCtx, {
                type: "doughnut",
                data: {
                    labels: ["Offline", "Online", "Rata-Rata"],
                    datasets: [
                        {
                            label: "Pendapatan",
                            data: [300, 150, 100],
                            backgroundColor: ["green", "orange", "blue"],
                        },
                    ],
                },
            });
        });
    </script>
</div>

@endsection
