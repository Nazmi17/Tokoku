<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;
use App\Models\Kategori;
use Faker\Factory as FakerFactory;

class BarangSeeder extends Seeder
{
    public function run(): void
    {

        $faker = FakerFactory::create('id_ID');
        $data = [
            ['Teh Celup', 'Minuman'],
            ['Air Mineral Botol', 'Minuman'],
            ['Susu Kental Manis', 'Minuman'],
            ['Kopi Instan', 'Minuman'],
            ['Mie Instan Goreng', 'Makanan'],
            ['Mie Instan Kuah', 'Makanan'],
            ['Roti Tawar', 'Makanan'],
            ['Biskuit Cokelat', 'Makanan'],
            ['Minyak Goreng 1L', 'Kebutuhan Rumah Tangga'],
            ['Sabun Cuci Piring', 'Kebutuhan Rumah Tangga'],
            ['Detergen Bubuk', 'Kebutuhan Rumah Tangga'],
            ['Sikat Gigi', 'Kebutuhan Rumah Tangga'],
            ['Sabun Mandi Cair', 'Kebutuhan Rumah Tangga'],
            ['Shampo Sachet', 'Kecantikan'],
            ['Sabun Wajah', 'Kecantikan'],
            ['Body Lotion', 'Kecantikan'],
            ['Vitamin C Tablet', 'Kesehatan'],
            ['Obat Sakit Kepala', 'Kesehatan'],
            ['Masker Medis', 'Kesehatan'],
            ['Thermometer', 'Kesehatan'],
            ['Pulpen Biru', 'Lainnya'],
            ['Buku Tulis 38 Lembar', 'Lainnya'],
            ['Pensil 2B', 'Lainnya'],
            ['Penghapus', 'Lainnya'],
            ['Gas Elpiji 3Kg', 'Kebutuhan Rumah Tangga'],
            ['Kopi Susu', 'Minuman'],
            ['Teh Botol', 'Minuman'],
            ['Roti Manis', 'Makanan'],
            ['Sarden Kaleng', 'Makanan'],
            ['Minyak Kayu Putih', 'Kesehatan'],
            ['Minyak Telon', 'Kesehatan'],
            ['Bedak Bayi', 'Kecantikan'],
            ['Lip Balm', 'Kecantikan'],
            ['Baterai AA', 'Lainnya'],
            ['Sabun Cuci Tangan', 'Kebutuhan Rumah Tangga'],
            ['Kecap Manis', 'Makanan'],
            ['Sambal Botol', 'Makanan'],
            ['Cokelat Batangan', 'Makanan'],
            ['Kacang Tanah Kupas', 'Makanan'],
            ['Susu Kotak', 'Minuman'],
            ['Air Galon', 'Minuman'],
            ['Sikat WC', 'Kebutuhan Rumah Tangga'],
            ['Pel Lantai', 'Kebutuhan Rumah Tangga'],
            ['Pewangi Pakaian', 'Kebutuhan Rumah Tangga'],
            ['Spidol Hitam', 'Lainnya'],
            ['Pensil Warna', 'Lainnya'],
            ['Buku Gambar', 'Lainnya'],
            ['Pasta Gigi', 'Kebutuhan Rumah Tangga'],
            ['Tisu Basah', 'Kebutuhan Rumah Tangga'],
        ];

        foreach ($data as [$namaBarang, $namaKategori]) {
            $kategori = Kategori::where('nama_kategori', $namaKategori)->first();

            if ($kategori) {
                Barang::create([
                    'nama_barang' => $namaBarang,
                    'harga_jual' => $faker->numberBetween(1000, 10000),
                    'stok' => $faker->numberBetween(10, 100),
                    'kategori_id' => $kategori->id_kategori,
                    'user_id' => 1,
                ]);
            }
        }
    }
}
