<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Peserta;
use App\Pembayaran;
use App\Jadwal;
use App\Instruktur;
class HomeController extends Controller
{
    public function __construct(Peserta $peserta, User $user,Jadwal $jadwal, Instruktur $instruktur)
    {
        $this->peserta = $peserta;
        $this->user = $user;
        $this->jadwal = $jadwal;
        $this->instruktur = $instruktur;
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        if(Auth::check()){
          if(Auth::user()->role == "P"){
            $datapeserta = Peserta::where('id', Auth::user()->id)->get();
            if($datapeserta[0]->verifikasi == '0'){
              return view('peserta.menunggu-verifikasi');
            }
            elseif($datapeserta[0]->verifikasi == 1 && $datapeserta[0]->sisa_kursus == 0 && Pembayaran::where([['id_peserta', $datapeserta[0]->id_peserta], ['nomor_rekening', NULL]])->count() > 0){
              return redirect('/masukkan-rekening/'. $datapeserta[0]->id_peserta);
            }
            elseif($datapeserta[0]->verifikasi == 1 && $datapeserta[0]->sisa_kursus == 0 && Pembayaran::where([['id_peserta', $datapeserta[0]->id_peserta], ['verifikasi', '0']])->count() > 0){
              return view('peserta.menunggu-bayar');
            }
            elseif($datapeserta[0]->id_jadwal == NULL){
              return redirect('/jadwal');
            }
            else{
              $peserta = $this->peserta->select('id','id_peserta','id_instruktur','id_jadwal','nama')
              ->where('id_peserta','=',$datapeserta[0]->id_peserta)->get()->toArray();
              $instruktur2 = $this->instruktur->select('nama')
              ->where('id_instruktur',$peserta[0]['id_instruktur'])->get()->toArray();
              $instruktur = $instruktur2[0]['nama'];
              $jadwal2 = $this->jadwal->select('hari','jam_mulai','jam_selesai')
              ->where('id_jadwal', $peserta[0]['id_jadwal'])->get()->toArray();
              $jamMulai = $jadwal2[0]['jam_mulai'];
              $jamSelesai = $jadwal2[0]['jam_selesai'];
              $hari = $jadwal2[0]['hari'];
              return view('peserta.home',compact('peserta','jamSelesai','jamMulai','hari','instruktur'));
            }
          }
          elseif(Auth::user()->role == "I"){
            return redirect('/instruktur/jadwal');
          }
          elseif(Auth::user()->role == "A"){
            return redirect('/admin/peserta');
          }

        }
        else{
          return redirect('/');
        }

    }
}
