<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use App\User;
use App\Peserta;
use Auth;

class PilihJadwalController extends Controller
{
    public function __construct(Peserta $peserta, Jadwal $jadwal, User $user)
    {
        $this->peserta = $peserta;
        $this->jadwal = $jadwal;
        $this->user = $user;
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = $this->jadwal->get();
        return view('peserta.jadwal', ['jadwal' => $jadwal]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $user = $this->user->where('email', Auth::user()->email)->value('id');
        $idPeserta = $this->peserta->where('id', $user)->value('id_peserta');
        $jadwal = $this->jadwal->where('id_jadwal', $request->id_jadwal)->first();
      
        $pembayaran = $this->peserta->where('id', Auth::user()->id)
        ->update(['id_jadwal' => $request->id_jadwal, 'id_instruktur' => $jadwal->id_instruktur]);
      
      return redirect('/pilih-jadwal');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show(Request $request)
    // {
    //     return dd($request->id_instruktur);        
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
