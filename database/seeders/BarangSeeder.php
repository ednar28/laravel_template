<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Satuan;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $satuan = Satuan::get();

        Barang::factory()
            ->count(15)
            ->sequence(
                ...$satuan->map(fn (Satuan $satuan) => ['idsatuan' => $satuan->idsatuan])
            )
            ->create();
    }
}
