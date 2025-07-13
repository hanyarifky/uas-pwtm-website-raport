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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('mata_pelajaran_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->integer('nilai_angka_pengetahuan');
            $table->enum('nilai_predikat_pengetahuan', ['A', 'B', 'C', 'D', '-'])->default('-');
            $table->string('deskripsi_pengetahuan');
            $table->integer('nilai_angka_keterampilan');
            $table->enum('nilai_predikat_keterampilan', ['A', 'B', 'C', 'D', '-'])->default('-');;
            $table->string('deskripsi_keterampilan');
            $table->integer('nilai_rata_rata');
            $table->integer('nilai_total');
            $table->enum('keterangan', ["Terpenuhi", "Tidak Terpenuhi", "Belum di nilai"])->default("Belum di nilai");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
