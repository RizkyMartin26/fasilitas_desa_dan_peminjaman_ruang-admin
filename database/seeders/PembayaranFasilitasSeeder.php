<?php
namespace Database\Seeders;

use App\Models\PembayaranFasilitas;
use App\Models\PeminjamanFasilitas;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PembayaranFasilitasSeeder extends Seeder
{
    public function run(): void
    {
        $metodePembayaran = [
            'Tunai',
            'Transfer Bank',
            'QRIS',
            'E-Wallet',
        ];

        $pinjamIds = PeminjamanFasilitas::pluck('pinjam_id')->toArray();

        // Cegah error jika data peminjaman kosong
        if (empty($pinjamIds)) {
            return;
        }

        for ($i = 1; $i <= 20; $i++) {
            PembayaranFasilitas::create([
                'pinjam_id'  => $pinjamIds[array_rand($pinjamIds)],
                'tanggal'    => Carbon::now()->subDays(rand(0, 30)),
                'jumlah'     => rand(50_000, 500_000),
                'metode'     => $metodePembayaran[array_rand($metodePembayaran)],
                'keterangan' => 'Pembayaran peminjaman fasilitas ke-' . $i,
            ]);
        }
    }
}
