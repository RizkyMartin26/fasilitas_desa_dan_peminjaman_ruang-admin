<?php
namespace Database\Seeders;

use App\Models\FasilitasUmum;
use App\Models\PetugasFasilitas;
use App\Models\Warga;
use Illuminate\Database\Seeder;

class PetugasFasilitasSeeder extends Seeder
{
    public function run(): void
    {
        $peranPetugas = [
            'Penanggung Jawab',
            'Pengelola',
            'Petugas Kebersihan',
            'Petugas Keamanan',
            'Koordinator',
        ];

        $fasilitasIds = FasilitasUmum::pluck('fasilitas_id')->toArray();
        $wargaIds     = Warga::pluck('warga_id')->toArray();

        // Cegah error jika data kosong
        if (empty($fasilitasIds) || empty($wargaIds)) {
            return;
        }

        for ($i = 1; $i <= 20; $i++) {
            PetugasFasilitas::create([
                'fasilitas_id'     => $fasilitasIds[array_rand($fasilitasIds)],
                'petugas_warga_id' => $wargaIds[array_rand($wargaIds)],
                'peran'            => $peranPetugas[array_rand($peranPetugas)],
            ]);
        }
    }
}
