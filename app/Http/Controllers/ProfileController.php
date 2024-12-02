<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        // $user = auth()->user(); 
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function editProfile()
    {
        // $user = auth()->user();
        $user = Auth::user();
        return view('editprofile', compact('user'));
    }

    public function update(Request $request)
    {
        // $user = auth()->user();
        $user = Auth::user();
        $user  = Pengguna::find($user->id);

        $request->validate([
            'username' => 'required|unique:pengguna,username,' . $user->id,
            'full_name' => 'required',
            'email' => 'required|email|unique:pengguna,email,' . $user->id,
            'nim' => 'required|unique:pengguna,nim,' . $user->id,
        ]);

        $user->update($request->only('username', 'full_name', 'email', 'nim'));

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
