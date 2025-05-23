<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->user()->isAdmin()) {
            return view('admin.home');
        }
        return view('pengunjung.home');
    }
}