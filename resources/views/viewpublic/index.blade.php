@extends('layouts.public')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
<section class="section slider">
  <div class="slider-banner">
    @foreach($banner as $banners)
    <a href="{{ url('proker', $banners->link) }}" class="slider-item">
      <img src="{{ asset('storage/'. $banners->dokumentasi) }}" class="slider-item__img" alt="">
    </a>
    @endforeach
  </div>
</section>

<section class="section category">
  <h2 class="section-title">Bagikan kebaikan sesuai preferensi</h2>
  <div class="category-list">
    @foreach($kategori as $category_item)
    <div class="category-item">
      <a href="{{ url('categories', $category_item->nama) }}"></a>
      <img src="{{ asset('storage/' . $category_item->dokumentasi) }}" alt="kategori zakat" />
      <p>{{ $category_item->nama }}</p>
    </div>
    @endforeach
    <div class="category-item">
      <a href="{{ url('categories', 'Semua') }}"></a>
      <img src="{{ asset('dist/img/home/ico-category-lainnya.svg') }}" alt="semua kategori" />
      <p>Lihat Semua</p>
    </div>
  </div>
</section>

<section class="section zakat">
  <h2 class="section-title">Tunaikan Zakat</h2>
  <p class="section-desc">Hitung kewajiban berzakat di sini</p>
  <a href="{{ route('kalkulatorzakat') }}" class="zakat__banner">
    <img src="{{ asset('dist/img/home/img-banner-zakat.png') }}" alt="banner zakat">
  </a>
</section>

<section class="section donation">
  <h2 class="section-title">Bagikan Kebaikan</h2>
  <p class="section-desc">Pilih programnya segerakan bantu sesama</p>
  <div data-donation-scroll="true" data-donation-page="2" data-api-url="{{ url('/api/load') }}">
    @foreach($infak as $prokers)
    <div class="donation-item" data-href="{{ url('campaign') }}" data-asset="{{ asset('storage/') }}">
      <a href="{{ url('campaign',$prokers->url) }}"></a>
      <img src="{{ asset('storage/'. $prokers->dokumentasi) }}" alt="{{ $prokers->tag }}" class="donation-item__img">
      <div class="donation-item-content">
        <h3 class="donation-item__title">{{ $prokers->nama_kegiatan }}</h3>
        <div class="donation-item__progress">
          <div class="progress-bar" style="width: {{ $prokers->percent }}%"></div>
        </div>
        <div class="donation-item-nominal">
          <div class="nominal">
            <p class="nominal__label">Terkumpul</p>
            <p class="nominal__value">Rp {{ format_uang($prokers->actual_earn) }}</p>
          </div>
          <div class="nominal">
            <p class="nominal__label">Sisa hari</p>
            <p class="nominal__value">{{ $prokers->left_day }}</p>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="donation-item donation-item-loading">
    <div class="donation-item__img by-shimmer"></div>
    <div class="donation-item-content">
      <div class="by-shimmer mb-s" style="width: 100%; height: 12px; border-radius: 4px;"></div>
      <div class="by-shimmer" style="width: 50%; height: 12px; border-radius: 4px;"></div>
    </div>
  </div>
</section>
@stop

@section('fab-wa')
<div class="by-fab-container">
  <div class="by-container">
    <a href="https://api.whatsapp.com/send?phone=6281284064281&amp;text=Assalaamualaikum%20admin%20...%0A%0A%0ASumber%20info%3A%20https://www.berkahyatim.com" title="Kirim Pesan" target="_blank" class="by-fab-wa">
      <img src="{{ asset('dist/img/ico-whatsapp-white.svg') }}" alt="whatsapp">
    </a>
  </div>
</div>
@endsection

@section('bottom-nav')
    @include('layouts.bottom-nav', ['nav' => 'home'])
@endsection
