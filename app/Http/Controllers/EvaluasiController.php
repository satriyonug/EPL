<?php

namespace App\Http\Controllers;

use App\Peserta;
use Auth;
use Illuminate\Http\Request;

class EvaluasiController extends Controller
{
    public function __construct(Peserta $peserta)
    {
        $this->peserta = $peserta;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $peserta = $this->peserta->where('id_instruktur',$user)->get();
        // dd($peserta);
        return view('instruktur.evaluasi.evaluasi',compact('peserta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user()->id;
        $peserta = $this->peserta->where('id_instruktur',$user)->get();
        return view('instruktur.evaluasi.create', compact ('peserta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eval = $this->peserta->where('id_peserta', $request->id_peserta)->update(['evaluasi' => $request->evaluasi]);
        return redirect('/instruktur/evaluasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ids)
    {
        $eval = $this->peserta->findorfail($ids);
        return view('instruktur.evaluasi.edit', compact('eval'));
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
        $peserta = $this->peserta->findorfail($ids);
        $eval = $this->peserta->where('id_peserta', $peserta->id_peserta)->update(['evaluasi' => $request->evaluasi]);
        return redirect('/instruktur/evaluasi');
    }
}
