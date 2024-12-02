<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan gambar ke folder public/images
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        // Simpan data produk ke database
        Item::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'image_path' => 'images/' . $imageName,
        ]);

        return redirect()->route('shop')->with('success', 'Produk berhasil ditambahkan!');
    }
    public function main() {
        $items = Item::all(); // Fetch data from the database
        return view('utama', compact('items'));
    }

    
    
}
