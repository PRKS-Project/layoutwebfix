<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;



Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');


Route::get('/anggota/pdf', [AnggotaController::class, 'exportPdf'])->name('anggota.pdf');


Route::get('/', function () {
    return view('welcome');
});

// Redirect ke dashboard berdasarkan role setelah login

Route::get('/karyawan_dashboard', function () {
    return view('karyawan_dashboard');
})->middleware(['auth', 'verified'])->name('karyawan.dashboard');
Route::resource('anggota', AnggotaController::class)->parameters([
    'anggota' => 'anggota'
]);



// Middleware auth untuk memastikan hanya user yang login yang bisa mengakses
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/mahasiswa', function () {
    $mahasiswa = DB::table('mahasiswa')->get();
    return view('mahasiswa', compact('mahasiswa'));
})->name('mahasiswa.index');

// Form tambah mahasiswa
Route::get('/tambah-mahasiswa', function () {
    return view('tambah-mahasiswa');
})->middleware('auth')->name('mahasiswa.create');

// Proses tambah mahasiswa
Route::post('/tambah-mahasiswa', function (Request $request) {
    $request->validate([
        'nim' => 'required|unique:mahasiswa,nim',
        'nama' => 'required',
        'email' => 'required|email|unique:mahasiswa,email',
        'no_telp' => 'required',
        'password' => 'required|min:6|confirmed',
    ]);

    DB::table('mahasiswa')->insert([
        'nim' => $request->nim,
        'nama' => $request->nama,
        'email' => $request->email,
        'no_telp' => $request->no_telp,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan!');
})->middleware('auth')->name('mahasiswa.store');

// Form edit mahasiswa
Route::get('/edit-mahasiswa/{nim}', function ($nim) {
    $mahasiswa = DB::table('mahasiswa')->where('nim', $nim)->first();
    if (!$mahasiswa) {
        return redirect()->route('mahasiswa.index')->with('error', 'Mahasiswa tidak ditemukan!');
    }
    return view('edit-mahasiswa', compact('mahasiswa'));
})->middleware('auth')->name('mahasiswa.edit');


Route::resource('mahasiswa', MahasiswaController::class)->middleware('auth');

// Proses hapus mahasiswa
Route::delete('/hapus-mahasiswa/{nim}', function ($nim) {
    DB::table('mahasiswa')->where('nim', $nim)->delete();
    return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus!');
})->middleware('auth')->name('mahasiswa.destroy');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/'); // Arahkan ke halaman utama setelah logout
})->name('logout');

Route::get('/kategori', [CategoryController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [CategoryController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [CategoryController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{id}/edit', [CategoryController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{id}', [CategoryController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{id}', [CategoryController::class, 'destroy'])->name('kategori.destroy');

require __DIR__.'/auth.php';
