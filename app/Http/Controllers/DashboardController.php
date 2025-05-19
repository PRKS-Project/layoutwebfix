<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Anggota;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $totalAnggota = Anggota::count();
            return view('dashboard', compact('totalAnggota'));
        } elseif ($user->role === 'karyawan') {
            return view('karyawan_dashboard');
        }

        return redirect('/'); // fallback
    }
}
