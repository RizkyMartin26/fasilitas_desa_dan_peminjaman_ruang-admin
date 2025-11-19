<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WargaSeeder extends Seeder
{
    public function run(): void
    {
        $agama     = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];
        $pekerjaan = [
            'Karyawan Swasta', 'Wiraswasta', 'PNS', 'Mahasiswa',
            'Buruh', 'Ibu Rumah Tangga', 'Guru', 'Perawat',
            'Driver', 'Petani', 'Nelayan', 'Security',
        ];
        $namaDepanL    = ['Budi', 'Andi', 'Rizki', 'Doni', 'Fajar', 'Hendra', 'Joko', 'Reza', 'Bagus', 'Taufik'];
        $namaBelakangL = ['Saputra', 'Pratama', 'Firmansyah', 'Wijaya', 'Kurniawan', 'Setiawan'];

        $namaDepanP    = ['Siti', 'Ayu', 'Rina', 'Dewi', 'Putri', 'Lestari', 'Melati', 'Nadia', 'Vina', 'Anisa'];
        $namaBelakangP = ['Sari', 'Wulandari', 'Lestari', 'Anggraini', 'Putri', 'Kartika'];

        for ($i = 1; $i <= 100; $i++) {

            $jenisKelamin = rand(0, 1) ? "Laki-laki" : "Perempuan";

            if ($jenisKelamin === "Laki-laki") {
                $nama = $namaDepanL[array_rand($namaDepanL)] . ' ' .
                    $namaBelakangL[array_rand($namaBelakangL)];
            } else {
                $nama = $namaDepanP[array_rand($namaDepanP)] . ' ' .
                    $namaBelakangP[array_rand($namaBelakangP)];
            }

            DB::table('warga')->insert([
                'no_ktp'        => str_pad((string)rand(1000000000000000, 9999999999999999), 16, '0', STR_PAD_LEFT),
                'nama'          => $nama,
                'jenis_kelamin' => $jenisKelamin,
                'agama'         => $agama[array_rand($agama)],
                'pekerjaan'     => $pekerjaan[array_rand($pekerjaan)],
                'telp'          => '08' . rand(1000000000, 9999999999),
                'email'         => Str::lower(str_replace(' ', '', $nama)) . rand(1, 100) . '@gmail.com',
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }
    }
}
