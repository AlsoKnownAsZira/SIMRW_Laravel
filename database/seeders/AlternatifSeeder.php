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
        $alternatif = [
            'Budi Santoso', 'Siti Aminah', 'Joko Widodo', 'Ahmad Fauzi', 'Dewi Sartika',
            'Rina Wulandari', 'Eko Prasetyo', 'Andi Susanto', 'Rudi Hartono', 'Sri Wahyuni',
            'Eka Surya', 'Agus Santoso', 'Rini Wulandari', 'Ahmad Bayu', 'Yanto Budiman',
            'Robby Kurniawan', 'Diana Sari', 'Irfan Saputra', 'Anisa Dewi', 'Ahmad Rifai',
            'Siti Rahmawati', 'Fahmi Setiawan', 'Rani Febrianti', 'Farhan Maulana', 'Lia Indah'
        ];

        // Memasukkan data ke dalam tabel alternatif
        foreach ($alternatif as $nama) {
            DB::table('alternatifs')->insert([
                'nama' => $nama,
            ]);
        }
    }
}
