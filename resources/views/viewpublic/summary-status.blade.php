@extends('layouts.public')
@section('navbar')
  @include('layouts.navbar', ['page_title' => 'Status Pembayaran', 'primary' => false])
@endsection

@section('styles')
  @parent
  <link href="{{ asset('css/summary.css') }}" rel="stylesheet">
@endsection

@php
  $title = 'Data Donasi Tidak Ditemukan';
  $img = asset('dist/img/summary/img-payment-failed.png');
  $desc = 'Silakan menghubungi contact center halo@berkahyatim.com.';

  if($donasi){
    if ($donasi['status'] == 'success') {
      $title = 'Pembayaran Berhasil';
      $img = asset('dist/img/summary/img-payment-success.png');
      $desc = 'Donasimu sebesar Rp '.format_uang($donasi->jumlah).' telah kami salurkan';
    } elseif ($donasi['status'] == 'cancel') {
      $title = 'Pembayaran Belum Berhasil';
      $img = asset('dist/img/summary/img-payment-failed.png');
      $desc = 'Pembayaran belum berhasil, silakan berdonasi kembali.';
    }elseif ($donasi['status'] == 'pending') {
      $title = 'Pembayaran Sedang Diproses';
      $img = asset('dist/img/summary/img-payment-processing.png');
      $desc = 'Silakan menunggu untuk kami verifikasi. Jika proses pembayaran kamu gagal, silakan berdonasi kembali.';
    }elseif($donasi['status'] == 'verified') {
      $title = 'Pembayaran Berhasil diverifikasi';
      $img = asset('dist/img/summary/img-payment-success.png');
      $desc = 'Donasimu sebesar Rp '.format_uang($donasi->jumlah).' telah kami terima';
    }elseif ($donasi['status'] == 'expired'||$donasi['status'] == 'expire') {
      $title = 'Pembayaran Telah Kadaluarsa';
      $img = asset('dist/img/summary/img-payment-failed.png');
      $desc = 'Pembayaran telah kadaluarsa, silakan berdonasi kembali.';
    }
}
@endphp

@section('content')
<section class="section pt-xl">
  <h1 class="text--title text--semibold text--center mt-l">
    {{ $title }}
  </h1>
  <img src="{{ $img }}" alt="{{ $title }}" class="summary-status__img">
  <p class="text--subsubtitle text--center summary-status__text">{{ $desc }}</p>
</section>

<hr class="divider">

<section class="section py-l">
  @if ($donasi==null)
    <h3 class="text--subsubtitle text--center mb-l summary-status__text">Bantu {{ env('APP_NAME') }} mencapai target donasi</h3>
    <a href="{{ url('/')}}" class="btn btn--primary btn--block mb-m">Donasi Lagi</a>
  @else
    <h3 class="text--subsubtitle text--center mb-l summary-status__text">Bantu @if($donasi->prokers==null) <strong>Program Zakat </strong> @else <strong>{{ $donasi->prokers['nama_kegiatan'] }}</strong> @endif mencapai target donasi</h3>
    @if ($donasi->prokers==null)
    <a target="_blank" href="https://api.whatsapp.com/send?text=Ayo bersihkan harta kamu dengan zakat%20{{url('kalkulator-zakat')}}" class="btn btn--primary btn--block btn--wa mb-m">
      <img src="{{ asset('dist/img/ico-whatsapp-white.svg') }}" class="btn__img-prepend" alt="facebook">
      Share
    </a>
    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url('kalkulator-zakat')}}" class="btn btn--primary btn--block btn--fb mb-m">
      <img src="{{ asset('dist/img/ico-fb-white.svg') }}" class="btn__img-prepend" alt="facebook">
      Share
    </a>
    @else
    <a target="_blank" href="https://api.whatsapp.com/send?text=Ayo bantu program {{ $donasi->prokers['nama_kegiatan'] }}%20{{url('campaign',$donasi->url)}}" class="btn btn--primary btn--block btn--wa mb-m">
      <img src="{{ asset('dist/img/ico-whatsapp-white.svg') }}" class="btn__img-prepend" alt="facebook">
      Share
    </a>
    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url('campaign',$donasi->url)}}" class="btn btn--primary btn--block btn--fb mb-m">
      <img src="{{ asset('dist/img/ico-fb-white.svg') }}" class="btn__img-prepend" alt="facebook">
      Share
    </a>
    @endif
  @endif
  <a href="/" class="btn btn--ghost-primary btn--block">Kembali ke halaman galang dana</a>
</section>
@endsection


