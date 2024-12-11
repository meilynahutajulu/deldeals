<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Model untuk mengambil data dari database

class TokoSayaController extends Controller
{
    public function index(Request $request)
    {
        // Ambil query pencarian dari input
        // $search = $request->input('search');

        // // Ambil semua data dari database, jika ada pencarian, filter berdasarkan nama
        // $item = Item::when($search, function ($query, $search) {
        //     return $query->where('name', 'like', '%' . $search . '%');
        // })->get();
        $item = Item::all(); // Mengambil semua data dari database

        // Mengirimkan data ke view tokosaya
        return view('tokosaya', compact('item')); // Mengirimkan $items dan $search ke view
    }
        
}