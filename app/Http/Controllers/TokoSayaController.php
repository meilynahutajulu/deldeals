<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Model untuk mengambil data dari database

class TokoSayaController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari database
        $items = Item::all(); // Pastikan Item adalah model yang benar

        // Mengirimkan data ke view tokosaya
        return view('tokosaya', compact('items')); // Mengirimkan $items ke view
    }
}
