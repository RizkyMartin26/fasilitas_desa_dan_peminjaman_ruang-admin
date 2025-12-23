<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WargaSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('warga')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        for ($i = 1; $i <= 10; $i++) {

            $noKtp = '320101' . str_pad($i, 10, '0', STR_PAD_LEFT);

            DB::table('warga')->insert([
                'no_ktp' => $noKtp,
                'nama' => 'Warga ' . $i,
                'jenis_kelamin' => $i % 2 === 0 ? 'L' : 'P',
                'agama' => 'Islam',
                'pekerjaan' => 'Petani',
                'telp' => '081234567' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'email' => 'warga' . $i . '@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
