<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Peserta;
use App\Pembayaran;
class HomeController extends Controller
{
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
              return redirect('/menunggu-verifikasi');
            }
            elseif($datapeserta[0]->verifikasi == 1 && $datapeserta[0]->sisa_kursus == 0 && Pembayaran::where([['id_peserta', $datapeserta[0]->id_peserta], ['nomor_rekening', NULL]])->count() > 0){
              return redirect('/masukkan-rekening/'. $datapeserta[0]->id_peserta);
            }
            elseif($datapeserta[0]->verifikasi == 1 && $datapeserta[0]->sisa_kursus == 0 && Pembayaran::where([['id_peserta', $datapeserta[0]->id_peserta], ['verifikasi', '0']])->count() > 0){
              return redirect('/menunggu-bayar');
            }
            elseif($datapeserta[0]->id_jadwal == NULL){
              return redirect('/jadwal');
            }
            else{
              return view('peserta.home');
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

    public function admin(){
       return view('admin.peserta');
    }

    public function instruktur(){
       return view('instruktur.jadwal');
    }
}
