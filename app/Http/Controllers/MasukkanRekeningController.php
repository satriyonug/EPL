<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use App\Peserta;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class MasukkanRekeningController extends Controller
{
  public function __construct(Peserta $peserta,Pembayaran $pembayaran)
    {
        $this->peserta = $peserta;
        $this->pembayaran = $pembayaran;
    }

  public function show($ids)
  {
    $jumlahkursus = $this->pembayaran->where([['id_peserta', $ids],['nomor_rekening', NULL]])->value('jumlah_kursus');
    if($jumlahkursus == 8){
      $jumlahtagihan = 160000;
    }
    elseif($jumlahkursus == 12){
      $jumlahtagihan = 200000;
    }
    elseif($jumlahkursus == 16){
      $jumlahtagihan = 240000;
    }
    return view('peserta.masukkan-rekening', ['jumlahtagihan' => $jumlahtagihan, 'id_peserta' => $ids]);

  }

  public function update(Request $request)
  {
    $test = $this->validate($request,[
      'nomor_rekening' => 'numeric'
      ]);
      
      $imageName = $request->file('foto_pembayaran');
      if($imageName!==null)
      {
          // get the extension
          $extension = $imageName->getClientOriginalExtension();
          Storage::disk('public')->put($imageName->getFilename().'.'.$extension, File::get($imageName));
      }

    $pembayaran = $this->pembayaran->where([['id_peserta', $request->id_peserta],
    ['nomor_rekening', NULL]])
    ->update(['nomor_rekening' => $request->no_rekening,
    'foto_pembayaran' => $imageName->getFilename().'.'.$extension]);
    return redirect('/menunggu-bayar');

  }
}
