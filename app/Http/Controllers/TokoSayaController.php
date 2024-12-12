<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Model untuk mengambil data dari database
use Illuminate\Support\Facades\Auth; // Menggunakan Auth
use Illuminate\Support\Facades\DB; // Menggunakan DB

class TokoSayaController extends Controller
{
    public function index(Request $request)
    {

        $user = Auth::user(); // Mendapatkan user yang sedang login
        $item = DB::table('items')->where('user_id', $user->id)->get();

        // Mengirimkan data ke view tokosaya
        return view('tokosaya', compact('item')); // Mengirimkan $items dan $search ke view
    }
        
}