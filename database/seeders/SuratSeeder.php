<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Surat;

class SuratSeeder extends Seeder
{
    public function run(): void
    {
        $surats = [
            [
                'pemohon' => 'Siti Aminah',
                'nik' => '1234567890123457',
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'Jl. Kebon Kacang No.2',
                'perihal' => 'pengantar',
            ],
            [
                'pemohon' => 'Dewi Sartika',
                'nik' => '1234567890123460',
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'Jl. Pahlawan No.5',
                'perihal' => 'pengantar',
            ],
            [
                'pemohon' => 'Rina Wulandari',
                'nik' => '1234567890123461',
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'Jl. Malioboro No.6',
                'perihal' => 'kelahiran',
            ],
            [
                'pemohon' => 'Sri Wahyuni',
                'nik' => '1234567890123465',
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'Jl. Sudirman No.10',
                'perihal' => 'kelahiran',
            ],
            [
                'pemohon' => 'Rini Wulandari',
                'nik' => '1234567890123499',
                'jenis_kelamin' => 'Perempuan',
                'alamat' => 'Jl. Cendrawasih No.16',
                'perihal' => 'sktm',
            ],
            [
                'pemohon' => 'Ahmad Fauzi',
                'nik' => '1234567890123459',
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'Jl. Sudirman No.10',
                'perihal' => 'kematian',
            ],
            [
                'pemohon' => 'Yanto Budiman',
                'nik' => '1234567890123501',
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'Jl. Imam Bonjol No.18',
                'perihal' => 'kematian',
            ],
            [
                'pemohon' => 'Robby Kurniawan',
                'nik' => '1234567890123502',
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'Jl. Diponegoro No.19',
                'perihal' => 'pengantar',
            ],
            [
                'pemohon' => 'Irfan Saputra',
                'nik' => '1234567890123504',
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'Jl. Sudirman No.21',
                'perihal' => 'pengantar',
            ],
            [
                'pemohon' => 'Ahmad Rifai',
                'nik' => '1234567890123506',
                'jenis_kelamin' => 'Laki-laki',
                'alamat' => 'Jl. Gatot Subroto No.23',
                'perihal' => 'sktm',
            ],
        ];

        foreach ($surats as $surat) {
            Surat::create($surat);
        }
    }
}
