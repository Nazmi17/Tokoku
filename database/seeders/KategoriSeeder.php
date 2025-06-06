<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            'Minuman',
            'Makanan',
            'Kebutuhan Rumah Tangga',
            'Kesehatan',
            'Kecantikan',
            'Alat Tulis',
            'Lainnya',
        ];

        foreach ($kategori as $nama) {
            Kategori::create([
                'nama_kategori' => $nama,
                'user_id' => 1,
            ]);
        }
    }
}

