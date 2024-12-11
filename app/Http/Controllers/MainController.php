<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Model untuk mengambil data dari database

class MainController extends Controller
{
    public function index(Request $request)
    {
        // Ambil query pencarian dari input
        $search = $request->input('search');
    
        // Ambil data berdasarkan pencarian, atau semua data jika tidak ada pencarian
        $item = Item::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->get();
    
        // Mengirimkan data ke view utama
        return view('utama', compact('item', 'search'));
    }
}   