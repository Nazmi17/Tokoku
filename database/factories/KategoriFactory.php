<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kategori>
 */
class KategoriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Kategori::class;
    public function definition(): array
    {
        $faker = FakerFactory::create('id_ID');
        return [
            'nama_kategori' => $this->faker->unique()->word(),
            'user_id' => 1,
        ];
    }
}
