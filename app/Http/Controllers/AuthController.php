<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;

class AuthController extends Controller
{
    // Menampilkan form login
    public function login()
    {
        return view('login');
    }

    // Proses login
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
     
                return redirect()->intended('main');
            }
    

            return back()->intended('/main');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.'
        ]);        

    }
    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }

}
