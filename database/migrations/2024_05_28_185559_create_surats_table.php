<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->string('pemohon')->required();
            $table->string('nik')->required();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->required();
            $table->string('alamat')->required();
            $table->enum('perihal', ['pengantar', 'kelahiran','kematian','sktm'])->required();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
