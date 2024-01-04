<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        [$admin, $pembeli] = Role::factory()
            ->count(2)
            ->sequence(
                ['nama_role' => 'Admin'],
                ['nama_role' => 'Pembeli'],
            )
            ->create();

        User::factory()
            ->count(2)
            ->sequence(
                [
                    'username' => 'admin',
                    'idrole' => $admin->idrole,
                ],
                [
                    'username' => 'pembeli',
                    'idrole' => $pembeli->idrole,
                ],
            )
            ->create();
    }
}
