<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Impor Log
use App\Models\Pengguna;

class AuthController extends Controller
{
    public function login(Request $request)
{
    // Validasi input
    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    // Ambil kredensial dari request
    $credentials = $request->only('username', 'password');

    // Coba untuk login
    if (Auth::attempt($credentials)) {
        // Jika login berhasil, ambil pengguna yang sedang login
        $user = Auth::user();
        
        // Mengembalikan respons dengan redirect_url
        return response()->json([
            'message' => 'Login successful',
            'redirect_url' => '/utama', // Ganti dengan URL yang sesuai
        ], 200);
    } else {
        // Jika login gagal, mengembalikan respons error
        return response()->json(['error' => 'Username or password incorrect'], 401);
    }
}
}