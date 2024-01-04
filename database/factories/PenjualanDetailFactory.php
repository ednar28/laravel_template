<?php

namespace Database\Factories;

use App\Models\Barang;
use App\Models\Penjualan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PenjualanDetail>
 */
class PenjualanDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'penjualan_idpenjualan' => Penjualan::factory(),
            'idbarang' => Barang::factory(),
            'harga_satuan' => function (array $attributes) {
                $barang = Barang::firstWhere('idbarang', $attributes['idbarang']);
                return $barang->harga_satuan;
            },
            'jumlah' => random_int(1, 5),
            'sub_total' => fn (array $attributes) => $attributes['harga_satuan'] * $attributes['jumlah']
        ];
    }
}
