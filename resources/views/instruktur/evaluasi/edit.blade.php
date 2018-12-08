@extends('layouts.adminapp')

@section('content')
@include('admin.nav')
<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Data sertifikat baru</div>
      <div class="card-body">
        <form method="POST" action="/instruktur/evaluasi/{{$eval->id_peserta}}">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="put">
          <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <label>Nama peserta</label>
              <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" value="{{$eval->nama}}">
            </div>
              <div class="col-md-6">
                <label>Evaluasi</label>
                <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" name="evaluasi" value="{{$eval->evaluasi}}">
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
