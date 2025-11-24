<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FasilitasUmumSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Banyak jenis ruangan/fasilitas umum
        $jenisFasilitas = [
            'Ruang Rapat',
            'Aula Serbaguna',
            'Lapangan Futsal',
            'Lapangan Badminton',
            'Lapangan Basket',
            'Gedung Serbaguna',
            'Ruang Kelas',
            'Ruang Belajar',
            'Ruang Kesehatan',
            'Balai Warga',
            'Co-working Space',
            'Taman Bermain',
            'Kolam Renang Umum',
            'Ruang Musik',
            'Studio Foto',
            'Perpustakaan Mini',
            'Ruang Karang Taruna',
            'Ruang PKK',
            'Ruang Posyandu',
            'Gazebo Taman',
        ];

        for ($i = 1; $i <= 5; $i++) {

            $jenis = $faker->randomElement($jenisFasilitas);

            // Kapasitas menyesuaikan jenis ruangan
            $kapasitas = match ($jenis) {
                'Lapangan Futsal',
                'Lapangan Basket',
                'Lapangan Badminton' => rand(20, 50),

                'Aula Serbaguna',
                'Gedung Serbaguna' => rand(100, 500),

                'Ruang Rapat',
                'Ruang Kelas',
                'Co-working Space',
                'Ruang Karang Taruna',
                'Ruang PKK',
                'Ruang Posyandu' => rand(10, 40),

                'Studio Foto',
                'Ruang Musik' => rand(5, 20),

                'Perpustakaan Mini' => rand(10, 30),

                'Taman Bermain',
                'Gazebo Taman' => rand(5, 15),

                'Kolam Renang Umum' => rand(30, 200),

                default => rand(10, 100),
            };

            DB::table('fasilitas_umum')->insert([
                'nama'      => $jenis . ' ' . $faker->streetSuffix(),
                'jenis'     => $jenis,

                // Alamat Indonesia
                'alamat'    => $faker->streetAddress(),
                'rt'        => $faker->numberBetween(1, 10),
                'rw'        => $faker->numberBetween(1, 10),

                'kapasitas' => $kapasitas,
                'deskripsi' => $faker->sentence(15),

                // Media: random image
                'media'     => 'https://picsum.photos/seed/' . rand(1, 9999) . '/600/400',

                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
