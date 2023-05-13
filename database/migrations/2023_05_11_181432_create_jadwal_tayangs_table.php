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
        Schema::create('jadwal_tayangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ruang_id')->constrained('ruang_bioskops')->onDelete('cascade')->onUpdate('cascade');
            $table->string('harga_tiket');
            $table->string('tanggal_tayang');
            $table->string('waktu_tayang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_tayangs');
    }
};
