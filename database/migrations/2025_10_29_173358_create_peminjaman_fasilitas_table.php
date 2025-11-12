<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('peminjaman_fasilitas', function (Blueprint $table) {
            $table->id('peminjaman_id');
            $table->unsignedBigInteger('warga_id');
            $table->unsignedBigInteger('fasilitas_id');
            $table->dateTime('tgl_pinjam');
            $table->dateTime('tgl_kembali')->nullable();
            $table->enum('status', ['pending', 'setuju', 'tolak'])->default('pending');
            $table->timestamps();

            // Foreign key
            $table->foreign('warga_id')->references('warga_id')->on('warga')->onDelete('cascade');
            $table->foreign('fasilitas_id')->references('fasilitas_id')->on('fasilitas_umum')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjaman_fasilitas');
    }
};
