<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Pastikan Anda memiliki model Item

class ItemController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|url',
        ]);

        Item::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->image,
        ]);

        return redirect()->back()->with('success', 'Item added successfully.');
    }
}
