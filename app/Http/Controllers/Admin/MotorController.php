<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use App\Models\Motor;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    public function index()
    {
        $motors = Kendaraan::all();
        return view('admin.motor.index', compact('motors'));
    }

    public function create()
    {
        return view('admin.motor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kapasitas' => 'required|string',
            'transmisi' => 'required|in:manual,matik',
            'keterangan' => 'nullable|string',
        ]);

        Kendaraan::create($request->all());
        return redirect()->route('motor.index')->with('success', 'Motor berhasil ditambahkan');
    }

    public function edit(Kendaraan $motor)
    {
        return view('admin.motor.edit', compact('motor'));
    }

    public function update(Request $request, Kendaraan $motor)
    {
        $motor->update($request->all());
        return redirect()->route('motor.index')->with('success', 'Motor berhasil diperbarui');
    }

    public function destroy(Kendaraan $motor)
    {
        $motor->delete();
        return redirect()->route('motor.index')->with('success', 'Motor berhasil dihapus');
    }
}
