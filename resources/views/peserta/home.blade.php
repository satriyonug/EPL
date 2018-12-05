@extends('layouts.app')

@section('content')
<section id="testimonial" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="header-section text-center">
        <h2 class="white">Tentang kursus anda</h2>
        <!-- <p class="white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem nesciunt vitae,<br> maiores, magni dolorum aliquam.</p> -->
        <hr class="bottom-line bg-white">
      </div>

      <div class="col-md-6 col-sm-6">
        <div class="text-comment-small">
          <p class="text-par">Jadwal : {{ $hari}}, {{ $jamMulai}} - {{ $jamSelesai}}</p>
          <p class="text-par">Instruktur : {{ $instruktur }}</p>
        </div>
      </div>
      
      <div class="col-md-6 col-sm-6">
        <div class="text-comment-small">
          <h2>Kursus selanjutnya dalam 2 hari</h2>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Pricing-->
<section id="pricing" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="header-section text-center">
        <h2>Evaluasi kursus anda</h2>
        <p>Instruktur anda akan memberi evaluasi di setiap pertemuan</p>
        <hr class="bottom-line">
      </div>
      <div class="col-md-3 col-sm-3">
        <div class="price-table">
          <!-- Plan  -->
          <div class="pricing-head">
            <h4>Pertemuan 1</h4>
            <h5>instruktur : {{ $instruktur }}</h5>
          </div>

          <!-- Plean Detail -->
          <div class="price-in mart-15">
            <a href="/user/evaluasi1" class="btn btn-bg green btn-block">Lihat</a>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-3">
        <div class="price-table">
          <!-- Plan  -->
          <div class="pricing-head">
            <h4>Pertemuan 2</h4>
            <h5>instruktur : {{ $instruktur }}</h5>
          </div>

          <!-- Plean Detail -->
          <div class="price-in mart-15">
            <a href="#" class="btn btn-bg yellow btn-block">Lihat</a>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-3">
        <div class="price-table">
          <!-- Plan  -->
          <div class="pricing-head">
            <h4>Pertemuan 3</h4>
            <h5>instruktur : {{ $instruktur }}</h5>
          </div>
          <!-- Plean Detail -->
          <div class="price-in mart-15">
            <a href="#" class="btn btn-bg red btn-block">Lihat</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Pricing-->
@endsection
