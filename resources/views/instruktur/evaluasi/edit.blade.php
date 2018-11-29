@extends('layouts.adminapp')

@section('content')
@include('instruktur.nav')
<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Isi evaluasi</div>
      <div class="card-body">
        <form method="POST" action="{{ url('/instruktur/evaluasi', [$kursus->id_kursus]) }}">
          {{ csrf_field() }}
          <input name="_method" type="hidden" value="PUT">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label>Nama peserta</label>
                <input class="form-control" disabled id="exampleInputLastName" type="text" aria-describedby="nameHelp" value="{{$kursus->peserta->nama}}">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Latihan ke</label>
                <input class="form-control" disabled id="exampleInputLastName" type="text" aria-describedby="nameHelp" value="{{$kursus->kursus_ke}}">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Evaluasi latihan</label>
            @if($kursus->sudah_isi == '1')
            <textarea class="form-control" rows="5" disabled placeholder="Isi evaluasi" name="evaluasi">{{$kursus->evaluasi}}</textarea>
            </div>
            <input class="btn btn-primary btn-block disabled" value="Evaluasi sudah diisi" type="submit">
            @elseif($kursus->sudah_isi == '0')
            <textarea class="form-control" rows="5" placeholder="Isi evaluasi" name="evaluasi"></textarea>
            </div>
            <input class="btn btn-primary btn-block" value="Simpan" type="submit">
            @endif

        </form>
      </div>
    </div>
  </div>
</body>
@endsection
