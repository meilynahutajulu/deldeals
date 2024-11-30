<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Ambil pengguna berdasarkan username
        $pengguna = Pengguna::where('username', $request->username)->first();

        // Cek apakah pengguna ada dan password cocok
        if ($pengguna && Hash::check($request->password, $pengguna->password)) {
            // Simpan pengguna ke session Laravel
            Auth::login($pengguna);

            // Redirect ke dashboard
            return redirect('/utama')->with('success', 'Login berhasil!');
        }

        // Jika login gagal
        return back()->withErrors(['login_error' => 'Username atau password salah.']);
    }
}
