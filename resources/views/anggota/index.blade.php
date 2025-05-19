@extends('layouts.main')

@section('content')

  <div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Anggota</h2>
        <div>
            <a href="{{ route('anggota.pdf') }}" class="btn btn-danger me-2">
                <i class="fas fa-file-pdf"></i> Rekap Aanggota
            </a>
            <a href="{{ route('anggota.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Tambah Anggota
            </a>
        </div>
    </div>

        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item active">Anggota</li>
            </ol>
        </nav>
        
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>user name</th>
                        <th>email</th>
                        <th>nama lengkap</th>
                        <th>alamat</th>
                        <th>no telpon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anggota as $anggota)
                        <tr>
                            <td>{{ $anggota->user_name }}</td>
                            <td>{{ $anggota->email }}</td>
                            <td>{{ $anggota->nama_lengkap }}</td>
                            <td>{{ $anggota->alamat }}</td>
                            <td>{{ $anggota->no_telpon }}</td>
                            <td>
                                <a href="{{ route('anggota.edit', $anggota->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('anggota.destroy', $anggota->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus anggota ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
