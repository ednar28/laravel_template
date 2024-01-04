<?php

namespace Database\Factories;

use App\Models\Satuan;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        return [
            'idsatuan' => Satuan::factory(),
            'jenis' => 1,
            'nama' => fake()->words(random_int(1, 2), true),
            'harga' => random_int(1_000, 10_000),
            'stok' => random_int(100, 500)
        ];
    }
}
