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
        <a class="btn btn-primary float-right" href="/instruktur/evaluasi/create">Data baru</a>
        <div class="col-md-3 pull-right">

        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nama peserta</th>
                <th>Evaluasi</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($peserta as $peserta)
              <tr>
                <td class="align-middle">{{$peserta->nama}}</td>
                <td class="align-middle">{{$peserta->evaluasi}}</td>
                <td><a class="btn btn-primary" href="{{ url('/instruktur/evaluasi/'.$peserta->id_peserta.'/edit') }}">Edit</a>
                </td>
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
