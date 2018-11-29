<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instruktur_Memilih extends Model
{
    public $timestamps = false;
    protected $table = 'instruktur_memilih';
    protected $primaryKey = ['id_instruktur', 'id_jadwal'];
    protected $fillable = ['id_instruktur', 'id_jadwal'];
    public function jadwal()
    {
      return $this->belongsTo('App\Jadwal', 'id_jadwal');
    }

    public function instruktur()
    {
      return $this->belongsTo('App\Peserta');
    }
}
