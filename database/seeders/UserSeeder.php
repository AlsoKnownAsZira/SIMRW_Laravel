<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'id' => 3,
                'username' => '1234567890123456',
                'name' => 'Budi Santoso',
                'password' => Hash::make('password'),
                'NIK' => '1234567890123456',
                'KK' => '6543210987654321',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1980-01-01',
                'agama' => 'Islam',
                'status_perkawinan' => 'Kawin',
                'status_hubungan' => 'Kepala Keluarga',
                'pekerjaan' => 'PNS',
                'tipe_warga' => 'Domisili Lokal',
                'jenis_kelamin' => 'Laki-laki',
                'golongan_darah' => 'O',
                'alamat' => 'Jl. Merdeka No.1',
                'remember_token' => Str::random(10),
            ],
            [
                'id' => 4,
                'username' => '1234567890123457',
                'name' => 'Siti Aminah',
                'password' => Hash::make('password'),
                'NIK' => '1234567890123457',
                'KK' => '6543210987654322',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1990-02-01',
                'agama' => 'Kristen',
                'status_perkawinan' => 'Belum Kawin',
                'status_hubungan' => 'Anak',
                'pekerjaan' => 'Swasta',
                'tipe_warga' => 'Domisili Lokal',
                'jenis_kelamin' => 'Perempuan',
                'golongan_darah' => 'A',
                'alamat' => 'Jl. Kebon Kacang No.2',
                'remember_token' => Str::random(10),
            ],
            [
                'id' => 5,
                'username' => '1234567890123458',
                'name' => 'Joko Widodo',
                'password' => Hash::make('password'),
                'NIK' => '1234567890123458',
                'KK' => '6543210987654323',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '1985-03-05',
                'agama' => 'Katolik',
                'status_perkawinan' => 'Kawin',
                'status_hubungan' => 'Istri',
                'pekerjaan' => 'Guru',
                'tipe_warga' => 'Domisili Lokal',
                'jenis_kelamin' => 'Laki-laki',
                'golongan_darah' => 'B',
                'alamat' => 'Jl. Diponegoro No.3',
                'remember_token' => Str::random(10),
            ],
            [
                'id' => 6,
                'username' => '1234567890123459',
                'name' => 'Ahmad Fauzi',
                'password' => Hash::make('password'),
                'NIK' => '1234567890123459',
                'KK' => '6543210987654324',
                'tempat_lahir' => 'Medan',
                'tanggal_lahir' => '1992-04-10',
                'agama' => 'Hindu',
                'status_perkawinan' => 'Cerai Hidup',
                'status_hubungan' => 'Anak',
                'pekerjaan' => 'Wiraswasta',
                'tipe_warga' => 'Domisili Lokal',
                'jenis_kelamin' => 'Laki-laki',
                'golongan_darah' => 'AB',
                'alamat' => 'Jl. Sudirman No.4',
                'remember_token' => Str::random(10),
            ],
            [
                'id' => 7,
                'username' => '1234567890123460',
                'name' => 'Dewi Sartika',
                'password' => Hash::make('password'),
                'NIK' => '1234567890123460',
                'KK' => '6543210987654325',
                'tempat_lahir' => 'Semarang',
                'tanggal_lahir' => '1988-05-15',
                'agama' => 'Budha',
                'status_perkawinan' => 'Cerai Mati',
                'status_hubungan' => 'Kepala Keluarga',
                'pekerjaan' => 'Dosen',
                'tipe_warga' => 'Domisili Lokal',
                'jenis_kelamin' => 'Perempuan',
                'golongan_darah' => 'O',
                'alamat' => 'Jl. Pahlawan No.5',
                'remember_token' => Str::random(10),
            ],
            [
                'id' => 8,
                'username' => '1234567890123461',
                'name' => 'Rina Wulandari',
                'password' => Hash::make('password'),
                'NIK' => '1234567890123461',
                'KK' => '6543210987654326',
                'tempat_lahir' => 'Yogyakarta',
                'tanggal_lahir' => '1982-06-20',
                'agama' => 'Konghucu',
                'status_perkawinan' => 'Kawin Belum Tercatat',
                'status_hubungan' => 'Istri',
                'pekerjaan' => 'Pegawai Bank',
                'tipe_warga' => 'Domisili Lokal',
                'jenis_kelamin' => 'Perempuan',
                'golongan_darah' => 'A',
                'alamat' => 'Jl. Malioboro No.6',
                'remember_token' => Str::random(10),
            ],
            [
                'id' => 9,
                'username' => '1234567890123462',
                'name' => 'Eko Prasetyo',
                'password' => Hash::make('password'),
                'NIK' => '1234567890123462',
                'KK' => '6543210987654327',
                'tempat_lahir' => 'Malang',
                'tanggal_lahir' => '1991-07-25',
                'agama' => 'Islam',
                'status_perkawinan' => 'Belum Kawin',
                'status_hubungan' => 'Anak',
                'pekerjaan' => 'Mahasiswa',
                'tipe_warga' => 'Non Domisili Lokal',
                'jenis_kelamin' => 'Laki-laki',
                'golongan_darah' => 'B',
                'alamat' => 'Jl. Ijen No.7',
                'remember_token' => Str::random(10),
            ],
            [
                'id' => 10,
                'username' => '1234567890123463',
                'name' => 'Andi Susanto',
                'password' => Hash::make('password'),
                'NIK' => '1234567890123463',
                'KK' => '6543210987654328',
                'tempat_lahir' => 'Bogor',
                'tanggal_lahir' => '1983-08-30',
                'agama' => 'Kristen',
                'status_perkawinan' => 'Kawin',
                'status_hubungan' => 'Kepala Keluarga',
                'pekerjaan' => 'Dokter',
                'tipe_warga' => 'Non Domisili Lokal',
                'jenis_kelamin' => 'Laki-laki',
                'golongan_darah' => 'O',
                'alamat' => 'Jl. Pajajaran No.8',
                'remember_token' => Str::random(10),
            ],
            [
                'id' => 11,
                'username' => '1234567890123464',
                'name' => 'Rudi Hartono',
                'password' => Hash::make('password'),
                'NIK' => '1234567890123464',
                'KK' => '6543210987654329',
                'tempat_lahir' => 'Solo',
                'tanggal_lahir' => '1987-09-04',
                'agama' => 'Katolik',
                'status_perkawinan' => 'Cerai Hidup',
                'status_hubungan' => 'Anak',
                'pekerjaan' => 'Pengusaha',
                'tipe_warga' => 'Domisili Lokal',
                'jenis_kelamin' => 'Laki-laki',
                'golongan_darah' => 'AB',
                'alamat' => 'Jl. Slamet Riyadi No.9',
                'remember_token' => Str::random(10),
            ],
            [
                'id' => 12,
                'username' => '1234567890123465',
                'name' => 'Sri Wahyuni',
                'password' => Hash::make('password'),
                'NIK' => '1234567890123465',
                'KK' => '6543210987654330',
                'tempat_lahir' => 'Balikpapan',
                'tanggal_lahir' => '1994-10-09',
                'agama' => 'Hindu',
                'status_perkawinan' => 'Kawin',
                'status_hubungan' => 'Istri',
                'pekerjaan' => 'Pegawai Swasta',
                'tipe_warga' => 'Domisili Lokal',
                'jenis_kelamin' => 'Perempuan',
                'golongan_darah' => 'A',
                'alamat' => 'Jl. Sudirman No.10',
                'remember_token' => Str::random(10),
            ],
           
            [
                'id' => 13,
                'username' => '1234567890123497',
                'name' => 'Eka Surya',
                'password' => Hash::make('password'),
                'NIK' => '1234567890123497',
                'KK' => '6543210987654335',
                'tempat_lahir' => 'Pontianak',
                'tanggal_lahir' => '1995-02-14',
                'agama' => 'Islam',
                'status_perkawinan' => 'Belum Kawin',
                'status_hubungan' => 'Anak',
                'pekerjaan' => 'Wiraswasta',
                'tipe_warga' => 'Domisili Lokal',
                'jenis_kelamin' => 'Laki-laki',
                'golongan_darah' => 'AB',
                'alamat' => 'Jl. Gajah Mada No.14',
                'remember_token' => Str::random(10),
            ],
            [
                'id' => 14,
                'username' => '1234567890123498',
                'name' => 'Agus Santoso',
                'password' => Hash::make('password'),
                'NIK' => '1234567890123498',
                'KK' => '6543210987654336',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1981-03-15',
                'agama' => 'Islam',
                'status_perkawinan' => 'Kawin',
                'status_hubungan' => 'Kepala Keluarga',
                'pekerjaan' => 'PNS',
                'tipe_warga' => 'Domisili Lokal',
                'jenis_kelamin' => 'Laki-laki',
                'golongan_darah' => 'O',
                'alamat' => 'Jl. Majapahit No.15',
                'remember_token' => Str::random(10),
            ],
            [
                'id' => 15,
                'username' => '1234567890123499',
                'name' => 'Rini Wulandari',
                'password' => Hash::make('password'),
                'NIK' => '1234567890123499',
                'KK' => '6543210987654337',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1984-04-16',
                'agama' => 'Kristen',
                'status_perkawinan' => 'Kawin',
                'status_hubungan' => 'Istri',
                'pekerjaan' => 'Guru',
                'tipe_warga' => 'Domisili Lokal',
                'jenis_kelamin' => 'Perempuan',
                'golongan_darah' => 'A',
                'alamat' => 'Jl. Cendrawasih No.16',
                'remember_token' => Str::random(10),
            ],
            [
                'id' => 16,
                'username' => '1234567890123500',
                'name' => 'Ahmad Bayu',
                'password' => Hash::make('password'),
                'NIK' => '1234567890123500',
                'KK' => '6543210987654338',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '1993-05-17',
                'agama' => 'Katolik',
                'status_perkawinan' => 'Belum Kawin',
                'status_hubungan' => 'Anak',
                'pekerjaan' => 'Mahasiswa',
                'tipe_warga' => 'Domisili Lokal',
                'jenis_kelamin' => 'Laki-laki',
                'golongan_darah' => 'B',
                'alamat' => 'Jl. Kartini No.17',
                'remember_token' => Str::random(10),
            ],
            [
                'id' => 17,
                'username' => '1234567890123501',
                'name' => 'Yanto Budiman',
                'password' => Hash::make('password'),
                'NIK' => '1234567890123501',
                'KK' => '6543210987654339',
                'tempat_lahir' => 'Medan',
                'tanggal_lahir' => '1988-06-18',
                'agama' => 'Hindu',
                'status_perkawinan' => 'Kawin',
                'status_hubungan' => 'Istri',
                'pekerjaan' => 'Pegawai Swasta',
                'tipe_warga' => 'Domisili Lokal',
                'jenis_kelamin' => 'Laki-laki',
                'golongan_darah' => 'O',
                'alamat' => 'Jl. Imam Bonjol No.18',
                'remember_token' => Str::random(10),
            ],
            [
                'id' => 18,
                'username' => '1234567890123502',
                'name' => 'Robby Kurniawan',
                'password' => Hash::make('password'),
                'NIK' => '1234567890123502',
                'KK' => '6543210987654340',
                'tempat_lahir' => 'Semarang',
                'tanggal_lahir' => '1992-07-19',
                'agama' => 'Budha',
                'status_perkawinan' => 'Cerai Hidup',
                'status_hubungan' => 'Anak',
                'pekerjaan' => 'Wiraswasta',
                'tipe_warga' => 'Non Domisili Lokal',
                'jenis_kelamin' => 'Laki-laki',
                'golongan_darah' => 'A',
                'alamat' => 'Jl. Diponegoro No.19',
                'remember_token' => Str::random(10),
            ],
            [
                'id' => 19,
                'username' => '1234567890123503',
                'name' => 'Diana Sari',
                'password' => Hash::make('password'),
                'NIK' => '1234567890123503',
                'KK' => '6543210987654341',
                'tempat_lahir' => 'Yogyakarta',
                'tanggal_lahir' => '1983-08-20',
                'agama' => 'Konghucu',
                'status_perkawinan' => 'Belum Kawin',
                'status_hubungan' => 'Anak',
                'pekerjaan' => 'Pegawai Bank',
                'tipe_warga' => 'Domisili Lokal',
                'jenis_kelamin' => 'Perempuan',
                'golongan_darah' => 'B',
                'alamat' => 'Jl. Malioboro No.20',
                'remember_token' => Str::random(10),
            ],
            [
                'id' => 20,
                'username' => '1234567890123504',
                'name' => 'Irfan Saputra',
                'password' => Hash::make('password'),
                'NIK' => '1234567890123504',
                'KK' => '6543210987654342',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1996-09-21',
                'agama' => 'Islam',
                'status_perkawinan' => 'Belum Kawin',
                'status_hubungan' => 'Anak',
                'pekerjaan' => 'Mahasiswa',
                'tipe_warga' => 'Non Domisili Lokal',
                'jenis_kelamin' => 'Laki-laki',
                'golongan_darah' => 'AB',
                'alamat' => 'Jl. Sudirman No.21',
                'remember_token' => Str::random(10),
            ],
            [
                'id' => 21,
                'username' => '1234567890123505',
                'name' => 'Anisa Dewi',
                'password' => Hash::make('password'),
                'NIK' => '1234567890123505',
                'KK' => '6543210987654343',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '1997-10-22',
                'agama' => 'Kristen',
                'status_perkawinan' => 'Belum Kawin',
                'status_hubungan' => 'Anak',
                'pekerjaan' => 'Pegawai Swasta',
                'tipe_warga' => 'Domisili Lokal',
                'jenis_kelamin' => 'Perempuan',
                'golongan_darah' => 'O',
                'alamat' => 'Jl. Kaliurang No.22',
                'remember_token' => Str::random(10),
            ],
            [
                'id' => 22,
                'username' => '1234567890123506',
                'name' => 'Ahmad Rifai',
                'password' => Hash::make('password'),
                'NIK' => '1234567890123506',
                'KK' => '6543210987654344',
                'tempat_lahir' => 'Semarang',
                'tanggal_lahir' => '1985-11-23',
                'agama' => 'Islam',
                'status_perkawinan' => 'Kawin',
                'status_hubungan' => 'Istri',
                'pekerjaan' => 'PNS',
                'tipe_warga' => 'Domisili Lokal',
                'jenis_kelamin' => 'Laki-laki',
                'golongan_darah' => 'A',
                'alamat' => 'Jl. Gatot Subroto No.23',
                'remember_token' => Str::random(10),
            ],       
            [
                'id' => 23,
                'username' => '1234567890123507',
                'name' => 'Siti Rahmawati',
                'password' => Hash::make('password'),
                'NIK' => '1234567890123507',
                'KK' => '6543210987654345',
                'tempat_lahir' => 'Yogyakarta',
                'tanggal_lahir' => '1998-12-24',
                'agama' => 'Katolik',
                'status_perkawinan' => 'Belum Kawin',
                'status_hubungan' => 'Anak',
                'pekerjaan' => 'Mahasiswa',
                'tipe_warga' => 'Non Domisili Lokal',
                'jenis_kelamin' => 'Perempuan',
                'golongan_darah' => 'B',
                'alamat' => 'Jl. Malioboro No.24',
                'remember_token' => Str::random(10),
            ],
            [
                'id' => 24,
                'username' => '1234567890123508',
                'name' => 'Fahmi Setiawan',
                'password' => Hash::make('password'),
                'NIK' => '1234567890123508',
                'KK' => '6543210987654346',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '1999-01-25',
                'agama' => 'Islam',
                'status_perkawinan' => 'Belum Kawin',
                'status_hubungan' => 'Anak',
                'pekerjaan' => 'Pegawai Swasta',
                'tipe_warga' => 'Domisili Lokal',
                'jenis_kelamin' => 'Laki-laki',
                'golongan_darah' => 'AB',
                'alamat' => 'Jl. Cihampelas No.25',
                'remember_token' => Str::random(10),
            ],
            [
                'id' => 25,
                'username' => '1234567890123509',
                'name' => 'Rani Febrianti',
                'password' => Hash::make('password'),
                'NIK' => '1234567890123509',
                'KK' => '6543210987654347',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '2000-02-26',
                'agama' => 'Kristen',
                'status_perkawinan' => 'Belum Kawin',
                'status_hubungan' => 'Anak',
                'pekerjaan' => 'Pelajar',
                'tipe_warga' => 'Domisili Lokal',
                'jenis_kelamin' => 'Perempuan',
                'golongan_darah' => 'O',
                'alamat' => 'Jl. Darmo No.26',
                'remember_token' => Str::random(10),
            ],
            [
                'id' => 26,
                'username' => '1234567890123510',
                'name' => 'Farhan Maulana',
                'password' => Hash::make('password'),
                'NIK' => '1234567890123510',
                'KK' => '6543210987654348',
                'tempat_lahir' => 'Semarang',
                'tanggal_lahir' => '2001-03-27',
                'agama' => 'Islam',
                'status_perkawinan' => 'Belum Kawin',
                'status_hubungan' => 'Anak',
                'pekerjaan' => 'Pelajar',
                'tipe_warga' => 'Domisili Lokal',
                'jenis_kelamin' => 'Laki-laki',
                'golongan_darah' => 'A',
                'alamat' => 'Jl. Gajah Mada No.27',
                'remember_token' => Str::random(10),
            ],
            [
                'id' => 27,
                'username' => '1234567890123511',
                'name' => 'Lia Indah',
                'password' => Hash::make('password'),
                'NIK' => '1234567890123511',
                'KK' => '6543210987654349',
                'tempat_lahir' => 'Yogyakarta',
                'tanggal_lahir' => '2002-04-28',
                'agama' => 'Budha',
                'status_perkawinan' => 'Belum Kawin',
                'status_hubungan' => 'Anak',
                'pekerjaan' => 'Pelajar',
                'tipe_warga' => 'Domisili Lokal',
                'jenis_kelamin' => 'Perempuan',
                'golongan_darah' => 'B',
                'alamat' => 'Jl. Sudirman No.28',
                'remember_token' => Str::random(10),
            ],
                 
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }
    }
}