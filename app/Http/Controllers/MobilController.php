<?php

namespace App\Http\Controllers;

use App\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class MobilController extends Controller
{
    public function __construct(Mobil $mobil)
    {
        $this->mobil = $mobil;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $mobil = $this->mobil->paginate(10);
      return view('admin.mobil.mobil', ['mobil' => $mobil]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mobil.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $imageName = $request->file('foto_mobil');
      if($imageName!==null)
      {
          $extension = $imageName->getClientOriginalExtension();
          Storage::disk('public')->put($imageName->getFilename().'.'.$extension, File::get($imageName));
      }

      $mobil = new Mobil;
      $mobil->nomor_polisi = $request->nomor_polisi;
      $mobil->jenis_merk = $request->jenis_merk;
      $mobil->tipe_mobil = $request->tipe_mobil;
      $mobil->cc = $request->cc;
      $mobil->nomor_rangka = $request->nomor_rangka;
      $mobil->foto_mobil = $imageName->getFilename().'.'.$extension;
      $mobil->warna = $request->warna;  
      $mobil->tahun = $request->tahun;
      $mobil->save();
      // $mobil = $this->mobil->create($request->all());

    
      return redirect('/admin/mobil');
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
      $mobil = $this->mobil->findorfail($ids);
      return view("admin.mobil.edit", ['mobil' => $mobil]);
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
      $mobil = $this->mobil->findorfail($ids);
      $mobil->update($request->all());
      return redirect('/admin/mobil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
      $mobil = $this->mobil->where('id_mobil',$ids)->delete();
      return redirect('/admin/mobil')->with('info','mobil berhasil dihapus');
    }
}
