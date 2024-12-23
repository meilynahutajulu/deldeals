<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Item;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class KeranjangController extends Controller
{
    public function addToKeranjang(Request $request, $id)
{
    $user = Auth::user();

    // Memeriksa apakah barang sudah ada di dalam keranjang
    if (Keranjang::where('user_id', $user->id)->where('item_id', $id)->exists()) {
        $message = 'Barang sudah ada di keranjang!';

        // Jika request merupakan JSON, kirimkan respon JSON
        if ($request->wantsJson()) {
            return response()->json(['error' => $message], 400);
        }

        // Jika request bukan JSON, kembalikan ke halaman sebelumnya dengan pesan error
        return redirect()->back()->with('error', $message);
    }

    // Menambahkan barang ke keranjang jika belum ada
    Keranjang::create([
        'user_id' => $user->id,
        'item_id' => $id,
    ]);

    $message = 'Barang berhasil ditambahkan ke keranjang!';

    // Jika request merupakan JSON, kirimkan respon JSON
    if ($request->wantsJson()) {
        return response()->json(['success' => $message], 200);
    }

    // Jika request bukan JSON, kembalikan ke halaman keranjang dengan pesan sukses
    return redirect()->route('keranjang')->with('success', $message);
}


    public function showKeranjang(Request $request)
    {
        $user = Auth::user();
        $keranjang = Keranjang::where('user_id', $user->id)->with('item')->get();

        // Return JSON response for API requests
        if ($request->wantsJson()) {
            // return response()->json($keranjang, 200);
            return response()->json([
                'message' => 'Data keranjang pengguna',
                'data' => $keranjang,
            ], 200);
        }

        // Return view response for web requests
        return view('keranjang', compact('keranjang'));
    }

    public function removeFromKeranjang(Request $request, $id)
    {
        $user = Auth::user();
        $keranjang = Keranjang::where('user_id', $user->id)->where('item_id', $id)->first();

        if ($keranjang) {
            $keranjang->delete();
            $message = 'Barang berhasil dihapus dari keranjang!';

            // Return JSON response for API requests
            if ($request->wantsJson()) {
                return response()->json(['success' => $message], 200);
            }

            // Return view response for web requests
            return redirect()->route('keranjang')->with('success', $message);
        }

        $message = 'Barang tidak ditemukan di keranjang!';

        // Return JSON response for API requests
        if ($request->wantsJson()) {
            return response()->json(['error' => $message], 400);
        }

        // Return view response for web requests
        return redirect()->route('keranjang')->with('error', $message);
    }
    
}
