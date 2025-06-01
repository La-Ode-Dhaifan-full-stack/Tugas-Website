@extends('layouts.admin')

@section('content')
    <h1>Daftar Motor di Dealer</h1>

    <a href="{{ route('motor.create') }}">➕ Tambah Motor</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <thead>
<tr>
    <th>Nama</th>
    <th>Transmisi</th>
    <th>Tahun Produksi</th>
    <th>Harga</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>
@foreach ($motors as $motor)
<tr>
    <td>{{ $motor->nama }}</td>
    <td>{{ $motor->transmisi }}</td>
    <td>{{ \Carbon\Carbon::parse($motor->tahun_produksi)->format('Y') }}</td>
    <td>Rp{{ number_format($motor->harga, 0, ',', '.') }}</td>
    <td>
        <a href="{{ route('motor.edit', $motor->id) }}">✏️ Edit</a>
        <form action="{{ route('motor.destroy', $motor->id) }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button type="submit" onclick="return confirm('Yakin hapus?')">🗑️ Hapus</button>
        </form>
    </td>
</tr>
@endforeach
</tbody>
@endsection
