<!DOCTYPE html>
<html>
<head>
    <title>Dealer Kendaraan Bermotor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #e3f2fd, #fff);
            font-family: 'Segoe UI', sans-serif;
        }
        .hero {
            padding: 100px 0;
        }
        .btn-custom {
            min-width: 140px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">🚗 Dealer Motor</a>
            <div class="d-flex">
                @auth
                    <span class="navbar-text me-3">Hi, {{ Auth::user()->name }}</span>
                    <a href="{{ route('logout') }}" class="btn btn-outline-danger btn-sm">Logout</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container hero text-center">
        <h1 class="display-5 fw-bold mb-3">Selamat Datang di Dealer Kendaraan Bermotor</h1>
        <p class="lead mb-4">Temukan dan kelola kendaraan impianmu dengan mudah dan cepat!</p>

        @auth
            <a href="{{ route('kendaraan.index') }}" class="btn btn-primary btn-lg btn-custom">Kelola Kendaraan</a>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg btn-custom me-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-success btn-lg btn-custom">Register</a>
        @endauth
    </div>

    <div class="container py-5">
        <div class="row text-center">
            <div class="col-md-4">
                <img src="https://img.icons8.com/ios-filled/100/car.png" alt="car">
                <h5 class="mt-3">Berbagai Jenis Kendaraan</h5>
                <p>Dari motor sport hingga matic, semua tersedia di sini.</p>
            </div>
            <div class="col-md-4">
                <img src="https://img.icons8.com/ios-filled/100/settings.png" alt="setting">
                <h5 class="mt-3">Pengelolaan Mudah</h5>
                <p>CRUD data kendaraan hanya dalam beberapa klik.</p>
            </div>
            <div class="col-md-4">
                <img src="https://img.icons8.com/ios-filled/100/secure.png" alt="secure">
                <h5 class="mt-3">Aman dan Terpercaya</h5>
                <p>Sistem login aman dan validasi data terjamin.</p>
            </div>
        </div>
    </div>

    <footer class="bg-white text-center py-4 mt-5 border-top">
        <small>&copy; {{ date('Y') }} Dealer Kendaraan Bermotor. All rights reserved.</small>
    </footer>
</body>
</html>
