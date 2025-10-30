<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PembayaranFasilitas extends Model
{
    protected $primaryKey = 'bayar_id';

    protected $fillable = [
        'pinjam_id',
        'tanggal',
        'jumlah',
        'metode',
        'keterangan',
        'bukti_bayar',
    ];

    public function peminjaman()
    {
        return $this->belongsTo(PeminjamanFasilitas::class, 'pinjam_id', 'pinjam_id');
    }
}
