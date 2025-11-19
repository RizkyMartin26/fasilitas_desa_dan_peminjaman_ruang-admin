<?php
namespace Database\Seeders;

use App\Models\FasilitasUmum;
use App\Models\PeminjamanFasilitas;
use App\Models\Warga;
use Illuminate\Database\Seeder;

class PeminjamanFasilitasSeeder extends Seeder
{
    public function run(): void
    {
        $warga     = Warga::all();
        $fasilitas = FasilitasUmum::all();

        if ($warga->count() == 0 || $fasilitas->count() == 0) {
            return;
        }

        for ($i = 0; $i < 100; $i++) {
            $tglPinjam  = now()->subDays(rand(1, 15));
            $tglKembali = rand(0, 1) ? $tglPinjam->copy()->addDays(rand(1, 14)) : null;

            PeminjamanFasilitas::create([
                'warga_id'     => $warga->random()->warga_id,
                'fasilitas_id' => $fasilitas->random()->fasilitas_id,
                'tgl_pinjam'   => $tglPinjam,
                'tgl_kembali'  => $tglKembali,
                'tujuan'       => 'Keperluan warga',
                'status'       => ['pending', 'setuju', 'tolak'][rand(0, 2)],
                'total_biaya'  => rand(10000, 100000),
            ]);
        }
    }
}
