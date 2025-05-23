<?php

// app/Http/Controllers/RegisterController.php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
    try {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:klien,admin', // Validasi role
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'klien', // Gunakan input role atau default ke 'klien'
        ]);

        if ($user) {
            \Illuminate\Support\Facades\Auth::login($user);
            return redirect()->route('klien.dashboard')->with('success', 'Registrasi berhasil!');
        } else {
            \Log::error('Gagal membuat user: ' . json_encode($request->all()));
            return back()->withErrors(['msg' => 'Gagal menyimpan user ke database.']);
        }
    } catch (\Exception $e) {
        \Log::error('Error registrasi: ' . $e->getMessage());
        return back()->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()]);
    }
}
}