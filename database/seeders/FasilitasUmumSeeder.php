<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FasilitasUmumSeeder extends Seeder
{
    public function run()
    {
        DB::table('fasilitas_umum')->insert([
            [
                'nama' => 'Balai Desa',
                'jenis' => 'Gedung Umum',
                'alamat' => 'Jl. Raya Desa No. 10',
                'rt' => 1,
                'rw' => 2,
                'kapasitas' => 200,
                'deskripsi' => 'Bangunan utama untuk kegiatan warga desa.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Lapangan Olahraga',
                'jenis' => 'Fasilitas Umum',
                'alamat' => 'Jl. Sudirman Desa',
                'rt' => 2,
                'rw' => 3,
                'kapasitas' => 150,
                'deskripsi' => 'Lapangan untuk sepak bola dan olahraga lainnya.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Ruang Rapat Desa',
                'jenis' => 'Ruang Pertemuan',
                'alamat' => 'Kantor Desa Lt. 2',
                'rt' => 1,
                'rw' => 1,
                'kapasitas' => 50,
                'deskripsi' => 'Ruang rapat untuk perangkat desa.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
