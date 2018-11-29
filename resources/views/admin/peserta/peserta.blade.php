@extends('layouts.adminapp')

@section('content')
@include('admin.nav')
<div class="content-wrapper">
  <div class="container-fluid">

    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <h3>Peserta</h3></div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nama Peserta</th>
                <th>Alamat</th>
                <th>Jenis kelamin</th>
                <th>No telp</th>
                <th>tanggal lahir</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($peserta as $p)
              <tr>
                <td class="align-middle">{{$p->nama}}</td>
                <td class="align-middle">{{$p->alamat}}</td>
                <td class="align-middle">{{$p->jenis_kelamin}}</td>
                <td class="align-middle">{{$p->nomor_telepon}}</td>
                <td class="align-middle">{{$p->tanggal_lahir}}</td>
                <td><a class="btn btn-primary btn-block" href="{{ url('/admin/peserta/'.$p->id_peserta.'/edit') }}">Edit</a></td>
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
