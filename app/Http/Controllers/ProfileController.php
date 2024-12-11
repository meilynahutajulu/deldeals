<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
            'full_name' => 'required',
            'email' => 'required|email|unique:pengguna,email,' . $user->id,
            'nim' => 'required|unique:pengguna,nim,' . $user->id,
            'telepon' => 'required',
            'alamat' => 'required',
        ]);

        $user->update([
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'nim' => $request->input('nim'),
            'telepon' => $request->input('telepon'),
            'alamat' => $request->input('alamat'),
        ]);


        Log::info('Data Input:', $request->all());

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
