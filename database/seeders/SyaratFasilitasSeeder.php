<?php
namespace Database\Seeders;

use App\Models\FasilitasUmum;
use App\Models\SyaratFasilitas;
use Illuminate\Database\Seeder;

class SyaratFasilitasSeeder extends Seeder
{
    public function run(): void
    {
        $daftarSyarat = [
            'Fotokopi KTP peminjam',
            'Surat izin dari RT/RW',
            'Mengisi formulir peminjaman',
            'Menjaga kebersihan fasilitas',
            'Tidak merusak sarana prasarana',
            'Mengembalikan fasilitas tepat waktu',
            'Melampirkan surat kegiatan',
            'Membayar biaya peminjaman',
        ];

        $fasilitasIds = FasilitasUmum::pluck('fasilitas_id')->toArray();

        // Cegah error jika fasilitas kosong
        if (empty($fasilitasIds)) {
            return;
        }

        for ($i = 1; $i <= 20; $i++) {
            SyaratFasilitas::create([
                'fasilitas_id' => $fasilitasIds[array_rand($fasilitasIds)],
                'nama_syarat'  => $daftarSyarat[array_rand($daftarSyarat)],
                'deskripsi'    => 'Syarat peminjaman fasilitas umum desa ke-' . $i .
                ' yang wajib dipenuhi oleh peminjam.',
            ]);
        }
    }
}
