<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class penggunacontroller extends Controller
{
    public function showItemDetails(Request $request)
    {
        $item = $request->input('item'); // Ambil parameter 'item'
        $items = [
            'tumbler' => [
                'name' => 'Tumbler Tupperware',
                'seller' => 'Wumpus',
                'price' => 100000,
                'description' => 'Warna pink dan biru. Masih baru dan tidak lecet.',
                'contact' => '0852XXXXXXX',
                'image' => '/img/Tuperware.jpeg',
            ],
            'keyboard' => [
                'name' => 'Keyboard RGB',
                'seller' => 'TechZone',
                'price' => 200000,
                'description' => 'Keyboard dengan lampu RGB. Kondisi sangat baik.',
                'contact' => '0821XXXXXXX',
                'image' => '/img/keyboard.jpg',
            ],
            'flashdisk' => [
                'name' => 'FlashDisk',
                'seller' => 'DigitalStore',
                'price' => 50000,
                'description' => 'FlashDisk dengan kapasitas besar, cocok untuk menyimpan data.',
                'contact' => '0813XXXXXXX',
                'image' => '/img/FlashDisk.jpeg',
            ],
            'pin' => [
                'name' => 'Pin DEL',
                'seller' => 'CampusMerch',
                'price' => 20000,
                'description' => 'Pin keren dengan logo DEL. Cocok untuk koleksi.',
                'contact' => '0851XXXXXXX',
                'image' => '/img/pin.jpg',
            ],
            'kaos' => [
                'name' => 'Kaos DEL',
                'seller' => 'Merchandise DEL',
                'price' => 200000,
                'description' => 'Kaos nyaman dengan logo DEL. Tersedia berbagai ukuran.',
                'contact' => '0877XXXXXXX',
                'image' => '/img/kaos-del.png',
            ],
        ];

        // Ambil item berdasarkan parameter
        $selectedItem = $items[$item] ?? null;

        // Jika item tidak ditemukan, tampilkan error 404
        if (!$selectedItem) {
            abort(404, 'Item tidak ditemukan');
        }

        // Kirim data ke view
        return view('pengguna.itemdetails', compact('selectedItem'));
    }
}
