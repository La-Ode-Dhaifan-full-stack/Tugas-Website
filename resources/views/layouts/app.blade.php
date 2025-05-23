<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dealer Motor Yamaha</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f6f8fc, #e2ecf9);
            min-height: 100vh;
        }

        .navbar {
            background: linear-gradient(to right, #2c3e50, #3498db);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: #fff !important;
        }

        .nav-link {
            color: #f1f1f1 !important;
        }

        .nav-link:hover {
            color: #ffd700 !important;
        }

        .card-custom {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        footer {
            background: linear-gradient(to right, #2c3e50, #3498db);
            color: white;
            padding: 15px 0;
        }

        .btn-custom {
            background: #3498db;
            color: white;
            border-radius: 25px;
        }

        .btn-custom:hover {
            background: #2980b9;
            color: white;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark shadow">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <i class="bi bi-speedometer2 me-1"></i> Dealer Motor
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                @auth
                    @if(Auth::user()->isAdmin())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('kendaraan.index') }}">
                                <i class="bi bi-tools me-1"></i> Kelola Kendaraan
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('kendaraan.index') }}">
                                <i class="bi bi-eye me-1"></i> Lihat Kendaraan
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <i class="bi bi-house-door me-1"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="GET" class="d-inline">
                            <button class="btn btn-sm btn-danger ms-2">Logout</button>
                        </form>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            <i class="bi bi-person-plus me-1"></i> Register
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<!-- MAIN CONTENT -->
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-6 col-lg-5">
        <div class="card card-custom p-4">
            @yield('content')
        </div>
    </div>
</div>


<!-- FOOTER -->
<footer class="text-center mt-5">
    <div class="container">
        <small>© {{ date('Y') }} <b>Dealer Motor Yamaha</b> | Dibuat oleh Dhefan 🚀</small>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
