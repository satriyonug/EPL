@extends('layouts.adminapp')

@section('content')
@include('admin.nav')
<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Data Mobil baru</div>
      <div class="card-body">
        <form method="POST" action="{{URL('/admin/mobil/create')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label>Jenis/merk</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" name="jenis_merk">
              </div>
            
              <div class="col-md-6">
                <label>Tipe Mobil</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" name="tipe_mobil">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label>Nomor polisi</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" name="nomor_polisi">
              </div>
            
              <div class="col-md-6">
                <label>CC</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" name="cc">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label>Nomor Rangka</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" name="nomor_rangka">
              </div>
            
              <div class="col-md-6">
                <label>Foto Mobil</label>
                <input id="foto_mobil" type="file" aria-describedby="nameHelp" name="foto_mobil">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label>Warna</label>
                <select class="form-control" id="sel1" name="warna">
                  <option value="Abu-abu">Abu-abu</option>
                  <option value="Biru">Biru</option>
                  <option value="Hitam">Hitam</option>
                  <option value="Merah">Merah</option>
                  <option value="Putih">Putih</option>
                  <option value="Silver">Silver</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Tahun</label>
                <input class="form-control" id="exampleInputLastName" type="number" min="1990" max="2100" aria-describedby="nameHelp" name="tahun">
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
