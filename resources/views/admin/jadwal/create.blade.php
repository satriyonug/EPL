@extends('layouts.adminapp')

@section('content')
@include('admin.nav')
<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Jadwal baru</div>
      <div class="card-body">
        <form method="POST" action="/admin/jadwal">
          {{ csrf_field() }}
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label>Hari</label>
                <select class="form-control" id="sel1" name="hari">
                  <option value="Senin">Senin</option>
                  <option value="Selasa">Selasa</option>
                  <option value="Rabu">Rabu</option>
                  <option value="Kamis">Kamis</option>
                  <option value="Jumat">Jumat</option>
                  <option value="Sabtu">Sabtu</option>
                  <option value="Minggu">Minggu</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label>Instruktur</label>
                <select class="form-control" id="sel1" name="id_instruktur">
                @foreach($instruktur as $instruktur)
                  <option value="{{$instruktur->id_instruktur}}">{{ $instruktur-> nama }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label>Waktu mulai</label>
                <input class="form-control" id="exampleInputLastName" type="time" aria-describedby="nameHelp" name="jam_mulai">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Waktu selesai</label>
                <input class="form-control" id="exampleInputLastName" type="time" aria-describedby="nameHelp" name="jam_selesai">
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
