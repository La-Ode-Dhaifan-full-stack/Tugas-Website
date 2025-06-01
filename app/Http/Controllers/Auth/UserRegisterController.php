<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;

class UserRegisterController extends Controller
{
    public function __construct(){
        //$this->middleware('guest');  // Pastikan hanya guest yang bisa mengakses registrasi
        }


         public function create()
    {
        // Cek apakah user sudah login
        if (Auth::check()) {
            // Jika sudah login, redirect ke halaman dashboard user
            return redirect()->route('user.dashboard');
        }

        // Jika belum login, tampilkan halaman registrasi
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        // Validasi input form registrasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'klien',  // Set role default 'klien'
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('user.dashboard');
    }
}
