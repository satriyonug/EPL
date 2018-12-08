@extends('layouts.adminapp')

@section('content')
@include('admin.nav')
<div class="content-wrapper">
  <div class="container-fluid">

    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <h3>Mobil</h3>
        <a class="btn btn-primary btn-md float-right" href="/admin/mobil/create">Data baru</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Jenis/merk</th>
                <th>Nomor polisi</th>
                <th>Warna</th>
                <th>Tahun</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($mobil as $m)
              <tr>
                <td class="align-middle">{{$m->jenis_merk}}</td>
                <td class="align-middle">{{$m->nomor_polisi}}</td>
                <td class="align-middle">{{$m->warna}}</td>
                <td class="align-middle">{{$m->tahun}}</td>
                <td class="align-middle"><img style="max-width: 100px; height: 100px;" src="{{ URL::asset('img/foto/' . $m->foto_mobil) }}" alt="{{$m->foto_mobil}}" /></td>
                <td><a class="btn btn-primary btn-block" href="{{ url('/admin/mobil/'.$m->id_mobil.'/edit') }}">Edit</a>
                <a class="btn btn-danger" style="padding:0px;">
                  <form action="/admin/mobil/{{ $m->id_mobil }}" method="POST">
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
