@extends('layouts.email')

@php
  if ($donation->expired_at) {
    $expirationDate = new \Carbon\Carbon($donation->expired_at);
  } else {
    $expirationDate = \Carbon\Carbon::now();
  }
@endphp

@section('content')
  <p class="paragraph" style="font-size: 16px;line-height: 24px;margin-top: 10px;">
    Terima kasih {{ $donation->nama }} atas niat kamu berbagi kebaikan <b>{{ $donation->prokers == null? 'untuk program Zakat' : 'untuk '.$donation->prokers['nama_kegiatan'] }}</b>
  </p>
  <div class="divider" style="margin-top: 30px;margin-bottom: 30px;border-top: 1px dashed #e8e8e8;"></div>
  {{-- <h3 class="heading" style="font-size: 16px;line-height: 24px;margin-top: 10px;margin-bottom: 20px;font-weight: 600;">
    <strong class="bold-text" style="color: #3a3a3a;font-size: 21px;font-weight: 600;">Assalmu'alaikum wr wb,</strong>
  </h3> --}}
  <p class="paragraph" style="font-size: 14px;line-height: 21px;margin-top: 10px;">
    Mohon selesaikan transaksi no {{ $donation->invoice }} dengan transfer sejumlah <b>Rp {{ number_format($donation->jumlah, 0, ',', '.') }}</b> ke: <br>
    @if($donation->type!='gopay')
    <b>No Rek {{ $donation->no_rekening ? $donation->no_rekening : $donation->rek->account }}</b> <br>
    <b>Bank {{ $donation->rek ? $donation->rek->branch : null }} A.n {{ $donation->rek ? $donation->rek->owner : null }}</b>
    @else
    <b>Merchant ID {{ $donation->no_rekening ? $donation->no_rekening : $donation->rek->account }}</b> <br>
    <b>{{ $donation->rek ? $donation->rek->branch : null }} A.n {{ $donation->rek ? $donation->rek->owner : null }}</b>
    @endif
  </p>
  <p class="paragraph" style="font-size: 14px;line-height: 21px;margin-top: 10px;">
    Lakukan transfer tepat hingga 3 digit terakhir sebelum <b>{{ $expirationDate->formatLocalized('%A, %e %B %G %H:%M') }}</b> agar transaksi kamu dapat tercatat otomatis ke dalam sistem kami.
  </p>
  <p class="paragraph" style="font-size: 14px;line-height: 21px;margin-top: 10px;">
    Kamu dapat transfer dengan metode apapun (ATM/mobile banking/sms banking/internet banking/teller).
  </p>

  {{-- @if ($donation->rek && isset($donation->rek->judul_panduan_pembayaran1) && isset($donation->rek->panduan_pembayaran1))
  <p class="paragraph" style="font-size: 14px;line-height: 21px;margin-top: 10px;">
    <span style="font-weight:700;">{{ $donation->rek->judul_panduan_pembayaran1 }}</span>
    {!! $donation->rek->panduan_pembayaran1 !!}
  </p>
  @endif
  
  @if ($donation->rek && isset($donation->rek->judul_panduan_pembayaran2) && isset($donation->rek->panduan_pembayaran2))
  <p class="paragraph" style="font-size: 14px;line-height: 21px;margin-top: 10px;">
    <span style="font-weight:700;">{{ $donation->rek->judul_panduan_pembayaran2 }}</span>
    {!! $donation->rek->panduan_pembayaran2 !!}
  </p>
  @endif
  
  @if ($donation->rek && isset($donation->rek->judul_panduan_pembayaran3) && isset($donation->rek->panduan_pembayaran3))
  <p class="paragraph" style="font-size: 14px;line-height: 21px;margin-top: 10px;">
    <span style="font-weight:700;">{{ $donation->rek->judul_panduan_pembayaran3 }}</span>
    {!! $donation->rek->panduan_pembayaran3 !!}
  </p>
  @endif
   --}}

  <p class="paragraph" style="font-size: 14px;line-height: 21px;margin-top: 10px;">
    Maksimal 1 hari kerja (di luar jam kerja bank atau hari libur), transaksi kamu akan terverifikasi oleh sistem.
  </p>
  <p class="paragraph" style="font-size: 14px;line-height: 21px;margin-top: 10px;">
    Kamu akan mendapat pemberitahuan via email atau whatsapp ketika donasi kamu telah selesai diverifikasi atau gagal.
  </p>
  <p class="paragraph" style="font-size: 14px;line-height: 21px;margin-top: 10px;">
    Apabila hingga <b>{{ $expirationDate->formatLocalized('%A, %e %B %G %H:%M') }}</b> transaksi belum dilakukan, maka donasi akan otomatis <b>dibatalkan</b> oleh sistem.
  </p>
  <p class="paragraph" style="font-size: 14px;line-height: 21px;margin-top: 10px;">
    Jika butuh bantuan, atau ada pertanyaan. silakan membalas email ini.
  </p>
@endsection