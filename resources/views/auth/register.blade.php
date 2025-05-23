@extends('layouts.app')

@section('content')
<h2>Registrasi Akun Anda</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form method="POST" action="{{ route('register') }}">
    @csrf
    <input type="text" name="name" class="form-control" placeholder="Nama" value="{{ old('name') }}" required>
    <br>
    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
    <br>
    <input type="password" name="password" class="form-control" placeholder="Password" required>
    <br>
    <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
    <br>
    <input type="hidden" name="role" value="klien"> <!-- Sesuaikan dengan 'klien' -->
    <button type="submit" class="btn btn-primary">Daftarkan Akun</button>
</form>
@endsection