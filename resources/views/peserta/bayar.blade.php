@extends('layouts.app')

@section('content')
<!--Cta-->
<section id="cta-2">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="text-center">Menuggu Pembayaran</h2>
        <p class="cta-2-txt">Formulir pendaftaran anda akan diverifikasi dalam 2 jam selama jam kerja (09:00-17:00)</p>
        <a href="{{'/masukkan-rekening/{id}'}}"><button type="button" class="btn btn-primary">Pembayaran</button></a>
        <div class="cta-2-form text-center">
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Cta-->
@endsection
