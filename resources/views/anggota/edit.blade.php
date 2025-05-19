@extends('layouts.main')

@section('content')
    <div class="pagetitle">
        <h1>Edit Data Anggota</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('anggota.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Edit Data Anggota</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <h2>Edit Data Aanggota</h2>
        <form action="{{ route('anggota.update', $anggota->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="user_name">User name:</label>
                <input type="text" name="user_name" id="user_name" class="form-control" required>
            </div>
            <div class="form-group">
                 <label for="email">Email:</label>
                 <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap:</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" name="alamat" id="alamat" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="no_telpon">Np Telpon:</label>
                <input type="text" name="no_telpon" id="no_telpon" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
@endsection
