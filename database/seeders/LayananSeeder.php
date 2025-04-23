<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Layanan;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $layanans = [
            [
                'nama' => 'Internet Basic',
                'deskripsi' => 'Paket internet dasar untuk penggunaan harian.',
                'harga' => 150000,
            ],
            [
                'nama' => 'Internet Pro',
                'deskripsi' => 'Paket internet cepat untuk kerja dan hiburan.',
                'harga' => 250000,
            ],
            [
                'nama' => 'Internet Ultra',
                'deskripsi' => 'Paket internet super cepat untuk bisnis dan streaming.',
                'harga' => 350000,
            ],
        ];

        foreach ($layanans as $layanan) {
            Layanan::create($layanan);
        }
    }
}
