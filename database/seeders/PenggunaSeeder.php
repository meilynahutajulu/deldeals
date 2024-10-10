<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pengguna = [
            [
                'username' => 'meyii',
                'full_name' => 'Meilyna Hutajulu',
                'email' => 'meii@gmail.com',
                'nim' => '12S2039',
                'password' => Hash::make('qazwsxed'),
            ],
            [
                'username' => 'Reinn',
                'full_name' => 'Reinhard Batubara',
                'email' => 'reii@gmail.com',
                'nim' => '12S22012',
                'password' => Hash::make('reinhard123'),
            ],
            [
                'username' => 'Ruthh',
                'full_name' => 'Ruth Septiana',
                'email' => 'septiii@gmail.com',
                'nim' => '12S22042',
                'password' => Hash::make('ruth1234'),
            ],
            [
                'username' => 'bethaa',
                'full_name' => 'Bethania Hasibuan',
                'email' => 'bibettt@gmail.com',
                'nim' => '12S22003',
                'password' => Hash::make('bibett1234'),
            ],
        ];

        foreach ($pengguna as $data) {
            Pengguna::create($data);
        }
    }
}
