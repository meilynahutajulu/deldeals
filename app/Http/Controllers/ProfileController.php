<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('profile', [
            'user' => $user,
            'showSearchBar' => false,
        ]);
    }

    public function showEditProfile()
    {
        $user = Auth::user();
        return view('editProfile',[
            'user' => $user,
            'showSearchBar' => false,
        ]);
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
