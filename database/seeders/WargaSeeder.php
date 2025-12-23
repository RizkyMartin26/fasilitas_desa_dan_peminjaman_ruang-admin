<?php
namespace Database\Seeders;

use App\Models\Warga;
use Illuminate\Database\Seeder;

class WargaSeeder extends Seeder
{
    public function run(): void
    {
        $agamaList = [
            'Islam',
            'Kristen',
            'Katolik',
            'Hindu',
            'Buddha',
            'Konghucu',
        ];

        $pekerjaanList = [
            'Petani',
            'Pedagang',
            'Pegawai Negeri',
            'Karyawan Swasta',
            'Wiraswasta',
            'Pelajar',
            'Ibu Rumah Tangga',
        ];

        for ($i = 1; $i <= 20; $i++) {
            Warga::create([
                'no_ktp'        => '3201010101010' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'nama'          => 'Warga Desa ' . $i,
                'jenis_kelamin' => $i % 2 === 0 ? 'Perempuan' : 'Laki-laki',
                'agama'         => $agamaList[array_rand($agamaList)],
                'pekerjaan'     => $pekerjaanList[array_rand($pekerjaanList)],
                'telp'          => '08' . rand(1111111111, 9999999999),
                'email'         => 'warga' . $i . '@desa.test',
            ]);
        }
    }
}
