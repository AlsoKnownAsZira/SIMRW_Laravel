<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Keuangan;
use Carbon\Carbon;

class KeuanganSeeder extends Seeder
{
    public function run()
    {
        $keuangans = [
            [
                'jenis' => 'Masuk',
                'kategori' => 'Iuran',
                'detail' => 'Pembayaran iuran bulanan',
                'nominal' => 500000,
                'tanggal' => Carbon::create(2024, 1, 15),
            ],
            [
                'jenis' => 'Masuk',
                'kategori' => 'Donasi',
                'detail' => 'Donasi untuk program amal',
                'nominal' => 1000000,
                'tanggal' => Carbon::create(2024, 1, 20),
            ],
            [
                'jenis' => 'Keluar',
                'kategori' => 'Pembelian Barang',
                'detail' => 'Pembelian perlengkapan kantor',
                'nominal' => 500000,
                'tanggal' => Carbon::create(2024, 2, 3),
            ],
            [
                'jenis' => 'Keluar',
                'kategori' => 'Pembangunan Infrastruktur',
                'detail' => 'Pembangunan jalan',
                'nominal' => 5000000,
                'tanggal' => Carbon::create(2024, 2, 5),
            ],
            [
                'jenis' => 'Masuk',
                'kategori' => 'Bantuan Pemerintah',
                'detail' => 'Bantuan dari pemerintah',
                'nominal' => 15000000,
                'tanggal' => Carbon::create(2024, 2, 27),
            ],
            [
                'jenis' => 'Keluar',
                'kategori' => 'Biaya Operasional',
                'detail' => 'Pembayaran listrik jalan',
                'nominal' => 200000,
                'tanggal' => Carbon::create(2024, 3, 1),
            ],
            [
                'jenis' => 'Masuk',
                'kategori' => 'Sponsorship',
                'detail' => 'Sponsorship acara agustusan',
                'nominal' => 2000000,
                'tanggal' => Carbon::create(2024, 3, 17),
            ],
            [
                'jenis' => 'Keluar',
                'kategori' => 'Lainnya',
                'detail' => 'Biaya perbaikan jembatan',
                'nominal' => 3000000,
                'tanggal' => Carbon::create(2024, 4, 18),
            ],
            [
                'jenis' => 'Masuk',
                'kategori' => 'Iuran',
                'detail' => 'Pembayaran iuran bulanan',
                'nominal' => 500000,
                'tanggal' => Carbon::create(2024, 4, 20),
            ],
            [
                'jenis' => 'Keluar',
                'kategori' => 'Pembelian Barang',
                'detail' => 'Pembelian perlengkapan kantor',
                'nominal' => 350000,
                'tanggal' => Carbon::create(2024, 4, 25),
            ],
            [
                'jenis' => 'Masuk',
                'kategori' => 'Donasi',
                'detail' => 'Donasi untuk korban bencana alam',
                'nominal' => 800000,
                'tanggal' => Carbon::create(2024, 5, 11),
            ],
            [
                'jenis' => 'Keluar',
                'kategori' => 'Lainnya',
                'detail' => 'Biaya kebutuhan air desa',
                'nominal' => 450000,
                'tanggal' => Carbon::create(2024, 5, 14),
            ],
            [
                'jenis' => 'Masuk',
                'kategori' => 'Iuran',
                'detail' => 'Pembayaran iuran bulanan',
                'nominal' => 550000,
                'tanggal' => Carbon::create(2024, 6, 1),
            ],
            [
                'jenis' => 'Keluar',
                'kategori' => 'Pembelian Barang',
                'detail' => 'Pembelian perlengkapan acara',
                'nominal' => 1000000,
                'tanggal' => Carbon::create(2024, 6, 3),
            ],
            [
                'jenis' => 'Masuk',
                'kategori' => 'Donasi',
                'detail' => 'Donasi untuk program pendidikan',
                'nominal' => 1500000,
                'tanggal' => Carbon::create(2024, 6, 7),
            ],
            [
                'jenis' => 'Keluar',
                'kategori' => 'Biaya Operasional',
                'detail' => 'Pembayaran listrik',
                'nominal' => 255000,
                'tanggal' => Carbon::create(2024, 7, 8),
            ],
            [
                'jenis' => 'Masuk',
                'kategori' => 'Sponsorship',
                'detail' => 'Sponsorship acara olahraga',
                'nominal' => 5000000,
                'tanggal' => Carbon::create(2024, 7, 12),
            ],
            [
                'jenis' => 'Keluar',
                'kategori' => 'Pembangunan Infrastruktur',
                'detail' => 'Pembangunan gedung sekolah',
                'nominal' => 7000000,
                'tanggal' => Carbon::create(2024, 8, 10),
            ],
            [
                'jenis' => 'Masuk',
                'kategori' => 'Bantuan Pemerintah',
                'detail' => 'Bantuan program kesehatan',
                'nominal' => 3500000,
                'tanggal' => Carbon::create(2024, 8, 19),
            ],
            [
                'jenis' => 'Masuk',
                'kategori' => 'Iuran',
                'detail' => 'Pembayaran iuran bulanan',
                'nominal' => 550000,
                'tanggal' => Carbon::create(2024, 9, 1),
            ],
            [
                'jenis' => 'Masuk',
                'kategori' => 'Donasi',
                'detail' => 'Donasi untuk program kesehatan',
                'nominal' => 2000000,
                'tanggal' => Carbon::create(2024, 9, 25),
            ],
            [
                'jenis' => 'Keluar',
                'kategori' => 'Lainnya',
                'detail' => 'Biaya bensin untuk transportasi',
                'nominal' => 350000,
                'tanggal' => Carbon::create(2024, 10, 13),
            ],
            [
                'jenis' => 'Masuk',
                'kategori' => 'Iuran',
                'detail' => 'Pembayaran iuran bulanan',
                'nominal' => 600000,
                'tanggal' => Carbon::create(2024, 10, 20),
            ],
            [
                'jenis' => 'Masuk',
                'kategori' => 'Donasi',
                'detail' => 'Donasi untuk program sosial',
                'nominal' => 1200000,
                'tanggal' => Carbon::create(2024, 11, 3),
            ],
            [
                'jenis' => 'Masuk',
                'kategori' => 'Sponsorship',
                'detail' => 'Sponsorship acara seni',
                'nominal' => 1800000,
                'tanggal' => Carbon::create(2024, 12, 5),
            ],
            [
                'jenis' => 'Masuk',
                'kategori' => 'Iuran',
                'detail' => 'Pembayaran iuran bulanan',
                'nominal' => 600000,
                'tanggal' => Carbon::create(2024, 12, 15),
            ],
            [
                'jenis' => 'Keluar',
                'kategori' => 'Pembelian Barang',
                'detail' => 'Pembelian perlengkapan kantor',
                'nominal' => 400000,
                'tanggal' => Carbon::create(2024, 12, 16),
            ],
            [
                'jenis' => 'Masuk',
                'kategori' => 'Donasi',
                'detail' => 'Donasi untuk program pendidikan',
                'nominal' => 2000000,
                'tanggal' => Carbon::create(2024, 12, 20),
            ],
            [
                'jenis' => 'Keluar',
                'kategori' => 'Biaya Operasional',
                'detail' => 'Pembayaran listrik',
                'nominal' => 300000,
                'tanggal' => Carbon::create(2024, 12, 21),
            ],
            [
                'jenis' => 'Masuk',
                'kategori' => 'Sponsorship',
                'detail' => 'Sponsorship acara olahraga',
                'nominal' => 3000000,
                'tanggal' => Carbon::create(2024, 12, 22),
            ],
            [
                'jenis' => 'Keluar',
                'kategori' => 'Pembangunan Infrastruktur',
                'detail' => 'Pembangunan gedung sekolah',
                'nominal' => 8000000,
                'tanggal' => Carbon::create(2024, 12, 23),
            ],
            [
                'jenis' => 'Masuk',
                'kategori' => 'Bantuan Pemerintah',
                'detail' => 'Bantuan program kesehatan',
                'nominal' => 4000000,
                'tanggal' => Carbon::create(2024, 12, 24),
            ],
        ];

        foreach ($keuangans as $keuangan) {
            Keuangan::create($keuangan);
        }
    }
}
