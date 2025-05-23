@extends('layout.app')

@section('content')
<h4>Tambah Kendaraan</h4>
<form action="{{ route('kendaraan.store') }}" method="POST">
    @csrf
    <div class="mb-2">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>Tipe</label>
        <select name="tipe" class="form-control" required>
            <option value="">-- Pilih Tipe --</option>
            <option value="Matic">Matic</option>
            <option value="Manual">Manual</option>
        </select>
    </div>
    <div class="mb-2">
        <label>Tahun Produksi</label>
        <input type="date" name="tahun" class="form-control" required>
    </div>
    <div class="mb-2">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" required>
    </div>
    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
