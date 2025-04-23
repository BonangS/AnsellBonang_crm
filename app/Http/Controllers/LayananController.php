<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;

class LayananController extends Controller
{
    public function index()
    {
        // Menampilkan semua layanan
        $layanan = Layanan::all();
        return view('layanan.index', compact('layanan'));
    }

    public function create()
    {
        return view('layanan.create');
    }

    public function store(Request $request)
{
    // Validasi data
    $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'harga' => 'required|numeric|min:0',
    ]);

    // Menyimpan layanan baru
    Layanan::create($request->all());
    return redirect()->route('layanan.index')->with('success', 'Layanan berhasil ditambahkan');
}

public function update(Request $request, Layanan $layanan)
{
    // Validasi data
    $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'harga' => 'required|numeric|min:0',
    ]);

    // Update data layanan
    $layanan->update($request->all());
    return redirect()->route('layanan.index')->with('success', 'Layanan berhasil diperbarui');
}


    public function edit(Layanan $layanan)
    {
        return view('layanan.edit', compact('layanan'));
    }


    public function destroy(Layanan $layanan)
    {
        // Menghapus layanan
        $layanan->delete();
        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil dihapus');
    }
}
