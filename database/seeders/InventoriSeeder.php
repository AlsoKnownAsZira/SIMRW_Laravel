<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inventori;

class InventoriSeeder extends Seeder
{
    public function run(): void
    {
        $inventoris = [
            [
                'nama' => 'Pupuk Organik',
                'jumlah' => 1000,
                'deskripsi' => 'Pupuk organik untuk meningkatkan kesuburan tanah dan mendukung pertanian lokal.',
                'gambar' => 'https://media.karousell.com/media/photos/products/2023/2/11/inilah_jawaban_doa_dari_petani_1676125831_f2ad9228_progressive.jpg',
                //gambar masih bingung
            ],
            [
                'nama' => 'Benih Sayuran',
                'jumlah' => 500,
                'deskripsi' => 'Pak benih sayuran seperti tomat, cabai, dan kangkung untuk disalurkan kepada petani desa.',
                'gambar' => 'https://media.karousell.com/media/photos/products/2023/2/11/inilah_jawaban_doa_dari_petani_1676125831_f2ad9228_progressive.jpg', 
            ],
            [
                'nama' => 'Alat Pertanian',
                'jumlah' => 5,
                'deskripsi' => 'Set cangkul, sabit, garpu, dan sekop untuk digunakan dalam kegiatan pertanian.',
                'gambar' => 'https://media.karousell.com/media/photos/products/2023/2/11/inilah_jawaban_doa_dari_petani_1676125831_f2ad9228_progressive.jpg',
            ],
            [
                'nama' => 'Buku Pelajaran',
                'jumlah' => 50,
                'deskripsi' => 'Buku pelajaran untuk digunakan di sekolah-sekolah desa.',
                'gambar' => 'https://media.karousell.com/media/photos/products/2023/2/11/inilah_jawaban_doa_dari_petani_1676125831_f2ad9228_progressive.jpg',
            ],
            [
                'nama' => 'Perlengkapan Posyandu',
                'jumlah' => 3,
                'deskripsi' => 'Set timbangan bayi, termometer, dan alat pengukur tekanan darah untuk digunakan di posyandu desa.',
                'gambar' => 'https://media.karousell.com/media/photos/products/2023/2/11/inilah_jawaban_doa_dari_petani_1676125831_f2ad9228_progressive.jpg',
            ],
            [
                'nama' => 'Obat-obatan Umum',
                'jumlah' => 200,
                'deskripsi' => 'Pak obat-obatan umum seperti parasetamol dan antiseptik untuk disalurkan kepada warga desa.',
                'gambar' => 'https://media.karousell.com/media/photos/products/2023/2/11/inilah_jawaban_doa_dari_petani_1676125831_f2ad9228_progressive.jpg',
            ],
            [
                'nama' => 'Alat Kesehatan',
                'jumlah' => 17,
                'deskripsi' => 'Stetoskop, tensimeter, dan termometer digital untuk digunakan di puskesmas desa.',
                'gambar' => 'https://media.karousell.com/media/photos/products/2023/2/11/inilah_jawaban_doa_dari_petani_1676125831_f2ad9228_progressive.jpg',
            ],
            [
                'nama' => 'Bahan Bangunan',
                'jumlah' => 170,
                'deskripsi' => 'Kayu, semen, dan kawat untuk pembangunan dan perbaikan infrastruktur desa.',
                'gambar' => 'https://media.karousell.com/media/photos/products/2023/2/11/inilah_jawaban_doa_dari_petani_1676125831_f2ad9228_progressive.jpg',
            ],    
            [
                'nama' => 'Bibit Pohon',
                'jumlah' => 200,
                'deskripsi' => 'Bibit pohon lokal untuk program penghijauan dan penanaman pohon di sekitar desa.',
                'gambar' => 'https://media.karousell.com/media/photos/products/2023/2/11/inilah_jawaban_doa_dari_petani_1676125831_f2ad9228_progressive.jpg',
            ],
            [
                'nama' => 'Bahan Makanan',
                'jumlah' => 800,
                'deskripsi' => 'Beras, gula, dan minyak goreng untuk program bantuan pangan bagi keluarga kurang mampu di desa.',
                'gambar' => 'https://media.karousell.com/media/photos/products/2023/2/11/inilah_jawaban_doa_dari_petani_1676125831_f2ad9228_progressive.jpg',
            ],
        ];

        foreach ($inventoris as $inventori) {
            Inventori::create($inventori);
        }
    }
}
