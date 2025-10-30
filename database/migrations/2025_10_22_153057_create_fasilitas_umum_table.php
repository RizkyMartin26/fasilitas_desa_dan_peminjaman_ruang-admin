<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fasilitas_umum', function (Blueprint $table) {
            $table->id('fasilitas_id');
            $table->string('nama');
            $table->string('jenis');
            $table->string('alamat');
            $table->string('rt', 5)->nullable();
            $table->string('rw', 5)->nullable();
            $table->integer('kapasitas')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('media')->nullable(); // foto/sop
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fasilitas_umum');
    }
};
