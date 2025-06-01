<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');  // Memastikan hanya yang login yang bisa mengakses
    }
    
    public function index()
    {
        return view('admin.dashboard'); // Pastikan file blade-nya ada ya
    }
}
