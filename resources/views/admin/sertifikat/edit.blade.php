@extends('layouts.adminapp')

@section('content')
@include('admin.nav')
<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Edit peserta</div>
      <div class="card-body">
        <form method="post" action="/admin/sertifikat/{{ $sertifikat->id }}">
          {{ csrf_field() }}
          <input name="_method" type="hidden" value="PUT">
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Peserta</label>
              <select name="id_peserta" class="form-control select2" required>
              @foreach ($peserta as $peserta)
              @if($sertifikat->id_peserta == $peserta->id_peserta)
              <option value="{{ $sertifikat->id_peserta }}" selected>{{ $peserta->nama }}</option>
              @else
              <option value="{{ $peserta->id_peserta }}">{{ $peserta->nama }} </option>
              @endif
              @endforeach
              </select>
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <label>Nomor Sertifikat</label>
                  <input class="form-control" id="exampleInputLastName" type="text" value="{{ $sertifikat->nomor_sertifikat }}" aria-describedby="nameHelp" name="nomor_sertifikat">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">
                  <label>Nilai</label>
                  <input class="form-control" id="exampleInputLastName" type="number" value="{{ $sertifikat->nilai }}" aria-describedby="nameHelp" name="nilai">
                </div>
              </div>
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
