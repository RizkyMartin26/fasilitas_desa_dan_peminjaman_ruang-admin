<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            WargaSeeder::class,
            FasilitasUmumSeeder::class,
            SyaratFasilitasSeeder::class,
            PeminjamanFasilitasSeeder::class,
            PembayaranFasilitasSeeder::class,
            PetugasFasilitasSeeder::class,
        ]);
    }
}
