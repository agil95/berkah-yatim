@extends('layouts.public')
@section('navbar')
  @include('layouts.navbar', ['page_title' => 'Instruksi Pembayaran', 'primary' => false])
@endsection

@section('styles')
  @parent
  <link href="{{ asset('css/summary.css') }}" rel="stylesheet">
@endsection

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
      <p>Status</p>
      <p class="text--right summary-detail-status">@if($donasi->status=='settlement') success @else {{ $donasi->status }} @endif</p>
    </div>
    <div class="summary-detail-total loader-wrapper">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

  </div>
</section>

<hr class="divider">

<section class="section py-l">
  <h3 class="text--subsubtitle text--center">
    Pembayaran dilakukan ke Virtual Account <strong>{{ env('APP_NAME') }}</strong>:
  </h3>
  <div class="summary-detail py-l mt-l">
    <div class="summary-detail-transfer">
      <img class="summary-detail__img" src="{{ asset('img') }}/{{$donasi->type}}.png" alt="icon Transfer BCA">
      <p id="no_rekening" class="text--subtitle text--bold summary-detail__text"></p>
    </div>
  </div>
    <div class="summary-detail-transfer btn-bayar mt-l">
      <a href="javascript:;" id="pay-now" class="btn btn--primary btn--block mb-l">Bayar Sekarang</a>
  </div>  

  <div class="by-alert by-alert--gray-ghost py-l mt-l">
    Transfer sebelum <strong>{{$donasi->created_at->addDays(1)}}</strong> atau zakat kamu otomatis dibatalkan oleh sistem.
  </div>
</section>

<hr class="divider">

<section class="section py-l">
  <h3 class="text--subtitle text--semibold text--center">Bantu share penggalangan dana ini</h3>
  <div class="summary-share mt-l">
    <a target="_blank" href="https://api.whatsapp.com/send?text=Ayo bersihkan harta kamu dengan zakat%20{{url('campaign',$donasi->url)}}" class="btn btn--primary btn--block btn--wa mb-l">
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

@section('modal')
<div class="summary-doa">
  <img src="{{ asset('dist/img/zakat/ico-zakat-doa.svg') }}" alt="doa zakat">
  <p class="text--italic text--subsubtitle mt-xl">
    "Semoga Allah memberikan pahala kepadamu pada barang yang engkau berikan (zakatkan) 
    dan semoga Allah memberkahimu dalam harta-harta yang masih engkau sisakan dan semoga 
    pula menjadikannya sebagai pembersih (dosa) bagimu"
  </p>
  <button type="button" class="btn btn--primary btn--block mt-l by-modal__btn-close">Aamiin</button>
</div>
@endsection

@section('script')
@parent
<script src="{{ asset('js/summary.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/app-donasi.js') }}" type="text/javascript"></script>
<div id="popup" class="popper bg-green-200 fixed text-green-700 rounded border border-green-400 py-2 px-4" x-placement="top" style="position: absolute; display: none; will-change: transform; top: 0px; left: 0px;">
<script src="{{ asset('js/clipboard.min.js') }}"></script>
<script src="{{ !config('services.midtrans.isProduction') ? asset('js/snap.sanbox.js') : asset('js/snap.production.js') }}" data-client-key="{{ config('services.midtrans.clientKey') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-now').onclick = function() {
        doSnap()
    };
    doSnap();
    getStatus();
    var intervalID;
    var popup = $('#popup');
    function doSnap() {
        status = "{{ $donasi->status }}";

        if (status == "pending") {
            snap.pay('{{ $donasi->snap_token }}', {
                onSuccess: function(result) {
                    console.log(result);
                },
                onPending: function(result) {
                    console.log(result);

                    intervalID = setInterval(function() {
                        getStatus();
                    }, 5000);

                },
                onError: function(result) {
                    console.log(result);
                }
            });
        }
    }

    function getStatus() {

        var id = "{{ $donasi->ref }}";

        $.ajax({
                url: "{{ url('/donasi-status/') }}/" + id,
            })
            .done(function(result) {
                if (result['transaction_status'] == 'pending' || result === undefined) {
                    $('#btn-copy').show();
                    if(result["va_number"]!=undefined){
                      $('#no_rekening').html(result["va_number"]);
                      $('#btn_copy').find('a').data('clipboard-text',result["va_number"]);
                    }
                } else {
                    clearInterval(intervalID);
                    $('.summary-detail-status').val(result['transaction_status']);
                    $('#no_rekening').html(result["va_number"]);
                    $(".loader-wrapper").hide();
                    $(".btn-bayar").hide();        
                    $(".by-alert").hide();       
                    $(".summary-payment__btn-copy").hide();                                                           
                }
            }).error(function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.statusText);
            });
    };

    function copyAction() {
        let toaster = document.querySelector('.by-toaster');
        toaster.innerHTML = "Berhasil disalin";
        toaster.classList.add('active');

        setTimeout(() => {
            toaster.classList.remove('active');
        }, 3000);
    }  
</script>
@endsection

