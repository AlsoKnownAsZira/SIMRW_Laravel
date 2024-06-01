<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('ALTER TABLE keuangans MODIFY jenis ENUM("Masuk", "Keluar")');
        DB::statement('ALTER TABLE keuangans MODIFY kategori ENUM("Iuran", "Donasi", "Sumbangan Acara", "Sponsorship", "Biaya Operasional", "Pembelian Barang", "Pembangunan Infrastruktur", "Bantuan Pemerintah", "Lainnya")');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE keuangans MODIFY jenis VARCHAR(255)');
        DB::statement('ALTER TABLE keuangans MODIFY kategori VARCHAR(255)');
    }
};
