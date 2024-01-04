<?php

namespace Database\Seeders;

use App\Models\Satuan;
use Illuminate\Database\Seeder;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Satuan::factory()
            ->count(3)
            ->sequence(
                ['nama_satuan' => 'pcs'],
                ['nama_satuan' => 'lusin'],
                ['nama_satuan' => 'kodi'],
            )
            ->create();
    }
}
