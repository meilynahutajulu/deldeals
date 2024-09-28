@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <p>Selamat datang di dashboard Anda!</p>
    <p>Total pengguna: {{ $users }}</p>

    <!-- Tambahkan statistik, grafik, atau informasi lainnya di sini -->
</div>
@endsection
