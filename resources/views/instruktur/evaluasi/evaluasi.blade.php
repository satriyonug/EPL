@extends('layouts.adminapp')

@section('content')
@include('instruktur.nav')
<div class="content-wrapper">
  <div class="container-fluid">

    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <div class="col-md-3 pull-left">
          <h3 class="align-middle">Evaluasi</h3>
        </div>
        <a class="btn btn-primary float-right" href="/admin/evaluasi/create">Data baru</a>
        <div class="col-md-3 pull-right">

        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nama peserta</th>
                <th>Latihan-ke</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($kursus as $k)
              <tr>
                <td class="align-middle">{{$k->peserta->nama}}</td>
                <td class="align-middle">{{$k->kursus_ke}}</td>
                @if($k->sudah_isi == 0)
                <td><a class="btn btn-primary btn-block" href="{{ url('/instruktur/evaluasi/'.$k->id_kursus.'/edit') }}">Isi evaluasi</a></td>
                @elseif($k->sudah_isi == 1)
                <td><button class="btn btn-block" onclick="location.href='{{ url('/instruktur/evaluasi/'.$k->id_kursus.'/edit') }}'">Lihat evaluasi</button></td>
                @endif
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
  </div>
@endsection
