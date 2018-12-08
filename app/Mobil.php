<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    public $timestamps = false;
    protected $table = 'mobil';
    protected $primaryKey = 'id_mobil';
    protected $fillable = ['nomor_polisi', 'jenis_merk','tipe_mobil','cc','nomor_rangka','id_jadwal','foto_mobil', 'warna', 'tahun'];

    public function kursus()
    {
      return $this->hasMany('App\Kursus', 'id_mobil');
    }
}
