<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Http\Resources\PostResource;
use PhpParser\Node\Stmt\Return_;

class ItemController extends Controller
{
    // Menampilkan daftar item
    public function index()
    {
        // Menampilkan semua item milik pengguna
        $items = Item::where('user_id', Auth::id())->get();

        // return new PostResource(true, 'List Data Posts', $items);
        return view('items.index', compact('items'));
    }

    // Menampilkan form untuk menambah item
    public function create()
    {
        return view('add-items');
    }

    // Menyimpan item baru
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

    // Menghapus item
    public function remove($id)
    {
        try {
            // Cari item berdasarkan ID di tabel items
            $item = Item::findOrFail($id);

            // Hapus item dari tabel items
            $item->delete();

            return redirect()->back()->with('success', 'Barang berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus barang.');
        }
    }
}
