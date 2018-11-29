@extends('layouts.adminapp')

@section('content')
@include('admin.nav')
<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">
        Edit data mobil
      </div>
      <div class="card-body">
        <form method="POST" action="{{ url('/admin/mobil', [$mobil->id_mobil]) }}">
          {{ csrf_field() }}
          <input name="_method" type="hidden" value="PUT">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label>Jenis/merk</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" name="jenis_merk" value="{{$mobil->jenis_merk}}">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label>Nomor polisi</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" name="nomor_polisi" value="{{$mobil->nomor_polisi}}">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label>Warna</label>
                <select class="form-control" id="sel1" name="warna">
                  <option value="Abu-abu" @if($mobil->warna == "Abu-abu")selected @else @endif>Abu-abu</option>
                  <option value="Biru" @if($mobil->warna == "Biru")selected @else @endif>Biru</option>
                  <option value="Hitam" @if($mobil->warna == "Hitam")selected @else @endif>Hitam</option>
                  <option value="Merah" @if($mobil->warna == "Merah")selected @else @endif>Merah</option>
                  <option value="Putih" @if($mobil->warna == "Putih")selected @else @endif>Putih</option>
                  <option value="Silver" @if($mobil->warna == "Silver")selected @else @endif>Silver</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Tahun</label>
                <input class="form-control" id="exampleInputLastName" type="number" min="1990" max="2100" aria-describedby="nameHelp" name="tahun" value="{{$mobil->tahun}}">
              </div>
            </div>
          </div>
          <input class="btn btn-primary btn-block" value="Simpan" type="submit">
        </form>
      </div>
    </div>
  </div>
</body>
@endsection
