@extends('layouts.app')
@section('content')

<h1>Profil Pengguna</h1>
<div class="profile-card">
    <div class="profile-picture">
        <img src="img/profile.jpg" alt="Profile Picture">
    </div>
    <div class="profile-details">
        <p><strong>Name:</strong> {{ $user->full_name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>NIM:</strong> {{ $user->nim }}</p>
        <p><strong>No. Telp:</strong> {{ $user->telepon }}</p>
        <p><strong>Alamat:</strong> {{ $user->alamat }}</p>

        <!-- Tombol Edit -->
        <a href="{{ route('profile.edit') }}" class="btn btn-warning">
            Edit
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0   1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
            </svg>
        </a>
    </div>
</div>

@endsection
