<?php

namespace App\Http\Controllers;

use App\Models\Pengguna; // Pastikan model Pengguna diimport
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user(); // Memastikan ini adalah instance dari model Pengguna
        return view('profile', [
            'user' => $user,
            'showSearchBar' => false,
        ]);
    }

    public function showEditProfile()
    {
        $user = Auth::user(); // Memastikan ini adalah instance dari model Pengguna
        return view('editProfile', [
            'user' => $user,
            'showSearchBar' => false,
        ]);
    }

    public function update(Request $request)
    {
        // Mendapatkan pengguna yang sedang login
        $user = Auth::user(); // Ini sudah benar jika Auth menggunakan model Pengguna

        // Validasi data yang dimasukkan
        $request->validate([
            'username' => 'required|unique:pengguna,username,' . $user->id,
            'full_name' => 'required',
            'email' => 'required|email|unique:pengguna,email,' . $user->id,
            'nim' => 'required|unique:pengguna,nim,' . $user->id,
            'telepon' => 'nullable|string|max:15', // Kolom telepon opsional
            'alamat' => 'nullable|string', // Kolom alamat opsional
        ]);

        // Pembaruan data pengguna
        // Jika Auth::user() sudah benar, update ini seharusnya berjalan
        $user->update($request->only('username', 'full_name', 'email', 'nim', 'telepon', 'alamat'));

        // Mengarahkan kembali ke halaman profil dengan pesan sukses
        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
