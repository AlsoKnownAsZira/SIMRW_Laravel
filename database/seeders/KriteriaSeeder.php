<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data kriteria beserta bobot
        $kriteria = [
            ['nama' => 'Pemasukan Bulanan', 'bobot' => 0.3],
            ['nama' => 'Jumlah Tanggungan', 'bobot' => 0.2],
            ['nama' => 'Biaya Listrik Perbulan', 'bobot' => 0.05],
            ['nama' => 'Jenis Lantai Rumah', 'bobot' => 0.05],
            ['nama' => 'Jenis Pekerjaan', 'bobot' => 0.1],
            ['nama' => 'Usia', 'bobot' => 0.1],
            ['nama' => 'Cacat Fisik', 'bobot' => 0.2],
        ];

        // Memasukkan data ke dalam tabel kriteria
        foreach ($kriteria as $k) {
            DB::table('kriterias')->insert([
                'nama' => $k['nama'],
                'bobot' => $k['bobot'],
            ]);
        }
    }
}
