<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\Motor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
{
    $transmisi = $request->query('transmisi');
    $query = Kendaraan::query();

    if ($transmisi) {
        $query->where('transmisi', $transmisi);
    }

    $motors = $query->get();
    return view('user.dashboard', compact('motors'));
}

}
