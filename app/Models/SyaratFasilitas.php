<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SyaratFasilitas extends Model
{
    protected $primaryKey = 'syarat_id';

    protected $fillable = [
        'fasilitas_id',
        'nama_syarat',
        'deskripsi',
        'dokumen',
    ];

    public function fasilitas()
    {
        return $this->belongsTo(FasilitasUmum::class, 'fasilitas_id', 'fasilitas_id');
    }
}
