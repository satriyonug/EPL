@extends('layouts.app')

@section('content')
<!--Pricing-->
<section id="pricing" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="header-section text-center">
        <h2>Pilih jadwal kursus</h2>
        <p>Kursus akan dilaksanakan 1 kali dalam seminggu selama 90 menit</p>
        <hr class="bottom-line">
      </div>
      @foreach($jadwal as $j)
      <div class="col-md-3 col-sm-3">
        <div class="price-table">
          <!-- Plan  -->
          <div class="pricing-head">
            <h4>{{$j->hari}}</h4>
            <h5>Waktu : {{$j->jam_mulai}}-{{$j->jam_selesai}}</h5>
          </div>

          <!-- Plean Detail -->
          <div class="price-in mart-15">
            <form method="POST" action="/jadwal">
              {{ csrf_field() }}
              <input name="id_jadwal" type="hidden" value="{{$j->id_jadwal}}">
            <input  class="btn btn-bg green btn-block" value="Simpan" type="submit">
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!--/ Pricing-->
@endsection
