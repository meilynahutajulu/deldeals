<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\PostResource;

class ItemController extends Controller
{
    // Menampilkan daftar item
    public function index(Request $request)
    {
        // Menampilkan semua item milik pengguna
        $items = Item::where('user_id', Auth::id())->get();

        // Periksa apakah request dari API atau web
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Items listing page',
                'links' => [
                    'add-item' => route('item.store'),
                    'keranjang' => route('keranjang')
                ]
            ]);
        }

        return view('items.index', compact('items'));
    }

    // Menampilkan form untuk menambah item
    public function create(Request $request)
    {
        // Periksa apakah request dari API atau web
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Form tambah item tersedia.',
                'data' => null
            ]);
        }

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
        $item = Item::create([
            'name' => $validate['name'],
            'price' => $validate['price'],
            'description' => $validate['description'],
            'image' => $imagePath,
            'user_id' => $user->id,
        ]);

        // Periksa apakah request dari API atau web
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Item successfully added.',
                'links' => [
                    'view-items' => route('shop'),
                    'keranjang' => route('keranjang')
                ]
            ]);
        }

        return redirect()->route('tokosaya')->with('success', 'Item berhasil ditambahkan.');
    }

    // Menghapus item
    public function remove(Request $request, $id)
    {
        try {
            // Cari item berdasarkan ID di tabel items
            $item = Item::findOrFail($id);

            // Hapus item dari tabel items
            $item->delete();

            // Periksa apakah request dari API atau web
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Item berhasil dihapus.'
                ]);
            }

            return redirect()->back()->with('success', 'Barang berhasil dihapus.');
        } catch (\Exception $e) {
            // Periksa apakah request dari API atau web
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat menghapus barang.',
                    'error' => $e->getMessage()
                ]);
            }

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus barang.');
        }
    }
}
