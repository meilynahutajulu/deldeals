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
    
        // Mengirimkan data ke view utama
        return view('utama', compact('item', 'search'));
        return new PostResource(true, 'List Data Posts', $item);
    }

    public function main() {
        $items = Item::all(); // Fetch data from the database
        return view('utama', compact('items'));
        return new PostResource(true, 'List Data Posts', $items);
    }
}   