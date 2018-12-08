<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peserta;
use Auth;

class EvalPesertaController extends Controller
{
    public function __construct(Peserta $peserta)
    {
        $this->peserta = $peserta;
    }

    public function index()
    {
        $user = Auth::user()->id;
        $peserta = $this->peserta->where('id',$user)->get();
        // dd($user);
        return view ('peserta.evaluasi',compact('peserta'));
    }
}
