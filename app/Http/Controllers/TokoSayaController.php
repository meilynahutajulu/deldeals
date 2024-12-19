<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Model untuk mengambil data dari database
use Illuminate\Support\Facades\Auth; // Menggunakan Auth
use Illuminate\Support\Facades\DB; // Menggunakan DB
use Illuminate\Routing\Controller;

class TokoSayaController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user(); // Mendapatkan user yang sedang login
        $item = DB::table('items')->where('user_id', $user->id)->get();

        // Return JSON response for API requests
        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'List Data Item',
                'data' => $item,
            ], 200);
        }

        // Return view response for web requests
        return view('tokosaya', compact('item')); // Mengirimkan $items ke view
    }
}
