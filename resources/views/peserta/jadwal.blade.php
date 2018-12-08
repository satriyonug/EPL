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
            <a>
              <form action="/jadwal/update" method="POST">
                {{csrf_field()}}
                <input name="id_jadwal" type="hidden" value="{{$j->id_jadwal}}">
                <button class="btn btn-success">Submit</button>
              </form>
            </a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!--/ Pricing-->
@endsection
