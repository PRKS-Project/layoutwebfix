<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AnggotaController extends Controller
{
public function exportPdf()       // ekspor pdf
{
    $anggota = Anggota::all();

    $pdf = Pdf::loadView('anggota.pdf', compact('anggota'));

    return $pdf->download('daftar-anggota.pdf');
}
    public function index()
    {
        // TAMPILKAN daftar
        return view('anggota.index', ['anggota' => Anggota::all()]);
    }

    public function create()
    {
        // FORM tambah
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_name'   => 'required',
            'email'       => 'required|email|unique:anggota',
            'nama_lengkap'=> 'required',
            'alamat'      => 'required',
            'no_telpon'   => 'required',
        ]);

        Anggota::create($request->all());

        return redirect()->route('anggota.index')
                         ->with('success', 'Data anggota berhasil ditambahkan.');
    }

    public function edit(Anggota $anggota)
    {
        return view('anggota.edit', compact('anggota'));   // sudah benar
    }

    public function update(Request $request, Anggota $anggota)
    {
        $request->validate([
            'user_name'   => 'required',
            'email'       => 'required|email|unique:anggota,email,'.$anggota->id,
            'nama_lengkap'=> 'required',
            'alamat'      => 'required',
            'no_telpon' => 'required|string',

        ]);

        $anggota->update($request->all());

        return redirect()->route('anggota.index')
                         ->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy(Anggota $anggota)
    {
        $anggota->delete();
        return redirect()->route('anggota.index')
                         ->with('success', 'Data anggota berhasil dihapus.');
    }
}
 // FORM tambah
 