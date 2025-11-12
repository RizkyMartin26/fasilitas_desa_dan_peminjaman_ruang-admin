<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranFasilitasTable extends Migration
{
    public function up()
    {
        Schema::create('pembayaran_fasilitas', function (Blueprint $table) {
            $table->id('bayar_id');
            $table->unsignedBigInteger('peminjaman_id');
            $table->date('tanggal');
            $table->decimal('jumlah', 10, 2);
            $table->string('metode');
            $table->text('keterangan')->nullable();
            $table->string('bukti_bayar')->nullable(); // media
            $table->timestamps();

            $table->foreign('peminjaman_id')
                ->references('peminjaman_id')
                ->on('peminjaman_fasilitas')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayaran_fasilitas');
    }
}
