<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sertifikat;
use App\Peserta;

class SertifikatController extends Controller
{
    public function __construct(Peserta $peserta, Sertifikat $sertifikat)
    {
        $this->peserta = $peserta;
        $this->sertifikat = $sertifikat;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peserta = $this->peserta->all();
        $sertifs = $this->sertifikat->paginate(10);
        return view('admin.sertifikat.sertifikat', compact('peserta','sertifs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $peserta = $this->peserta->all();
        return view('admin.sertifikat.create',compact('peserta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sertifs = $this->sertifikat->create([
            'id_peserta' => $request['id_peserta'],
            'nomor_sertifikat' => $request['nomor_sertifikat'],
            'nilai' => $request['nilai'],
        ]);
        return redirect('/admin/sertifikat');
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
        $sertifikat = $this->sertifikat->findorfail($ids);
        $peserta = $this->peserta->all();   
        return view('admin.sertifikat.edit', compact('sertifikat','peserta'));
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
        $sertifs = $this->sertifikat->findorfail($ids);
        $sertifs->update([
            'id_peserta' => $request['id_peserta'],
            'nomor_sertifikat' => $request['nomor_sertifikat'],
            'nilai' => $request['nilai'],
        ]);
        return redirect('/admin/sertifikat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        $sertifs = $this->sertifikat->findorfail($ids)->delete();
        return redirect('/admin/sertifikat')->with('info','Instruktur berhasil dihapus');
    }
}
