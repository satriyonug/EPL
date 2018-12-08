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
    public function __construct(Peserta $peserta, User $user,Jadwal $jadwal, Instruktur $instruktur, Pembayaran $pembayaran)
    {
        $this->peserta = $peserta;
        $this->user = $user;
        $this->jadwal = $jadwal;
        $this->instruktur = $instruktur;
        $this->pembayaran = $pembayaran;
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
            $datapeserta = $this->peserta->where('id', Auth::user()->id)->get();
            if($datapeserta[0]->verifikasi == '0'){
              return view('peserta.menunggu-verifikasi');
            }
            elseif($datapeserta[0]->verifikasi == '1'){
              return view('peserta.selesai-verifikasi');
            }
          }
          elseif(Auth::user()->role == "I"){
            $ins = $this->instruktur->where('id', Auth::user()->id)->first();
            if($ins->verifikasi == '1')
            {
              return redirect('/instruktur/jadwal');
            }
            elseif($ins->verifikasi == '0')
            {
              return view('instruktur.home');
            }
            
          }
          elseif(Auth::user()->role == "A"){
            return redirect('/admin/peserta');
          }
        }
    }

    public function menungguBayar()
    {
        if(Auth::check()){
          if(Auth::user()->role == "P"){
            $datapeserta = $this->peserta->where('id', Auth::user()->id)->get();
            if($datapeserta[0]->verifikasi == 0)
            {
              return redirect('home');
            }
            elseif($datapeserta[0]->verifikasi == 1 && $datapeserta[0]->sisa_kursus == 0 
            && $this->pembayaran->where([['id_peserta', $datapeserta[0]->id_peserta], 
            ['nomor_rekening', NULL]])->count() > 0){
              return redirect('/masukkan-rekening/'. $datapeserta[0]->id_peserta);
            }
            elseif($datapeserta[0]->verifikasi == 1 
            && $datapeserta[0]->sisa_kursus == 0 && $this->pembayaran->
            where([['id_peserta', $datapeserta[0]->id_peserta], ['verifikasi', '0']])->count() > 0){
              return view('peserta.menunggu-bayar');
            }
            elseif($this->pembayaran->where([['id_peserta', $datapeserta[0]->id_peserta], ['verifikasi', '1']])){
              return view('peserta.selesai-bayar');
            }
          }
        }
    }

    public function jadwal()
    {
        if(Auth::check()){
          if(Auth::user()->role == "P"){
            $datapeserta = $this->peserta->where('id', Auth::user()->id)->get();
            // if($datapeserta[0]->verifikasi == 0 || $this->pembayaran->where([['id_peserta', $datapeserta[0]->id_peserta], ['verifikasi', '0']]) )
            // {
            //   return redirect('home');
            // }
            if($datapeserta[0]->id_jadwal == NULL && $datapeserta[0]->id_instruktur == NULL ){
              return redirect('/jadwal');
            }
            else{
              $peserta = $this->peserta->select('id','id_peserta','id_instruktur','id_jadwal','nama')
              ->where('id_peserta','=',$datapeserta[0]->id_peserta)->get()->toArray();
              $jadwal2 = $this->jadwal->select('hari','jam_mulai','jam_selesai','id_instruktur')
              ->where('id_jadwal', $peserta[0]['id_jadwal'])->get()->toArray();
              $instruktur2 = $this->instruktur->select('nama','id_instruktur')
              ->where('id_instruktur',$jadwal2[0]['id_instruktur'])->get()->toArray();
              $instruktur = $instruktur2[0]['nama'];

              $jamMulai = $jadwal2[0]['jam_mulai'];
              $jamSelesai = $jadwal2[0]['jam_selesai'];
              $hari = $jadwal2[0]['hari'];
              return view('peserta.home',compact('peserta','jamSelesai','jamMulai','hari','instruktur'));
            }
          }
        }
    }
}
