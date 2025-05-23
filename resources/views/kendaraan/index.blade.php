@extends('layout.app')

@section('content')
<a href="{{ route('kendaraan.create') }}" class="btn btn-success mb-3">+ Tambah Kendaraan</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Tipe</th>
            <th>Tahun</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kendaraans as $k)
        <tr>
            <td>{{ $k->nama }}</td>
            <td>{{ $k->tipe }}</td>
            <td>{{ $k->tahun }}</td>
            <td>Rp {{ number_format($k->harga, 0, ',', '.') }}</td>
            <td>
                <a href="{{ route('kendaraan.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('kendaraan.destroy', $k->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Hapus kendaraan ini?')" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
