<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Eloquent;

class Peserta extends Model
{
    public $timestamps = false;
    protected $table = 'peserta';
    protected $primaryKey = 'id_peserta';
    protected $fillable = ['id_instruktur', 'id', 'id_jadwal', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'foto_peserta', 'alamat', 'nomor_telepon', 'verifikasi', 'sisa_kursus'];

    public function jadwal()
    {
      return $this->belongsTo('App\Jadwal', 'id_jadwal');
    }

    public function pembayaran()
    {
      return $this->hasMany('App\Pembayaran', 'id_peserta');
    }

    public function kursus()
    {
      return $this->hasMany('App\Kursus', 'id_peserta');
    }

    public function user()
    {
      return $this->hasOne('App\User');
    }

    public function instruktur()
    {
      return $this->belongsTo('App\Instruktur','id_instruktur');
    }

    public function sertifikat()
    {
      return $this->hasMany('App\Sertifikat','id_peserta');
    }
}
