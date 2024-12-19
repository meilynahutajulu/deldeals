<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller;

class SocialiteController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callback(){
        $googleUser = Socialite::driver('google')->user();

        if (!$googleUser) {
            return redirect('/login')->with('error', 'Gagal mendapatkan data pengguna dari Google.');
        }

        $googleUser = Socialite::driver('google')->user();
 
        $registeredUser = User::where('google_id', $googleUser->id)->first();
        if (!$registeredUser) {
            $user = User::updateOrCreate([
                'google_id' => $googleUser->id,
            ], [
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => Hash::make('123'),
                'google_token' => $googleUser->token,
                'google_refresh_token' => $googleUser->refreshToken,
            ]);
            Auth::login($registeredUser);
            return redirect('/main');
        }

        Auth::login($registeredUser);

        return redirect('/main');
    }
}
