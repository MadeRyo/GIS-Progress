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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ruang_id')->constrained('ruang_bioskops')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama');
            $table->string('judul_film');
            $table->string('genre');
            $table->string('sutradara');
            $table->string('pemeran');
            $table->string('durasi');
            $table->string('rating');
            $table->string('sinopsis');
            $table->string('tanggal_rilis');
            $table->string('gambar_poster');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
