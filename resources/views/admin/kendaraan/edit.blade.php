@extends('layout.app')

@section('content')
<h4>Edit Kendaraan</h4>
<form action="{{ route('kendaraan.update', $kendaraan->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-2">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="{{ $kendaraan->nama }}" required>
    </div>
    <div class="mb-2">
        <label>Tipe</label>
        <select name="tipe" class="form-control" required>
            <option value="Matic" {{ $kendaraan->tipe == 'Matic' ? 'selected' : '' }}>Matic</option>
            <option value="Manual" {{ $kendaraan->tipe == 'Manual' ? 'selected' : '' }}>Manual</option>
        </select>
    </div>
    <div class="mb-2">
        <label>Tahun Produksi</label>
        <input type="date" name="tahun" class="form-control" value="{{ $kendaraan->tahun }}" required>
    </div>
    <div class="mb-2">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" value="{{ $kendaraan->harga }}" required>
    </div>
    <button class="btn btn-success">Update</button>
    <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
