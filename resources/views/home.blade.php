@extends('layouts.app')  <!-- Menggunakan layout utama -->

@section('content')
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
                <img src="https://img.icons8.com/ios-filled/100/motorcycle.png" alt="car">
                <h5 class="mt-3">Berbagai Jenis Kendaraan Bermotor</h5>
                <p>Dari motor sport hingga matic, semua tersedia di sini.</p>
            </div>
            <div class="col-md-4">
                <img src="https://img.icons8.com/ios-filled/100/settings.png" alt="setting">
                <h5 class="mt-3">Pengelolaan Mudah</h5>
                <p>CRUD data kendaraan hanya dalam beberapa klik.</p>
            </div>
            <div class="col-md-4">
                <img src="https://img.icons8.com/ios-filled/100/shield.png" alt="secure">
                <h5 class="mt-3">Aman dan Terpercaya</h5>
                <p>Sistem login aman dan validasi data terjamin.</p>
            </div>
        </div>
    </div>
@endsection
