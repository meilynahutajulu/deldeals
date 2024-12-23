<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Pastikan model Item sudah di-import
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;


class PenggunaController extends Controller
{
    public function show($id)
    {
        // Cari item berdasarkan ID, jika tidak ditemukan, akan memunculkan error 404
        $item = Item::findOrFail($id);

        $user = $item->user_id;
        
        $data = DB::table('pengguna')->where('id', $user)->first();

        // Kirim data item ke view
        return view('pengguna.itemdetails', [
            'selectedItem' => [
                'name' => $item->name,
                'seller' => $data->full_name,
                'price' => $item->price,
                'description' => $item->description,
                'image' => 'storage/' . $item->image,
                'contact' => $data->telepon,
            ]
        ]);
    }
}
