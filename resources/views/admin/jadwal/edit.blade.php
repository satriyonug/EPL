@extends('layouts.adminapp')

@section('content')
@include('admin.nav')
<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">
        Edit jadwal
      </div>
      <div class="card-body">
        <form method="POST" action="{{ url('/admin/jadwal', [$jadwal->id_jadwal]) }}">
          {{ csrf_field() }}
          <input name="_method" type="hidden" value="PUT">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label>Hari</label>
                <select class="form-control" id="sel1" name="hari">
                  <option value="Senin" @if($jadwal->hari == "Senin")selected @else @endif>Senin</option>
                  <option value="Selasa" @if($jadwal->hari == "Selasa") selected @else @endif>Selasa</option>
                  <option value="Rabu" @if($jadwal->hari == "Rabu") selected @else @endif>Rabu</option>
                  <option value="Kamis" @if($jadwal->hari == "Kamis") selected @else @endif>Kamis</option>
                  <option value="Jumat" @if($jadwal->hari == "Jumat") selected @else @endif>Jumat</option>
                  <option value="Sabtu" @if($jadwal->hari == "Sabtu") selected @else @endif>Sabtu</option>
                  <option value="Minggu" @if($jadwal->hari == "Minggu") selected @else @endif>Minggu</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label>Waktu mulai</label>
                <input class="form-control" id="exampleInputLastName" type="time" aria-describedby="nameHelp" name="jam_mulai" value="{{$jadwal->jam_mulai}}">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Waktu selesai</label>
                <input class="form-control" id="exampleInputLastName" type="time" aria-describedby="nameHelp" name="jam_selesai" value="{{$jadwal->jam_selesai}}">
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
