<?php

namespace Database\Seeders;

use App\Models\Penjualan;
use App\Models\User;
use Illuminate\Database\Seeder;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pembeli = User::firstWhere('username', 'pembeli');

        $penjualan = Penjualan::factory()
            ->count(4)
            ->create([
                'iduser' => $pembeli->iduser,
                'sub_total' => 0,
                'ppn' => 0,
                'total_nilai' => 0,
            ]);
    }
}
