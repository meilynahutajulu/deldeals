<?php

namespace App\Http\Controllers;

use App\Models\Pengguna; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('registrasi');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:pengguna,username',
            'full_name' => 'required',
            'email' => 'required|email|unique:pengguna,email',
            'nim' => 'required|unique:pengguna,nim',
            'password' => 'required|min:6',
        ]);

        Pengguna::create([
            'username' => $request->username,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'nim' => $request->nim,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('register')->with('success', 'User berhasil didaftarkan.');
    }
}