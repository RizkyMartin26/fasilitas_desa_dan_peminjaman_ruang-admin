<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SyaratFasilitasSeeder extends Seeder
{
    public function run()
    {
        DB::table('syarat_fasilitas')->insert([
            [
                'fasilitas_id' => 1,
                'nama_syarat' => 'Fotokopi KTP',
                'deskripsi' => 'Peminjam wajib menyerahkan fotokopi KTP.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fasilitas_id' => 1,
                'nama_syarat' => 'Surat Permohonan',
                'deskripsi' => 'Surat permohonan resmi dari peminjam.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fasilitas_id' => 2,
                'nama_syarat' => 'Penggunaan Waktu',
                'deskripsi' => 'Lapangan hanya boleh digunakan hingga pukul 18:00.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'fasilitas_id' => 3,
                'nama_syarat' => 'Reservasi Minimal',
                'deskripsi' => 'Harus melakukan booking minimal H-2.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
