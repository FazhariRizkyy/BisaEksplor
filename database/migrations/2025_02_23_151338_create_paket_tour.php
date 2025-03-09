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
        Schema::create('paket_tour', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket');
            $table->text('deskripsi_tour');
            $table->string('lokasi_tour');
            $table->decimal('harga_tour', 10, 2);
            $table->string('durasi_tour');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_tour');
    }
};