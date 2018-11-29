<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kursus;
use Auth;
use App\Instruktur;

class KursusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Kursus $kursus, Instruktur $instruktur)
    {
        $this->kursus = $kursus;
        $this->instruktur = $instruktur;
    }

    public function index()
    {
      $idInstruktur = $this->instruktur->where('id', Auth::user()->id)->value('id_instruktur');
      $kursus = $this->kursus->where('id_instruktur', $idInstruktur)->get();
      return view('instruktur.evaluasi.evaluasi', ['kursus' => $kursus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

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
      $kursus = $this->kursus->findorfail($ids);
      return view("instruktur.evaluasi.edit", ['kursus' => $kursus]);
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
      $evaluasi = $this->kursus->findorfail($ids);
      $evaluasi->update([
        'evaluasi' => $request['evaluasi'],
        'sudah_isi' => '1',
      ]);
      return redirect('/instruktur/evaluasi');
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
