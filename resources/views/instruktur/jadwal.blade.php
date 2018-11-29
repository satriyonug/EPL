@extends('layouts.adminapp')

@section('content')
@include('instruktur.nav')
<div class="content-wrapper">
  <div class="container-fluid">

    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i>Jadwal</div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nama Peserta</th>
                <th>Alamat</th>
                <th>Hari</th>
                <th>Waktu mulai</th>
                <th>Waktu selesai</th>
              </tr>
            </thead>
            <tbody>
              @foreach($peserta as $p)
              <tr>
                <td>{{$p->nama}}</td>
                <td>{{$p->alamat}}</td>
                <td>{{$p->jadwal->hari}}</td>
                <td>{{$p->jadwal->jam_mulai}}</td>
                <td>{{$p->jadwal->jam_selesai}}</td>
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
