@extends('layouts.adminapp')

@section('content')
@include('admin.nav')
<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Data sertifikat baru</div>
      <div class="card-body">
        <form method="POST" action="/admin/sertifikat">
          {{ csrf_field() }}
          <div class="form-group">
              <label for="exampleInputEmail1">Nama Peserta</label>
              <select class="form-control" name="id_peserta">
                <option value="">Pilih Nama</option>
                @foreach ($peserta as $peserta)
                <option value="{{ $peserta->id_peserta }}">{{ $peserta->nama }}</option>
                @endforeach
              </select>
            </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label>Nomor Sertifikat</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" name="nomor_sertifikat">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label>Nilai</label>
                <input class="form-control" id="exampleInputLastName" type="number" aria-describedby="nameHelp" name="nilai">
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
