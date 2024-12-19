<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controller;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {
        $user = Auth::user();

        // Return JSON response for API requests
        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'List Data Pengguna',
                'data' => $user,
            ], 200);
        }

        // Return view response for web requests
        return view('profile', [
            'user' => $user,
            'showSearchBar' => false,
        ]);
    }

    public function showEditProfile(Request $request)
    {
        $user = Auth::user();

        // Return JSON response for API requests
        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Form Edit Profile',
                'data' => $user,
            ], 200);
        }

        // Return view response for web requests
        return view('editProfile', [
            'user' => $user,
            'showSearchBar' => false,
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user = Pengguna::find($user->id);

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

        $message = 'Profil berhasil diperbarui!';

        // Return JSON response for API requests
        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => $message,
                'data' => $user,
            ], 200);
        }

        // Return view response for web requests
        return redirect()->route('profile')->with('success', $message);
    }
}
