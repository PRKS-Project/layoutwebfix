<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

// Redirect ke dashboard berdasarkan role setelah login
Route::get('/dashboard', function () {
    if (Auth::check()) {
        if (Auth::user()->role == 'admin') {
            return view('dashboard'); // Admin tetap menggunakan file dashboard.blade.php
        } elseif (Auth::user()->role == 'karyawan') {
            return view('karyawan_dashboard'); // Karyawan menggunakan file baru
        }
    }
    return redirect('/'); // Jika tidak login, kembalikan ke halaman utama
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/karyawan_dashboard', function () {
    return view('karyawan_dashboard');
})->middleware(['auth', 'verified'])->name('karyawan.dashboard');


// Middleware auth untuk memastikan hanya user yang login yang bisa mengakses
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
