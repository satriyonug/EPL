<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    public $timestamps = false;
    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';

    protected $fillable = ['hari', 'jam_mulai', 'jam_selesai'];

    public function peserta()
    {
      return $this->hasMany('App\Peserta', 'id_jadwal');
    }

    public function instrukturMemilih()
    {
      return $this->hasMany('App\Instruktur_Memilih', 'id_jadwal');
    }
}
