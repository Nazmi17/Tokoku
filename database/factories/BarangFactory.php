<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Kategori;
use App\Models\Barang;
use App\Models\User;
use Faker\Factory as FakerFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Barang::class;
    public function definition(): array
    {
        $faker = FakerFactory::create('id_ID');
        return [
            'nama_barang' => $this->faker->unique()->word(2, true),
            'harga_jual' => $this->faker->numberBetween(1000, 10000),
            'stok' => $this->faker->numberBetween(1, 100),
            'kategori_id' => \App\Models\Kategori::inRandomOrder()->first()->id_kategori,
            'user_id' => 1,
        ];
    }
}
