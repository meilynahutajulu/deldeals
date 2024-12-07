@extends('layouts.app')
@section('content')

<h1>Edit Profil</h1>
<div class="container">
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="full_name">Nama Lengkap</label>
            <input type="text" id="full_name" name="full_name" class="form-control" value="{{ old('full_name', $user->full_name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" id="nim" name="nim" class="form-control" value="{{ old('nim', $user->nim) }}" required>
        </div>

        <div class="form-group">
            <label for="telepon">No. Telp</label>
            <input type="text" id="telepon" name="telepon" class="form-control" value="{{ old('telepon', $user->telepon) }}">
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea id="alamat" name="alamat" class="form-control" >{{ old('alamat', $user->alamat) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>

@endsection
