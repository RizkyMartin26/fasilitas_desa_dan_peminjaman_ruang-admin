<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class WargaSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID'); // 🔥 faker Indonesia

        $agama = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];

        $pekerjaan = [
            'Karyawan Swasta', 'Wiraswasta', 'PNS', 'Mahasiswa', 'Buruh',
            'Ibu Rumah Tangga', 'Guru', 'Perawat', 'Driver',
            'Petani', 'Nelayan', 'Security',
        ];

        for ($i = 1; $i <= 100; $i++) {

            $jenisKelamin = $faker->randomElement(['Laki-laki', 'Perempuan']);

            // 🔥 Nama Indonesia asli dari Faker
            if ($jenisKelamin === 'Laki-laki') {
                $nama = $faker->name('male');
            } else {
                $nama = $faker->name('female');
            }

            DB::table('warga')->insert([
                // 🔥 Nomor KTP 16 digit Indonesia
                'no_ktp'        => $faker->numerify('################'),

                'nama'          => $nama,
                'jenis_kelamin' => $jenisKelamin,
                'agama'         => $faker->randomElement($agama),
                'pekerjaan'     => $faker->randomElement($pekerjaan),

                // 🔥 Nomor telepon Indonesia
                'telp'          => $faker->phoneNumber(),

                // 🔥 Email otomatis dari Faker
                'email'         => $faker->unique()->safeEmail(),

                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }
    }
}
