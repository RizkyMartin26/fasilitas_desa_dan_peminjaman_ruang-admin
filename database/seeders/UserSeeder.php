<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // =====================================================================
        // 1. ADMIN UTAMA (ANTI DUPLIKAT)
        // =====================================================================
        User::updateOrCreate(
            ['email' => 'martin@gmail.com'], // UNIQUE KEY
            [
                'name'     => 'Pastor Martin PS',
                'password' => Hash::make('martin123'),
                'role'     => 'admin',
            ]
        );

        // =====================================================================
        // 2. USER FAKE (ANTI DUPLIKAT EMAIL)
        // =====================================================================
        for ($i = 1; $i <= 10; $i++) {
            User::updateOrCreate(
                ['email' => $faker->unique()->safeEmail()],
                [
                    'name'     => $faker->name(),
                    'password' => Hash::make('Admin123'),
                    'role'     => $faker->randomElement(['admin', 'petugas']),
                ]
            );
        }
    }
}
