<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Model untuk mengambil data dari database

class TokoSayaController extends Controller
{
    public function index(Request $request)
{
    // Ambil query pencarian dari input
    $search = $request->input('search');

    // Ambil semua data dari database, jika ada pencarian, filter berdasarkan nama
    $items = Item::when($search, function ($query, $search) {
        return $query->where('name', 'like', '%' . $search . '%');
    })->get();

    // Mengirimkan data ke view tokosaya
    return view('tokosaya', compact('items', 'search')); // Mengirimkan $items dan $search ke view
}
    
}
