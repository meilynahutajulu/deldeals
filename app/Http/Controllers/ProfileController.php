

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class ProfileController extends Controller
// {
//     // public function editProfile()
//     // {
//     //     // Mengambil data pengguna yang sedang login
//     //     $user = Auth::user();

//     //     // Mengirim data pengguna ke view 'editprofile'
//     //     return view('editprofile', compact('user'));
//     // }
//     public function editProfile()
// {
//     $user = (object) [
//         'username' => 'testuser',
//         'full_name' => 'Test User',
//         'nim' => '123456789',
//         'email' => 'test@example.com',
//     ];

//     return view('editprofile', compact('pengguna'));
// }
// }

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user(); 
        return view('profile', compact('user'));
    }

    public function editProfile()
    {
        $user = auth()->user();
        return view('editprofile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

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

