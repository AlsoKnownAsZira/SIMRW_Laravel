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
        DB::table('kriterias')->insert([
            ['nama' => 'Pemasukan Bulanan', 'bobot' => 0.3, 'is_benefit' => false],
            ['nama' => 'Jumlah Tanggungan', 'bobot' => 0.2, 'is_benefit' => true],
            ['nama' => 'Biaya Listrik Perbulan', 'bobot' => 0.05, 'is_benefit' => false],
            ['nama' => 'Jenis Lantai Rumah', 'bobot' => 0.05, 'is_benefit' => false],
            ['nama' => 'Jenis Pekerjaan', 'bobot' => 0.1, 'is_benefit' => false],
            ['nama' => 'Usia', 'bobot' => 0.1, 'is_benefit' => true],
            ['nama' => 'Cacat Fisik', 'bobot' => 0.2, 'is_benefit' => true],
        ]);
    }
}
