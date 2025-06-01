@extends('layouts.user')

@section('content')
    <h2>{{ $motor->nama }}</h2>
    <p>Transmisi: {{ ucfirst($motor->transmisi) }}</p>
    <p>Tahun Produksi: {{ \Carbon\Carbon::parse($motor->tahun_produksi)->format('Y') }}</p>
    <p>Harga: Rp{{ number_format($motor->harga, 0, ',', '.') }}</p>

    <form action="{{ route('user.motor.pesan', $motor->id) }}" method="POST">
        @csrf
        <button type="submit">Pesan Motor Ini</button>
    </form>

    <a href="{{ route('user.dashboard') }}">⬅️ Kembali</a>
@endsection
