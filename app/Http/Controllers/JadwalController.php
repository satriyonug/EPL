<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use App\Peserta;
use App\Instruktur;
use Auth;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Jadwal $jadwal, Peserta $peserta, Instruktur $instruktur)
    {
        $this->jadwal = $jadwal;
        $this->peserta = $peserta;
        $this->instruktur = $instruktur;
    }

    public function index()
    {
        $jadwal = $this->jadwal->paginate(10);
        return view('admin.jadwal.jadwal', ['jadwal' => $jadwal]);
    }

    public function lihatJadwal()
    {
        $idInstruktur = $this->instruktur->where('id', Auth::user()->id)->value('id_instruktur');
        $peserta = $this->peserta->where('id_instruktur', $idInstruktur)->get();
        //return $id_instruktur;
        return view('instruktur.jadwal', ['peserta' => $peserta]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jadwal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jadwal = $this->jadwal->create($request->all());
        return redirect('/admin/jadwal');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ids)
    {
        $jadwal = $this->jadwal->findorfail($ids);
        return view("admin.jadwal.edit", ['jadwal' => $jadwal]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ids)
    {
      $jadwal = $this->jadwal->findorfail($ids);
      $jadwal->update($request->all());
      return redirect('/admin/jadwal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }
}
