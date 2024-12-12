<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ItemController extends Controller
{
    public function create()
    {
        return view('add-items');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        Log::info('Data diterima:', $validate);

        // Simpan gambar
        $imagePath = $request->file('image')->store('images', 'public');

        $user = Auth::user();
        Item::create([
            'name' => $validate['name'],
            'price' => $validate['price'],
            'description' => $validate['description'],
            'image' => $imagePath,
            'user_id' => $user->id,
        ]);

        return redirect()->route('tokosaya');

    }
    
    public function main() {
        $items = Item::all(); // Fetch data from the database
        return view('utama', compact('items'));
    }
}