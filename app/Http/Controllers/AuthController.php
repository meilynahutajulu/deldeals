<?php

namespace App\Http\Controllers;

use App\Models\PasswordResetToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;
use Illuminate\Container\Attributes\Log;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    // Menampilkan form login
    public function login(Request $request)
    {
        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Form login tersedia.',
            ], 200);
        }

        return view('login');
    }

    // Proses login
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            // $request->session()->regenerate();
            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;

            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Login berhasil',
                    'user' => $user,
                    'token' => $token,
                ], 200);
            }

            return redirect()->intended('main');
        }

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Username atau password salah.',
            ], 401);
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Berhasil logout',
            ], 200);
        }

        return redirect()->route('login')->with('Success', 'Berhasil Logout');
    }

    public function forgotPass(Request $request)
    {
        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Form lupa password tersedia.',
            ], 200);
        }

        return view('forgot');
    }

    public function forgotPassAct(Request $request)
    {
        $customMessage = [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'email.exists' => 'Email tidak terdaftar'
        ];

        $request->validate([
            'email' => 'required|email|exists:pengguna,email'
        ], $customMessage);

        $token = rand(100000, 999999);

        PasswordResetToken::updateOrCreate(
            ['email' => $request->email],
            [
                'email' => $request->email,
                'token' => $token,
                'created_at' => now(),
            ]
        );

        Mail::to($request->email)->send(new ResetPasswordMail($token));

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Kode OTP telah dikirim ke email Anda.',
            ], 200);
        }

        return redirect()->route('otp')->with('Success', 'Kode OTP telah dikirim ke email Anda');
    }

    public function validasiForgotPass(Request $request, $token)
    {
        $getToken = PasswordResetToken::where('token', $token)->first();

        if (!$getToken) {
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Token tidak valid.',
                ], 400);
            }

            return redirect()->route('forgot-password')->with('Error', 'Token tidak valid');
        }

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Token valid.',
                'token' => $getToken->token,
            ], 200);
        }

        return view('changePassword', compact('token'));
    }

    public function validasiForgotPassAct(Request $request)
    {
        $customMessage = [
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
        ];

        $request->validate([
            'password' => 'required|min:8',
        ], $customMessage);

        $token = PasswordResetToken::where('token', $request->token)->first();

        if (!$token) {
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Token tidak valid.',
                ], 400);
            }

            return redirect()->route('forgot-password')->with('Error', 'Token tidak valid');
        }

        $user = Pengguna::where('email', $token->email)->first();

        if (!$user) {
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'User tidak ditemukan.',
                ], 404);
            }

            return redirect()->route('forgot-password')->with('Error', 'User tidak ditemukan');
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        $token->delete();

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Password berhasil diubah.',
            ], 200);
        }

        return redirect()->route('succPass')->with('Success', 'Password berhasil diubah');
    }
}
