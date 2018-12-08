@extends('layouts.adminapp')

@section('content')
@include('admin.nav')
<div class="content-wrapper">
  <div class="container-fluid">

    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">
        <h3>Pembayaran</h3></div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nama Peserta</th>
                <th>Nominal</th>
                <th>No rekening</th>
                <th>Waktu pembayaran</th>
                <th>Bukti Pembayaran</th>
                <th>Status pembayaran</th>
              </tr>
            </thead>
            
            <tbody>
              @foreach($pembayaran as $p)
              
              <tr>
                <td class="align-middle">{{$p->peserta->nama}}</td>
                @if($p->jumlah_kursus == 8)
                <td class="align-middle">Rp160.000</td>
                @elseif($p->jumlah_kursus == 12)
                <td class="align-middle">Rp200.000</td>
                @elseif($p->jumlah_kursus == 16)
                <td class="align-middle">Rp240.000</td>
                @endif
                <td class="align-middle">{{$p->nomor_rekening}}</td>
                <td class="align-middle">{{$p->updated_at}}</td>
                <td class="align-middle"><img style="max-width: 100px; height: 100px;" src="{{ URL::asset('img/foto/' . $p->foto_pembayaran) }}" alt="{{$p->foto_pembayaran}}" /></td>
                @if($p->verifikasi == '0')
                  <td>
                    <form action="{{ url('/admin/pembayaran', [$p->id_pembayaran]) }}" method="post" id="workshop-newsletter-form">
                      {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PUT">
                    <input type="hidden" name="verifikasi" value="1">
                    <input class="btn btn-primary btn-block" value="Terima pembayaran" type="submit">
                  </form>
                </td>
                @elseif($p->verifikasi == '1')
                  <td><button class="btn btn-primary btn-block disabled">Sudah diterima</button></td>
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
