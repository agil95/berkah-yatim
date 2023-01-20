@extends('layouts.public')
@section('styles')
  @parent
  <link href="{{ asset('css/zakat.css') }}" rel="stylesheet">
@endsection

@section('navbar')
<header class="by-navbar by-navbar--page">
  <div class="by-container">
    <nav class="by-nav">
      <div class="by-nav__back">
        <img src="{{ asset('dist/img/ico-arrow-left.svg') }}" alt="back">
      </div>
      <h2 class="by-nav__page-title">Zakat</h2>
      <button type="button" class="by-nav__action text--subtitle text--semibold btn-share-zakat">
        <img src="{{ asset('dist/img/ico-share-black.svg') }}" alt="share">
      </button>
    </nav>
  </div>
</header>
@endsection

@section('content')
<!-- SECTION: form -->
<section class="section" id="section-form" style="display: block;">
  <ul class="by-tabs" role="tablist">
    <li class="tab-item">
      <a href="#profesi" id="profesi-tab" class="tab-item__link active" data-toggle="tab" aria-controls="profesi" aria-selected="true">
        <img src="{{ asset('dist/img/zakat/ico-zakat-profesi-active.svg') }}" alt="zakat profesi" class="nav-item__img" data-active="true">
        <img src="{{ asset('dist/img/zakat/ico-zakat-profesi.svg') }}" alt="zakat profesi" class="nav-item__img" data-active="false">
        Profesi
      </a>
    </li>
    <li class="tab-item">
      {{-- remove comment in data-toggle to enable tab --}}
      <a href="#maal" id="maal-tab" class="tab-item__link" {{-- data-toggle="tab" --}} aria-controls="maal" aria-selected="false">
        <img src="{{ asset('dist/img/zakat/ico-zakat-maal-active.svg') }}" alt="zakat maal" class="nav-item__img" data-active="true">
        <img src="{{ asset('dist/img/zakat/ico-zakat-maal.svg') }}" alt="zakat maal" class="nav-item__img" data-active="false">
        Maal
      </a>
    </li>
    <li class="tab-item">
      {{-- remove comment in data-toggle to enable tab --}}
      <a href="#fitrah" id="fitrah-tab" class="tab-item__link" {{-- data-toggle="tab" --}} aria-controls="fitrah" aria-selected="false">
        <img src="{{ asset('dist/img/zakat/ico-zakat-fitrah-active.svg') }}" alt="zakat fitrah" class="nav-item__img" data-active="true">
        <img src="{{ asset('dist/img/zakat/ico-zakat-fitrah.svg') }}" alt="zakat fitrah" class="nav-item__img" data-active="false">
        Fitrah
      </a>
    </li>
  </ul>

  {{-- Alert Section --}}
  @if ($errors->has('name'))
  <div class="by-alert my-m py-m" role="alert">
    <strong>{{ $errors->first('name') }}</strong>
  </div>
  @endif
  @if ($errors->has('wa_or_email'))
  <div class="by-alert my-m py-m" role="alert">
    <strong>The email must be a valid email address.</strong>
  </div>
  @endif
  @if ($errors->has('zakat-payment-type'))
  <div class="by-alert my-m py-m" role="alert">
    <strong>{{ $errors->first('zakat-payment-type') }}</strong>
  </div>
  @endif
  {{-- Ends of Alert Section --}}

  <div class="by-tabs-content pt-m">
    <div class="tab-pane show" id="profesi" role="tabpanel" aria-labelledby="profesi-tab">
       @if(session('status'))
			<div class="alert alert-success">
				{{session('status')}}
			</div>
			@elseif(session('gagal'))
			<div class="alert alert-danger">
				{{session('gagal')}}
			</div>
      @endif	
      @if ($errors->has('invoice'))
          <div class="alert alert-danger my-m py-m">
              <strong>{{ $errors->first('invoice') }}</strong>
          </div>
      @endif     
      <div class="input-group">
        <label for="salary">Pendapatan gaji per bulan <span class="text--primary">*</span></label>
        <input type="text" data-mask="000.000.000.000.000"
        data-mask-reverse="true"
        autocomplete="off"
        maxlength="13" name="salary" id="salary" required class="input mt-s" placeholder="Masukkan gaji kamu">
      </div>
      <div class="input-group">
        <label for="other">Pendapatan lain</label>
        <input type="text" data-mask="000.000.000.000.000"
        data-mask-reverse="true"
        autocomplete="off"
        maxlength="13" name="other" id="other" class="input mt-s" placeholder="Opsional, jika ada">
      </div>
      <div class="input-group">
        <label for="debt">Hutang/Cicilan</label>
        <input type="text" data-mask="000.000.000.000.000"
        data-mask-reverse="true"
        autocomplete="off"
        maxlength="13" name="debt" id="debt" class="input mt-s" placeholder="Opsional, jika ada">
      </div>
     	
    </div>
    <div class="tab-pane" id="maal" role="tabpanel" aria-labelledby="maal-tab">
      <div class="input-group">
        <label for="deposito">Nilai deposito/Tabungan/Giro</label>
        <input type="text" data-filter="number" name="deposito" id="deposito" class="input mt-s" placeholder="Opsional, jika ada">
      </div>
      <div class="input-group">
        <label for="property">Nilai properti & kendaraan</label>
        <input type="text" data-filter="number" name="property" id="property" class="input mt-s" placeholder="Opsional, jika ada">
      </div>
      <div class="input-group">
        <label for="gold">Emas, perak, permata atau sejenisnya</label>
        <input type="text" data-filter="number" name="gold" id="gold" class="input mt-s" placeholder="Opsional, jika ada">
      </div>
      <div class="input-group">
        <label for="stocks">Saham, piutang dan surat-surat berharga lainnya</label>
        <input type="text" data-filter="number" name="stocks" id="stocks" class="input mt-s" placeholder="Opsional, jika ada">
      </div>
      <div class="input-group">
        <label for="liability">Hutang probadi yang jatuh tempo tahun ini</label>
        <input type="text" data-filter="number" name="liability" id="liability" class="input mt-s" placeholder="Opsional, jika ada">
      </div>
    </div>
    <div class="tab-pane" id="fitrah" role="tabpanel" aria-labelledby="fitrah-tab">
      <div class="input-group">
        <label for="total">Jumlah orang <span class="text--primary">*</span></label>
        <input type="text" data-filter="number" name="total" id="total" class="input mt-s" placeholder="Masukkan jumlah wajib zakat">
      </div>
    </div>
  </div>
</section>
<!-- END OF SECTION: form -->

<!-- SECTION: payment list -->
<section class="section" id="section-payment" style="display: none;">
  @include('layouts.payment-list')
</section>
<!-- END OF SECTION: payment list -->
@stop

@section('bottomsheet')
<!-- BOTTOM SHEET: share -->
<div data-bottomsheet="share" style="display: none;">
  @include('layouts.sharer', ['proker_name' => 'Berzakat sekarang', 'share_title' => 'Share'])
</div>
<!-- END OF BOTTOM SHEET: share -->

<!-- BOTTOM SHEET: summary -->
<div data-bottomsheet="zakat-summary" style="display: block;">
  <div class="by-bottomsheet-header">
    <h3 class="text--subtitle"></h3>
    <button class="by-bottomsheet__btn-close">&times;</button>
  </div>
  <h2 class="text--subtitle text--center">Hasil Perhitungan Zakat Profesi</h2>
  <div class="zakat-summary">
    <h3 class="zakat-summary-nominal">-</h3>
    <button type="button" class="zakat-summary__btn-copy">Salin</button>
  </div>
  <form action="{{ url('donasi-sekarang/zakat') }}?ref={{app('request')->input('ref')}}" id="form-zakat" method="POST">
    @csrf
    <input type="hidden" required name="total" value="0" id="zakat-nominal">
    <input type="hidden" name="program" value="zakat">
    <input type="hidden" required name="zakat-payment-type" value="" id="zakat-payment-type">
    <input type="text" autocomplete="off" required name="name" class="input mt-s" placeholder="Nama Lengkap">
    <input type="email" autocomplete="off" required name="wa_or_email" class="input mt-l" placeholder="Email">
    <div class="input-group-switch mt-m">
      <label for="anonim" class="text--gray">Sembunyikan nama saya (Anonim)</label>
      <label class="switch">
        <input type="checkbox" name="anonim" id="anonim">
        <span class="switch-slider"></span>
      </label>
    </div>
    <div class="zakat-payment mt-m">
      <img alt="" class="zakat-payment__img" style="display: none;">
      <p class="text--subsubtitle zakat-payment__text">Metode Pembayaran</p>
      <button type="button" class="btn btn--rounded zakat-payment__btn">
        Pilih
        <img src="{{ asset('dist/img/ico-chevron.svg') }}" alt="arrow down">
      </button>
    </div>
    <div class="by-alert my-m py-m" role="alert" id="payment-type-alert" style="display: none;">
      <strong>Metode pembayaran belum dipilih</strong>
    </div>
    <input type="submit" class="btn btn--primary mt-l btn--block btn-confirm" value="Tunaikan Sekarang">
  </form>
</div>
<!-- END OF BOTTOM SHEET: summary -->

<!-- BOTTOM SHEET: empty state -->
<div data-bottomsheet="zakat-empty" style="display: none;">
  <div class="by-bottomsheet-header">
    <h3 class="text--subtitle"></h3>
    <button class="by-bottomsheet__btn-close">&times;</button>
  </div>
  <div class="zakat-empty">
    <h2 class="text--subtitle text--center">Zakat Belum Memenuhi Nisab</h2>
    <img src="{{ asset('dist/img/zakat/img-zakat-emptystate.png') }}" class="zakat-empty__img" alt="belum memenuhi nisab">
    <div class="by-alert py-l text--center my-l">
      Salurkan ke <span class="text--primary">program zakat</span> lainnya
    </div>
    <a href="/categories/Zakat" class="btn btn--primary btn--block">
      Zakat Sekarang
    </a>
    <button class="btn btn--ghost-primary btn--block btn-hitung-ulang mt-m by-bottomsheet__btn-close">
      Hitung Ulang
    </button>
  </div>
</div>
<!-- END OF BOTTOM SHEET: empty state -->
@endsection

@section('bottom-nav')
<div class="by-bottom-nav by-container plain py-m" style="display: block;">
  <div class="by-bottom-nav-card">
    <button type="submit" class="btn btn--primary btn--block btn-zakat" disabled>Hitung Zakat</button>
  </div>
</div>
@endsection

@section('scripts')
  @parent
  <script src="{{ asset('js/zakat.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/jquery.mask.js') }}" type="text/javascript"></script>

  <script>
	$(document).ready(function() {
	  $('.btn-confirm').on("click", function () {
        total = $('.zakat-summary-nominal').text();
        $('#zakat-nominal').val(total);
      });
      $('.btn-hitung-ulang').on("click", function () {
        $('#salary').val('');
        $('#other').val('');
        $('#debt').val('');
      });      
	});
</script>
@endsection