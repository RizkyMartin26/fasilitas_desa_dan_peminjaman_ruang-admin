<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FasilitasUmum;

class FasilitasUmumSeeder extends Seeder
{
    public function run(): void
    {
        $jenisFasilitas = [
            'Balai Desa',
            'Lapangan',
            'Gedung Pertemuan',
            'Posyandu',
            'Perpustakaan',
            'Aula',
            'Ruang Serbaguna'
        ];

        for ($i = 1; $i <= 20; $i++) {
            FasilitasUmum::create([
                'nama' => 'Fasilitas Umum ' . $i,
                'jenis' => $jenisFasilitas[array_rand($jenisFasilitas)],
                'alamat' => 'Jl. Desa Makmur No. ' . $i,
                'rt' => str_pad(rand(1, 10), 3, '0', STR_PAD_LEFT),
                'rw' => str_pad(rand(1, 5), 3, '0', STR_PAD_LEFT),
                'kapasitas' => rand(30, 300),
                'deskripsi' => 'Fasilitas umum desa yang digunakan untuk kegiatan masyarakat, rapat warga, dan acara sosial ke-' . $i,
            ]);
        }
    }
}
