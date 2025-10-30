<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeminjamanFasilitas extends Model
{
    protected $table = 'peminjaman_fasilitas';
    protected $primaryKey = 'peminjaman_id';
    protected $fillable = [
        'warga_id',
        'fasilitas_id',
        'tgl_pinjam',
        'tgl_kembali',
        'status'
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class, 'fasilitas_id');
    }
}
