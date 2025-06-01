@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2">
            <h5 class="fw-bold">Kategori Kendaraan</h5>
            <ul class="list-group">
                <li class="list-group-item {{ request('transmisi') == null ? 'active' : '' }}">
                    <a href="{{ route('user.dashboard') }}" class="text-decoration-none">Semua</a>
                </li>
                <li class="list-group-item {{ request('transmisi') == 'matik' ? 'active' : '' }}">
                    <a href="{{ route('user.dashboard', ['transmisi' => 'metik']) }}" class="text-decoration-none">Matik</a>
                </li>
                <li class="list-group-item {{ request('transmisi') == 'manual' ? 'active' : '' }}">
                    <a href="{{ route('user.dashboard', ['transmisi' => 'manual']) }}" class="text-decoration-none">Manual</a>
                </li>
            </ul>
        </div>

        <!-- Konten Utama -->
        <div class="col-md-10">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-bold">Daftar Kendaraan</h4>
            </div>

            @if(session('pesan'))
                <div class="alert alert-info">{{ session('pesan') }}</div>
            @endif

            <table class="table table-bordered table-hover bg-white shadow-sm">
                <thead class="table-primary">
                    <tr class="text-center">
                        <th>Nama</th>
                        <th>Transmisi</th>
                        <th>Tahun</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($motors as $motor)
                        <tr class="text-center align-middle">
                            <td>{{ $motor->nama }}</td>
                            <td>{{ ucfirst($motor->transmisi) }}</td>
                            <td>{{ \Carbon\Carbon::parse($motor->tahun_produksi)->format('Y') }}</td>
                            <td>Rp{{ number_format($motor->harga, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('user.kendaraan.pesan', $motor->id) }}" class="btn btn-success btn-sm">Pesan</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Tidak ada kendaraan ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .table th, .table td {
        vertical-align: middle;
    }
    .list-group-item a {
        display: block;
        color: inherit;        
    }
    .list-group-item :hover {
        font-weight: bold;
        color:rgb(0, 255, 13);
    }
</style>
@endsection
