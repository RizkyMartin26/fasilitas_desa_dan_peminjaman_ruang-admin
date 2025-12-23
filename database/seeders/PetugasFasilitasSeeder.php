<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PetugasFasilitas;
use App\Models\FasilitasUmum;
use App\Models\Warga;

class PetugasFasilitasSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil ID yang valid (sesuai controller: exists)
        $fasilitasIds = FasilitasUmum::pluck('fasilitas_id')->toArray();
        $wargaIds     = Warga::pluck('warga_id')->toArray();

        // Pengaman kalau data induk belum ada
        if (empty($fasilitasIds) || empty($wargaIds)) {
            return;
        }

        $daftarPeran = [
            'Penanggung Jawab',
            'Petugas Kebersihan',
            'Petugas Keamanan',
            'Pengelola Fasilitas',
            'Petugas Lapangan',
        ];

        // 🔁 Buat 20 data petugas fasilitas
        for ($i = 1; $i <= 20; $i++) {
            PetugasFasilitas::create([
                'fasilitas_id'     => $fasilitasIds[array_rand($fasilitasIds)],
                'petugas_warga_id' => $wargaIds[array_rand($wargaIds)],
                'peran'            => $daftarPeran[array_rand($daftarPeran)],
            ]);
        }
    }
}
