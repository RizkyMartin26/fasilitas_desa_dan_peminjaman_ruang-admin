<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeminjamanFasilitas extends Model
{
    protected $table      = 'peminjaman_fasilitas';
    protected $primaryKey = 'peminjaman_id';
    public $incrementing  = true;

    protected $fillable = [
        'warga_id',
        'fasilitas_id',
        'tgl_pinjam',
        'tgl_kembali',
        'tujuan',
        'status',
        'total_biaya',
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id');
    }

    public function fasilitas()
    {
        return $this->belongsTo(FasilitasUmum::class, 'fasilitas_id');
    }
}
