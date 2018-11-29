<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Eloquent;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $fillable = ['id_peserta', 'jumlah_kursus', 'nomor_rekening', 'verifikasi'];

    public function peserta()
    {
      return $this->belongsTo('App\Peserta', 'id_peserta');
    }
}
