@extends('layouts.main')

@section('content')
<div class="container">
    <div class="alert alert-success">
        Asslamualaikum, {{ Auth::user()->name }}!
    </div>

    <div class="card">
    <div class="card-body">
        <h5 class="card-title">Total Anggota</h5>
        <p class="card-text">{{ $totalAnggota }}</p>
    </div>
</div>

@endsection
