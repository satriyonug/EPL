@extends('layouts.app')

@section('content')
<!--Testimonial-->
<section id="testimonial" class="section-padding">
  <div class="container">
    <div class="row">
      <div class="header-section text-center">
        <h2 class="white">Evaluasi dari Instruktur</h2>
        <!-- <p class="white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem nesciunt vitae,<br> maiores, magni dolorum aliquam.</p> -->
        <hr class="bottom-line bg-white">
      </div>
      <div class="col-md-1 col-sm-1">
        <!-- <div class="text-comment">
          <p class="text-par">"Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, nec sagittis sem"</p>
          <p class="text-name">Abraham Doe - Creative Dırector</p>
        </div> -->
      </div>
      <div class="col-md-10 col-sm-10">
        <div class="text-comment">
        @foreach($peserta as $peserta)
          <p class="text-par">{{ $peserta->evaluasi}}</p>
          <p class="text-name">{{$peserta->instruktur->nama}}</p>
          @endforeach
        </div>
      </div>
      <div class="col-md-1 col-sm-1">
        <!-- <div class="text-comment">
          <p class="text-par">"Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, nec sagittis sem"</p>
          <p class="text-name">Abraham Doe - Creative Dırector</p>
        </div> -->
      </div>
    </div>
  </div>
</section>
<!--/ Testimonial-->
@endsection
