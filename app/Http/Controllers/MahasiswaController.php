<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function destroy($nim)
    {
        // Cari mahasiswa berdasarkan NIM
        $mahasiswa = Mahasiswa::findOrFail($nim);

        // Hapus data mahasiswa
        $mahasiswa->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Data mahasiswa berhasil dihapus!');
    }
    // Menampilkan daftar mahasiswa
    public function index()
    {
        $mahasiswa = DB::table('mahasiswa')->get();
        return view('mahasiswa', compact('mahasiswa'));
    }

    // Menampilkan form tambah mahasiswa
    public function create()
    {
        return view('tambah-mahasiswa');
    }

    // Menyimpan data mahasiswa ke database
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswa,nim',
            'nama' => 'required',
            'email' => 'required|email|unique:mahasiswa,email',
            'no_telp' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan!');
    }

    // Menampilkan form edit mahasiswa
public function edit($nim)
{
    $mahasiswa = Mahasiswa::where('nim', $nim)->first();
    if (!$mahasiswa) {
        return redirect()->route('mahasiswa.index')->with('error', 'Mahasiswa tidak ditemukan!');
    }
    return view('edit-mahasiswa', compact('mahasiswa'));
}

// Memproses update data mahasiswa
public function update(Request $request, $nim)
{
    $request->validate([
        'nama' => 'required',
        'email' => 'required|email',
        'no_telp' => 'required',
    ]);

    $mahasiswa = Mahasiswa::where('nim', $nim)->first();
    if (!$mahasiswa) {
        return redirect()->route('mahasiswa.index')->with('error', 'Mahasiswa tidak ditemukan!');
    }

    $mahasiswa->update([
        'nama' => $request->nama,
        'email' => $request->email,
        'no_telp' => $request->no_telp,
    ]);

    return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil diperbarui!');
}

}
