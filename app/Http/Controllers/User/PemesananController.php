<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\Motor;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function show($id)
    {
        $motor = Kendaraan::findOrFail($id);
        return view('user.motor-detail', compact('motor'));
    }

    public function pesan($id)
    {
        $motor = Kendaraan::findOrFail($id);

        // Simulasi notifikasi 5 menit kemudian (sementara langsung ditampilkan)
        // Nanti bisa pakai job/queue
        session()->flash('pesan', "Motor {$motor->nama} sedang dikemas. Tunggu 5 menit ya!");

        return redirect()->route('user.dashboard');
    }
}
