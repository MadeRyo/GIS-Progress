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
        Schema::create('ruang_bioskops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bioskop_id')->constrained('bioskops')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_ruang');
            $table->string('kapasitas_ruang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruang_bioskops');
    }
};
