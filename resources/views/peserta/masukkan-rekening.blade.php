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
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
        <form action="{{url('/masukkan-rekening')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
          <div class="form-group">
            <label for="exampleInputRekening">Nomor Rekening</label>
            <input type="text" class="form-control" id="no_rekening" name="no_rekening" placeholder="Nomor Rekening" required>
          </div>
          <input type="hidden" name="id_peserta" value="{{$id_peserta}}">
          <div class="form-group">
            <label for="exampleFormControlFile1">Bukti Pembayaran</label>
            <input type="file" class="form-control-file" id="foto_pembayaran" name="foto_pembayaran" required>
          </div>
          
          <button type="submit" class="btn btn-primary">Submit</button>

          @if(count($errors)>0)
              @foreach($errors->all() as $error)
                {{ $error}}
              @endforeach
            @endif
        </form>

          <!-- <form action="{{url('/masukkan-rekening')}}" method="post" id="workshop-newsletter-form">
            <h4 class="text-center">Masukkan nomor rekening pembayaran anda</h2>
            <input name="no_rekening" placeholder="Nomor rekening" type="text" >
            
            <input type="hidden" name="id_peserta" value="{{$id_peserta}}">
            {{csrf_field()}}
            <input class="cta-2-form-submit-btn" value="Kirim" type="submit">
            @if(count($errors)>0)
              @foreach($errors->all() as $error)
                <div class="alert alert-danger" ><p>Nomor Rekening must number</p></div>
              @endforeach
            @endif

          </form> -->
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Cta-->
@endsection
