<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetugasFasilitasTable extends Migration
{
    public function up()
    {
        Schema::create('PetugasFasilitas', function (Blueprint $table) {
            $table->id('petugas_id');
            $table->unsignedBigInteger('fasilitas_id');
            $table->string('nama_petugas');
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();

            $table->foreign('fasilitas_id')
                ->references('fasilitas_id')
                ->on('fasilitas_umum')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('PetugasFasilitas');
    }
}
