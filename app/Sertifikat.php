<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    protected $table = 'sertifikat';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_peserta', 'nomor_sertifikat', 'nilai'
    ];

    public function peserta()
    {
      return $this->belongsTo('App\Peserta','id_peserta');
    }
}
