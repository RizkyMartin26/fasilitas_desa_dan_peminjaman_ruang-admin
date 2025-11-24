<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Warga;
use App\Models\FasilitasUmum;
use App\Models\PeminjamanFasilitas;
use Faker\Factory as Faker;

class PeminjamanFasilitasSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $wargaIds     = Warga::pluck('warga_id')->toArray();
        $fasilitasIds = FasilitasUmum::pluck('fasilitas_id')->toArray();

        // Jika tabel warga atau fasilitas kosong → hentikan
        if (empty($wargaIds) || empty($fasilitasIds)) {
            dd("Seeder GAGAL: pastikan seeder Warga dan Fasilitas sudah dijalankan.");
        }

        for ($i = 1; $i <= 100; $i++) {

            // Waktu pinjam random 1–30 hari lalu
            $tglPinjam = $faker->dateTimeBetween('-30 days', 'now');

            // Waktu kembali 1–3 hari setelah pinjam
            $tglKembali = (clone $tglPinjam)->modify('+' . rand(1, 3) . ' days');

            PeminjamanFasilitas::create([
                'warga_id'      => $faker->randomElement($wargaIds),
                'fasilitas_id'  => $faker->randomElement($fasilitasIds),

                'tgl_pinjam'    => $tglPinjam,
                'tgl_kembali'   => $tglKembali,

                'tujuan'        => $faker->sentence(6),

                'status'        => $faker->randomElement(['pending', 'setuju', 'tolak']),

                // total biaya dinamis
                'total_biaya'   => rand(50000, 500000), // 50k – 500k
            ]);
        }
    }
}
