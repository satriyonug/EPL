<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    public $timestamps = false;
    protected $table = 'kursus';
    protected $primaryKey = 'id_kursus';
    protected $fillable = ['id_instruktur', 'id_peserta', 'id_mobil', 'kursus_ke', 'evaluasi', 'sudah_isi'];

    public function peserta()
    {
      return $this->belongsTo('App\Peserta', 'id_peserta');
    }

    public function mobil()
    {
      return $this->belongsTo('App\Mobil', 'id_mobil');
    }

    public function instruktur()
    {
      return $this->belongsTo('App\Instrukur', 'id_instruktur');
    }
}
