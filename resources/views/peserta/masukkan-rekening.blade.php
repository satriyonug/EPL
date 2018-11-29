@extends('layouts.app')

@section('content')
<!--Cta-->
<section id="cta-2">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="text-center">Menunggu pembayaran</h2>
        <p class="cta-2-txt">Lakukan pembayaran sebesar Rp{{ number_format($jumlahtagihan, 0, ',', '.')  }} ke rekening 12345678 A.N KURSUS SITI BERSAUDARA</p>
        <p class="cta-3-txt">Pembayaran akan diverifikasi dalam waktu 1x24 jam</p>
        <div class="cta-2-form text-center">
          <form action="{{url('/masukkan-rekening')}}" method="post" id="workshop-newsletter-form">
            <h4 class="text-center">Masukkan nomor rekening pembayaran anda</h2>
            <input name="no_rekening" placeholder="Nomor rekening" type="text">
            <input type="hidden" name="id_peserta" value="{{$id_peserta}}">
            {{csrf_field()}}
            <input class="cta-2-form-submit-btn" value="Kirim" type="submit">
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Cta-->
@endsection
