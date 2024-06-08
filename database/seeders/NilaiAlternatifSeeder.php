<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NilaiAlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nilai_alternatifs')->insert([
            ['id' => 1, 'alternatif_id' => 1, 'kriteria_id' => 1, 'nilai' => 4.00, 'created_at' => '2024-06-04 19:33:29', 'updated_at' => '2024-06-04 19:33:29'],
            ['id' => 2, 'alternatif_id' => 1, 'kriteria_id' => 2, 'nilai' => 3.00, 'created_at' => '2024-06-04 19:33:44', 'updated_at' => '2024-06-04 19:33:44'],
            ['id' => 3, 'alternatif_id' => 1, 'kriteria_id' => 3, 'nilai' => 3.00, 'created_at' => '2024-06-04 19:34:10', 'updated_at' => '2024-06-04 19:34:10'],
            ['id' => 4, 'alternatif_id' => 1, 'kriteria_id' => 4, 'nilai' => 3.00, 'created_at' => '2024-06-04 19:34:33', 'updated_at' => '2024-06-04 19:34:33'],
            ['id' => 5, 'alternatif_id' => 1, 'kriteria_id' => 5, 'nilai' => 5.00, 'created_at' => '2024-06-04 19:34:56', 'updated_at' => '2024-06-04 19:34:56'],
            ['id' => 6, 'alternatif_id' => 1, 'kriteria_id' => 6, 'nilai' => 5.00, 'created_at' => '2024-06-04 19:35:17', 'updated_at' => '2024-06-04 19:35:17'],
            ['id' => 7, 'alternatif_id' => 1, 'kriteria_id' => 7, 'nilai' => 1.00, 'created_at' => '2024-06-04 19:35:30', 'updated_at' => '2024-06-04 19:35:30'],
            ['id' => 8, 'alternatif_id' => 2, 'kriteria_id' => 1, 'nilai' => 2.00, 'created_at' => '2024-06-04 19:36:36', 'updated_at' => '2024-06-04 19:36:36'],
            ['id' => 9, 'alternatif_id' => 2, 'kriteria_id' => 2, 'nilai' => 2.00, 'created_at' => '2024-06-04 19:36:50', 'updated_at' => '2024-06-04 19:36:50'],
            ['id' => 10, 'alternatif_id' => 2, 'kriteria_id' => 3, 'nilai' => 3.00, 'created_at' => '2024-06-04 19:37:04', 'updated_at' => '2024-06-04 19:37:04'],
            ['id' => 11, 'alternatif_id' => 2, 'kriteria_id' => 4, 'nilai' => 3.00, 'created_at' => '2024-06-04 19:37:22', 'updated_at' => '2024-06-04 19:37:22'],
            ['id' => 12, 'alternatif_id' => 2, 'kriteria_id' => 5, 'nilai' => 4.00, 'created_at' => '2024-06-04 19:38:06', 'updated_at' => '2024-06-04 19:38:06'],
            ['id' => 13, 'alternatif_id' => 2, 'kriteria_id' => 6, 'nilai' => 3.00, 'created_at' => '2024-06-04 19:39:39', 'updated_at' => '2024-06-04 19:39:39'],
            ['id' => 14, 'alternatif_id' => 2, 'kriteria_id' => 7, 'nilai' => 3.00, 'created_at' => '2024-06-04 19:39:50', 'updated_at' => '2024-06-04 19:39:50'],
            ['id' => 18, 'alternatif_id' => 3, 'kriteria_id' => 1, 'nilai' => 5.00, 'created_at' => '2024-06-05 19:04:05', 'updated_at' => '2024-06-05 19:04:05'],
            ['id' => 19, 'alternatif_id' => 3, 'kriteria_id' => 2, 'nilai' => 2.00, 'created_at' => '2024-06-05 19:04:05', 'updated_at' => '2024-06-05 19:04:05'],
            ['id' => 20, 'alternatif_id' => 3, 'kriteria_id' => 3, 'nilai' => 2.00, 'created_at' => '2024-06-05 19:10:59', 'updated_at' => '2024-06-05 19:10:59'],
            ['id' => 21, 'alternatif_id' => 3, 'kriteria_id' => 4, 'nilai' => 2.00, 'created_at' => '2024-06-05 19:10:59', 'updated_at' => '2024-06-05 19:10:59'],
            ['id' => 22, 'alternatif_id' => 3, 'kriteria_id' => 5, 'nilai' => 4.00, 'created_at' => '2024-06-05 19:12:17', 'updated_at' => '2024-06-05 19:12:17'],
            ['id' => 23, 'alternatif_id' => 3, 'kriteria_id' => 6, 'nilai' => 3.00, 'created_at' => '2024-06-05 19:17:55', 'updated_at' => '2024-06-05 19:17:55'],
            ['id' => 24, 'alternatif_id' => 3, 'kriteria_id' => 7, 'nilai' => 1.00, 'created_at' => '2024-06-05 19:19:31', 'updated_at' => '2024-06-05 19:19:31'],
            ['id' => 25, 'alternatif_id' => 4, 'kriteria_id' => 1, 'nilai' => 3.00, 'created_at' => '2024-06-05 20:49:12', 'updated_at' => '2024-06-05 20:49:12'],
            ['id' => 26, 'alternatif_id' => 4, 'kriteria_id' => 2, 'nilai' => 4.00, 'created_at' => '2024-06-05 20:49:12', 'updated_at' => '2024-06-05 20:49:12'],
            ['id' => 27, 'alternatif_id' => 4, 'kriteria_id' => 3, 'nilai' => 1.00, 'created_at' => '2024-06-05 20:49:12', 'updated_at' => '2024-06-05 20:49:12'],
            ['id' => 28, 'alternatif_id' => 4, 'kriteria_id' => 4, 'nilai' => 3.00, 'created_at' => '2024-06-05 20:49:12', 'updated_at' => '2024-06-05 20:49:12'],
            ['id' => 29, 'alternatif_id' => 4, 'kriteria_id' => 5, 'nilai' => 5.00, 'created_at' => '2024-06-05 20:49:12', 'updated_at' => '2024-06-05 20:49:12'],
            ['id' => 30, 'alternatif_id' => 4, 'kriteria_id' => 6, 'nilai' => 5.00, 'created_at' => '2024-06-05 20:49:12', 'updated_at' => '2024-06-05 20:49:12'],
            ['id' => 31, 'alternatif_id' => 4, 'kriteria_id' => 7, 'nilai' => 1.00, 'created_at' => '2024-06-05 20:49:12', 'updated_at' => '2024-06-05 20:49:12'],
            ['id' => 32, 'alternatif_id' => 5, 'kriteria_id' => 1, 'nilai' => 4.00, 'created_at' => '2024-06-05 20:52:59', 'updated_at' => '2024-06-05 20:52:59'],
            ['id' => 33, 'alternatif_id' => 5, 'kriteria_id' => 2, 'nilai' => 4.00, 'created_at' => '2024-06-05 20:52:59', 'updated_at' => '2024-06-05 20:52:59'],
            ['id' => 34, 'alternatif_id' => 5, 'kriteria_id' => 3, 'nilai' => 4.00, 'created_at' => '2024-06-05 20:52:59', 'updated_at' => '2024-06-05 20:52:59'],
            ['id' => 35, 'alternatif_id' => 5, 'kriteria_id' => 4, 'nilai' => 3.00, 'created_at' => '2024-06-05 20:52:59', 'updated_at' => '2024-06-05 20:52:59'],
            ['id' => 36, 'alternatif_id' => 5, 'kriteria_id' => 5, 'nilai' => 2.00, 'created_at' => '2024-06-05 20:52:59', 'updated_at' => '2024-06-05 20:52:59'],
            ['id' => 37, 'alternatif_id' => 5, 'kriteria_id' => 6, 'nilai' => 4.00, 'created_at' => '2024-06-05 20:52:59', 'updated_at' => '2024-06-05 20:52:59'],
            ['id' => 38, 'alternatif_id' => 5, 'kriteria_id' => 7, 'nilai' => 1.00, 'created_at' => '2024-06-05 20:52:59', 'updated_at' => '2024-06-05 20:52:59'],
        ]);
    }
}
