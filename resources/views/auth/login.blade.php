<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('content')
<h2>Login</h2>

@if(Auth::check())
    <h2>Selamat datang, {{ Auth::user()->name }}</h2>
    <p>Role: {{ Auth::user()->role }}</p>

    @if(Auth::user()->isAdmin())
        <a href="{{ route('kendaraan.index') }}">Kelola Kendaraan</a>
    @else
        <a href="{{ route('kendaraan.index') }}">Lihat Daftar Kendaraan</a>
    @endif

    <br><a href="{{ route('logout') }}">Logout</a>
@else
    <h2>Selamat datang di Dealer Motor!</h2>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="email" name="email" class="form-control" placeholder="Email"><br>
    <input type="password" name="password" class="form-control" placeholder="Password"><br>
    <button type="submit" class="btn btn-primary">Masuk</button>
</form>
@endsection
