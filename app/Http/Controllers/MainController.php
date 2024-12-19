<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Model untuk mengambil data dari database
use App\Http\Resources\PostResource;
use Illuminate\Routing\Controller;


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

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'data' => [
                    'items' => $item,
                    'search' => $search,
                ],
                'links' => [
                'profile' => route('profile'),
                'tokosaya' => route('tokosaya'),
                'keranjang' => route('keranjang')
            ]
            ]);
        }
    
        // Mengirimkan data ke view utama
        return view('utama', compact('item', 'search'));
        

    }

    public function main(Request $request)
{
    $items = Item::all(); // Ambil data dari database

    // Periksa apakah permintaan mengharapkan JSON
    if ($request->expectsJson()) {
        return response()->json([
            'success' => true,
            'data' => $items,
        ]);
    }

    // Jika bukan permintaan JSON, tampilkan halaman view
    return view('utama', compact('items'));
}
}   