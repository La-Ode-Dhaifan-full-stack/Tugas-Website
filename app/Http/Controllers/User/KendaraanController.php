<?php
namespace App\Http\Controllers\User;

use App\Models\Kendaraan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function show($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        return view('user.kendaraan.show', compact('kendaraan'));
    }
}
