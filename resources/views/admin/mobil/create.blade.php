@extends('layouts.adminapp')

@section('content')
@include('admin.nav')
<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Data Mobil baru</div>
      <div class="card-body">
        <form method="POST" action="/admin/mobil">
          {{ csrf_field() }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label>Jenis/merk</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" name="jenis_merk">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label>Nomor polisi</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" name="nomor_polisi">
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
