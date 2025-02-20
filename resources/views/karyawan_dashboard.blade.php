@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard Karyawan</h1>
    <p>Selamat datang, {{ Auth::user()->name }}!</p>
</div>
@endsection
