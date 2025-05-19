<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class CategoryController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all(); // Mengambil semua data kategori
        return view('kategori', compact('kategori'));
    }

    public function create()
    {
        return view('tambah-kategori');
    }

    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'nama' => 'required|string|max:255',
        'penerbit' => 'required|string|max:255',
        'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
    ]);

    // Simpan ke database
    Kategori::create([
        'nama' => $request->nama,
        'penerbit' => $request->penerbit,
        'tahun_terbit' => $request->tahun_terbit,
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
}


    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('edit-kategori', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'nama' => $request->nama,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
