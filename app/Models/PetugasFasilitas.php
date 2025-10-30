<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PetugasFasilitas extends Model
{
    protected $primaryKey = 'petugas_id';

    protected $fillable = [
        'fasilitas_id',
        'nama_petugas',
        'no_hp',
        'email',
        'foto',
    ];

    public function fasilitas()
    {
        return $this->belongsTo(FasilitasUmum::class, 'fasilitas_id', 'fasilitas_id');
    }
}
