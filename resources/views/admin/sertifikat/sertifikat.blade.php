@extends('layouts.adminapp')

@section('content')
@include('admin.nav')
<div class="content-wrapper">
  <div class="container-fluid">

    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <h3>Sertifikat</h3>
        <a class="btn btn-primary float-right" href="/admin/sertifikat/create">Data baru</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nama Peserta</th>
                <th>Nomor Sertifikat</th>
                <th>Nilai</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($sertifs as $sertif)
              <tr>
                <td class="align-middle">{{$sertif->peserta->nama}}</td>
                <td class="align-middle">{{$sertif->nomor_sertifikat}}</td>
                <td class="align-middle">{{$sertif->nilai}}</td>
                <td><a class="btn btn-primary" href="{{ url('/admin/sertifikat/'.$sertif->id.'/edit') }}">Edit</a>
                <a class="btn btn-danger" style="padding:0px;">
                  <form action="/admin/sertifikat/{{ $sertif->id }}" method="POST">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="delete">
                    <button class="btn btn-danger">Hapus</button>
                  </form>
                  </a>
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
