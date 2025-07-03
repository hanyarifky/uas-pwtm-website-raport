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
            $table->integer('pts_ganjil');
            $table->integer('pts_genap');
            $table->integer('uas');
            $table->integer('ukk');
            $table->integer('nilai_total');
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
