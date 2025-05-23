<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            return redirect()->route('kendaraan.index');
        } else {
            return view('client.kendaraan-index'); // atau view lain untuk klien
        }
    }
}
