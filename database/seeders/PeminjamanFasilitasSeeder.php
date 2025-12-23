<?php
namespace Database\Seeders;

use App\Models\FasilitasUmum;
use App\Models\PeminjamanFasilitas;
use App\Models\Warga;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PeminjamanFasilitasSeeder extends Seeder
{
    public function run(): void
    {
        $statusList = [
            'Menunggu',
            'Disetujui',
            'Ditolak',
            'Selesai',
        ];

        $tujuanList = [
            'Rapat warga',
            'Acara pernikahan',
            'Kegiatan PKK',
            'Pelatihan desa',
            'Kegiatan olahraga',
            'Acara keagamaan',
        ];

        $fasilitasIds = FasilitasUmum::pluck('fasilitas_id')->toArray();
        $wargaIds     = Warga::pluck('warga_id')->toArray();

        // Cegah error kalau data master kosong
        if (empty($fasilitasIds) || empty($wargaIds)) {
            return;
        }

        for ($i = 1; $i <= 20; $i++) {
            $mulai   = Carbon::now()->addDays(rand(-30, 10));
            $selesai = (clone $mulai)->addDays(rand(1, 3));

            PeminjamanFasilitas::create([
                'fasilitas_id'    => $fasilitasIds[array_rand($fasilitasIds)],
                'warga_id'        => $wargaIds[array_rand($wargaIds)],
                'tanggal_mulai'   => $mulai,
                'tanggal_selesai' => $selesai,
                'tujuan'          => $tujuanList[array_rand($tujuanList)],
                'status'          => $statusList[array_rand($statusList)],
                'total_biaya'     => rand(100_000, 1_000_000),
            ]);
        }
    }
}
