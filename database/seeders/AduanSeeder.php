<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\data_aduan;

class AduanSeeder extends Seeder
{
    public function run(): void
    {
        $aduans = [
            [
                'judul' => 'Jalan Rusak di RT 02',
                'konten' => 'Jalan utama di RT 02 mengalami kerusakan parah dan memerlukan perbaikan segera.',
                'status' => 'valid',
                'user_id' => 3,
            ],
            [
                'judul' => 'Sampah Menumpuk di Pasar Desa',
                'konten' => 'Sampah di pasar desa belum diangkut selama seminggu dan menyebabkan bau tidak sedap.',
                'status' => 'dalam proses',
                'user_id' => 4,
            ],
            [
                'judul' => 'Lampu Jalan Mati',
                'konten' => 'Beberapa lampu jalan di sepanjang jalan menuju balai desa mati dan perlu segera diperbaiki.',
                'status' => 'valid',
                'user_id' => 5,
            ],
            [
                'judul' => 'Pengairan Sawah Tidak Lancar',
                'konten' => 'Saluran irigasi untuk sawah di dusun III tersumbat dan menyebabkan air tidak mengalir dengan baik.',
                'status' => 'dalam proses',
                'user_id' => 6,
            ],
            [
                'judul' => 'Gangguan Keamanan RT 03',
                'konten' => 'Terdapat laporan mengenai adanya gangguan keamanan di sekitar area pemukiman warga.',
                'status' => 'valid',
                'user_id' => 7,
            ],
            [
                'judul' => 'Kekurangan Air Bersih',
                'konten' => 'Warga di RT 04 mengalami kekurangan air bersih sejak seminggu terakhir.',
                'status' => 'valid',
                'user_id' => 8,
            ],
            [
                'judul' => 'Pohon Tumbang',
                'konten' => 'Sebuah pohon besar tumbang di jalan utama desa dan menghalangi akses kendaraan.',
                'status' => 'dalam proses',
                'user_id' => 9,
            ],
            [
                'judul' => 'Gangguan Listrik',
                'konten' => 'Beberapa rumah di dusun II mengalami gangguan listrik yang sering mati-mati.',
                'status' => 'valid',
                'user_id' => 10,
            ],
            [
                'judul' => 'Kebersihan Lingkungan',
                'konten' => 'Lingkungan sekitar balai desa memerlukan gotong royong untuk pembersihan.',
                'status' => 'dalam proses',
                'user_id' => 11,
            ],
            [
                'judul' => 'Perbaikan Jembatan RT 05',
                'konten' => 'Jembatan kecil menuju sawah warga mulai rapuh dan memerlukan perbaikan segera.',
                'status' => 'valid',
                'user_id' => 12,
            ],
        ];

        foreach ($aduans as $data_aduan) {
            data_aduan::create($data_aduan);
        }
    }
}
