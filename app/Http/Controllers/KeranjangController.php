<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Item;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function addToKeranjang(Request $request, $id)
    {
        $user = Auth::user();

        if (Keranjang::where('user_id', $user->id)->where('item_id', $id)->exists()) {
            return redirect()->back()->with('error', 'Barang sudah ada di keranjang!');
        }

        Keranjang::create([
            'user_id' => $user->id,
            'item_id' => $id,
        ]);

        return redirect()->route('keranjang')->with('success', 'Barang berhasil ditambahkan ke keranjang!');
    }

    public function showKeranjang()
    {
        $user = Auth::user();
        $keranjang = Keranjang::where('user_id', $user->id)->with('item')->get();

        return view('keranjang', compact('keranjang'));
    }

    public function removeFromKeranjang($id)
    {
        $user = Auth::user();
        $keranjang = Keranjang::where('user_id', $user->id)->where('item_id', $id)->first();

        if ($keranjang) {
            $keranjang->delete();
            return redirect()->route('keranjang')->with('success', 'Barang berhasil dihapus dari keranjang!');
        }

        return redirect()->route('keranjang')->with('error', 'Barang tidak ditemukan di keranjang!');
    }
}

