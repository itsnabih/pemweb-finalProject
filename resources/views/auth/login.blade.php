<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }
        .btn-google {
            background-color: #dd4b39;
            color: #fff;
            border-color: #dd4b39;
        }
        .btn-google:hover {
            background-color: #c23321;
            border-color: #c23321;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Admin Login</h4>
                    </div>
                    <div class="card-body text-center">
                        <p>Login using your Office Google account:</p>
                        <a href="{{ url('auth/google') }}" class="btn btn-lg btn-block btn-google">
                            <i class="fab fa-google mr-2"></i> Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FONT -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>

