<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data alternatif
        $alternatif = ['Asep', 'Wawan', 'Sutoyo', 'Wahyu', 'Marni'];

        // Memasukkan data ke dalam tabel alternatif
        foreach ($alternatif as $nama) {
            DB::table('alternatifs')->insert([
                'nama' => $nama,
            ]);
        }
    }
}
