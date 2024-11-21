<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Jika login berhasil, buat token atau redirect sesuai kebutuhan
            return response()->json([
                'message' => 'Login successful',
                'redirect_url' => '/utama' // URL tujuan
            ], 200);
        } else {
            // Jika gagal
            return response()->json(['error' => 'Username or password incorrect'], 401);
        }
    }
}

