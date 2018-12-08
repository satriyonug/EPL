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

<!--/ Pricing-->
@endsection
