@extends('layouts.public')

@php
  $campaign_url = NULL;
  if (isset($donasi->url) && $donasi->url != 'zakat') {
    $campaign_url = url('campaign', $donasi->url) . '?referrer=summary';
  }
@endphp

@section('navbar')
  @include('layouts.navbar', ['page_title' => 'Instruksi Pembayaran', 'primary' => false, 'back_link' => $campaign_url])
@endsection

@section('styles')
  @parent
  <link href="{{ asset('css/summary.css') }}" rel="stylesheet">
@endsection

{{-- @json($donasi) --}}

@section('content')
<section class="section">
  <h1 class="text--title text--bold text--center pt-xl mb-s">Instruksi Pembayaran</h1>
  <p class="text--subsubtitle text--center">Transfer sesuai nominal di bawah ini:</p>
  <div class="summary-payment">
    <h3 class="summary-payment-nominal">
      Rp {{ format_uang(substr($donasi->jumlah,0,strlen($donasi->jumlah)-3))}}.<span class="text--copy">{{ substr($donasi->jumlah,-3) }}</span>
    </h3>
    <button type="button" class="summary-payment__btn-copy" onclick="navigator.clipboard.writeText('{{$donasi->jumlah}}');copyAction();" data-copy="{{ $donasi->jumlah }}">SALIN</button>
  </div>
  <div class="by-alert by-alert--warning by-alert--arrow-top py-s">
    <strong>PENTING!</strong> Mohon transfer tepat sampai 3 angka terakhir agar zakat terverifikasi otomatis

  </div>
  <div class="summary-detail mt-l">
    <div class="summary-detail-total">
      <p>No. Transaksi</p>
      <p class="text--right">{{$donasi->invoice}}</p>
    </div>
    <div class="summary-detail-total">
      <p>Jumlah</p>
      <p class="text--right">Rp {{ format_uang($donasi->jumlah)}}</p>
    </div>
    <div class="summary-detail-total">
      <p>Kode Unik (*)</p>
      <p class="text--right">{{ substr($donasi->jumlah,-3) }}</p>
    </div>
    <div class="summary-detail-total" style="display:none;">
      <p>Status</p>
      <p class="text--right">{{ $donasi->status }}</p>
    </div>
    <div class="summary-detail-total summary-detail-status loader-wrapper">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

  </div>
  <p class="text--caption mt-m">* 3 angka terakhir akan dizakatkan.</p>
</section>

<hr class="divider">

<section class="section py-l">
  <h3 class="text--subsubtitle text--center">
    Pembayaran dilakukan ke <strong>{{$donasi->rek['owner']}} - {{$donasi->rek['branch']}}</strong>:
  </h3>
  <div class="summary-detail py-l mt-l">
    <div class="summary-detail-transfer">
      <img class="summary-detail__img" src="{{ asset('img') }}/{{$donasi->type}}.png" alt="icon Transfer BCA">
      <p class="text--subtitle text--bold summary-detail__text">{{$donasi->rek['account']}}</p>
      <button class="summary-detail__btn-copy" onclick="copyAction();navigator.clipboard.writeText('{{$donasi->rek['account']}}');"  data-copy="{{$donasi->rek['account']}}">SALIN</button>
    </div>
  </div>
  <div class="by-alert by-alert--gray-ghost py-l mt-l">
    Transfer sebelum hari <strong>{{$donasi->created_at->addHours(6)->formatLocalized('%A, %e %B %G %H:%M')}}</strong> atau donasi kamu otomatis dibatalkan oleh sistem.
  </div>
</section>

<hr class="divider">
@if($donasi->rek['judul_panduan_pembayaran1'])
<section class="section py-l">
  <h3 class="text--subtitle text--semibold text--center">Panduan Pembayaran</h3>
  <div class="by-alert by-alert--gray-ghost py-m mt-l">
    @if($donasi->rek['judul_panduan_pembayaran1'])
    <div class="by-accordion">
      <div class="by-accordion-header">
        <h3 class="text--subsubtitle text--semibold">{{$donasi->rek['judul_panduan_pembayaran1']}}</h3>
      </div>
      <div class="by-accordion-body">
        {!!$donasi->rek['panduan_pembayaran1']!!}
      </div>
    </div>
    @endif
    @if($donasi->rek['judul_panduan_pembayaran2'])
    <div class="by-accordion">
      <div class="by-accordion-header">
        <h3 class="text--subsubtitle text--semibold">{{$donasi->rek['judul_panduan_pembayaran2']}}</h3>
      </div>
      <div class="by-accordion-body">
        {!!$donasi->rek['panduan_pembayaran2']!!}
      </div>
    </div>
    @endif
    @if($donasi->rek['judul_panduan_pembayaran3'])
    <div class="by-accordion">
      <div class="by-accordion-header">
        <h3 class="text--subsubtitle text--semibold">{{$donasi->rek['judul_panduan_pembayaran3']}}</h3>
      </div>
      <div class="by-accordion-body">
        {!!$donasi->rek['panduan_pembayaran3']!!}
      </div>
    </div>
    @endif

  </div>
</section>
@endif
<hr class="divider">

<section class="section py-l">
  <h3 class="text--subtitle text--semibold text--center">Bantu share penggalangan dana ini</h3>
  <div class="summary-share mt-l">
    <a target="_blank" href="https://api.whatsapp.com/send?text=Ayo bantu program {{ $donasi->prokers['nama_kegiatan'] }} di %20{{url('campaign',$donasi->url)}}" class="btn btn--primary btn--block btn--wa mb-l">
      <img src="{{ asset('dist/img/ico-whatsapp-white.svg') }}" class="btn__img-prepend" alt="facebook">
      Share
    </a>
    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{url('campaign',$donasi->url)}}" class="btn btn--primary btn--block btn--fb mb-l">
      <img src="{{ asset('dist/img/ico-fb-white.svg') }}" class="btn__img-prepend" alt="facebook">
      Share
    </a>
  </div>
  <a href="/" class="btn btn--ghost-primary btn--block">Kembali ke halaman galang dana</a>
</section>

<hr class="divider">

<section class="section py-l">
  @if($zakat)
  <h3 class="text--subtitle text--semibold text--center">Ingin membantu yang lain?</h3>
  <p class="text--center mt-m">Penggalangan berikut juga butuh bantuan Anda, lihat selengkapnya!</p>
  <div class="donation-item">
    <a href="{{ url('campaign',$zakat->url)}}"></a>
    <img src="{{ asset('storage/'. $zakat->dokumentasi) }}" alt="{{ $zakat->tag }}" class="donation-item__img">
    <div class="donation-item-content">
      <h3 class="donation-item__title">{{ $zakat->nama_kegiatan }} </h3>
      <div class="donation-item__progress">
        <div class="progress-bar" style="width: {{ $zakat->percent }}%"></div>
      </div>
      <div class="donation-item-nominal">
        <div class="nominal">
          <p class="nominal__label">Terkumpul</p>
          <p class="nominal__value">Rp {{ format_uang($zakat->actual_earn) }}</p>
        </div>
        <div class="nominal">
          <p class="nominal__label">Sisa hari</p>
          <p class="nominal__value">{{ $zakat->left_day }}</p>
        </div>
      </div>
    </div>
  </div>
  @endif
</section>
@endsection
@section('script')
@parent
<script src="{{ asset('js/summary.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/app-donasi.js') }}" type="text/javascript"></script>
<div id="popup" class="popper bg-green-200 fixed text-green-700 rounded border border-green-400 py-2 px-4" x-placement="top" style="position: absolute; display: none; will-change: transform; top: 0px; left: 0px;">
<script src="{{ asset('js/clipboard.min.js') }}"></script>
<script>
  var popup = $('#popup');

  function copyAction() {
        let toaster = document.querySelector('.by-toaster');
        toaster.innerHTML = "Berhasil disalin";
        toaster.classList.add('active');

        setTimeout(() => {
            toaster.classList.remove('active');
        }, 3000);
    }  
    function getStatus() {
    var id = "{{ $donasi->ref }}";
    var url = "{{ url('/')}}";

    $.ajax({
      url: "{{ url('/donasi-status/') }}/" + id,
    })
    .done(function (data) {
      if (data.status == 'pending') {// location.reload();
        $('.summary-detail-total').show();
        $(".loader-wrapper").hide();
      }else{
        $('.summary-detail-status').hide();
        location.href="{{url('donasi-summary-status')}}?ref="+data.ref
      }
    });
  };
  setInterval(function () {
    getStatus();
  }, 5000);
</script>
@endsection

