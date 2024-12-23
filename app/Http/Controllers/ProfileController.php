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
                'links' => [
                'update-profile' => route('profile.edit'),
                'view-items' => route('shop'),
                'add-item' => route('item.store')
            ]
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
                'links' => [
                'view-profile' => route('profile'),
                'tokosaya' => route('tokosaya')
                ]
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
            'telepon' => 'required|regex:/^\+62[0-9]{9,13}$/',
            'alamat' => '',
        ]);

        $update = $user->update([
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
                'data' => $update,
            ], 200);
        }

        // Return view response for web requests
        return redirect()->route('profile')->with('success', $message);
    }
}
