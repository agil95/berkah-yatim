@extends('layouts.public')

@section('title', $proker->nama_kegiatan)

@section('styles')
  @parent
  <link href="{{ asset('css/proker.css') }}" rel="stylesheet">
@endsection

@php
  $referrer = isset($_GET['referrer']) ? $_GET['referrer'] : NULL;
  $back_link = $referrer ? '/' : NULL;
@endphp

@section('navbar')
    @include('layouts.navbar', ['page_title' => $proker->kategori['nama'], 'primary'=>false, 'back_link'=>$back_link])
@endsection

@section('content')

<section class="section section-proker section-proker-banner">
  <img src="{{ asset('storage/'.$proker->dokumentasi) }}" alt="{{ $proker->nama_kegiatan }}">
</section>

<section class="section section-proker section-proker-headline">
  <h1 class="headline__title">{{ $proker->nama_kegiatan }}</h1>
  <p class="headline__donation">
    <span class="headline__donation--total">Rp {{ number_format($proker->actual_earn, 0, ',', '.') }}</span>
    <span>terkumpul dari Rp {{ number_format($proker->target, 0, ',', '.') }}</span>
  </p>
  <div class="headline-progress">
    <div class="donation-item__progress">
      <div class="progress-bar" style="width: {{ $proker->percent }}%"></div>
    </div>
    <div class="progress-number">
      <p class="headline__donation">
        <span class="headline__donation--total">{{ count($mitraDonations) }}</span>
        <span>donatur</span>
      </p>
      <p class="headline__donation">
        <span class="headline__donation--total">{{ $proker->left_day ?? '&infin;' }}</span>
        @if ($proker->target_date->gt(\Carbon\Carbon::now()))
          <span>hari</span>
        @endif
      </p>
    </div>
  </div>
  <div class="headline-cta">
    <a href="{{ url('donasi-sekarang',$proker->url) }}?ref={{app('request')->input('ref')}} ">
      <button class="btn btn--primary btn--block" @if($proker->left_day=="Berakhir") disabled @endif>
        {{ $proker->kategori['nama_button'] }} 
      </button>
    </a>
  </div>
</section>

<hr class="divider">

<section class="section section-proker" id="proker-story">
  <div class="section-header">
    <h2 class="text--subtitle text--bold">Cerita</h2>
    <p class="text--subtitle text--gray">{{ $proker->created_at->formatLocalized('%e %B %G') }}</p>
  </div>
  <div class="story">
    {!! $proker->deskripsi !!}
    <button class="btn btn--rounded story-btn-expand">
      Baca selengkapnya
      <img src="{{ asset('dist/img/ico-chevron.svg') }}" alt="arrow down">
    </button>
  </div>
</section>

<hr class="divider">

@if (count($news) > 0)
<section class="section section-proker">
  <div class="section-header">
    <h2 class="text--subtitle text--bold">Kabar terbaru</h2>
  </div>
  <div class="update-card">
    <div class="update-header">
      @if ($news[0]->dokumentasi)
        <img src="{{ asset('storage/' . $news[0]->dokumentasi) }}" alt="{{ $news[0]->name }}" class="update-header__img">
      @else
        <span class="text--bold text--subtitle">{{ substr($news[0]->name, 0, 1) }}</span>
      @endif
      <div class="update-header-text">
        <h3 class="text--subsubtitle text--bold">{{ $news[0]->name }}</h3>
        <p class="text--caption text--gray">{{ $news[0]->created_at->diffInDays(now()) }} hari lalu</p>
      </div>
    </div>
    {!! $news[0]->deskripsi !!}
  </div>
  <div class="update-btn">
    <a class="btn btn--rounded" href="{{ url('proker/' . $proker->url . '/berita') }}">
      Kabar terbaru selengkapnya
      <img src="{{ asset('dist/img/ico-chevron.svg') }}" alt="arrow down">
    </a>
  </div>
</section>

<hr class="divider">
@endif

<section class="section section-proker">
  @if(session('status'))
  <div class="alert alert-success">
    {{session('status')}}
  </div>
  @elseif(session('gagal'))
  <div class="alert alert-danger">
    {{session('gagal')}}
  </div>
  @endif
  <div class="section-header">
    <h2 class="text--subtitle text--bold">Fundraiser ({{ $fundrisers->count()}})</h2>
  </div>
  @if (count($fundrisers) > 0)
  @foreach($fundrisers as $fundriser)
  <div class="donation-card mb-m">
    <div class="donation-img">
      <img src="{{ $fundriser->user->profilePicture() }}" alt="">
    </div>
    <div class="donation-content">
      <h3 class="text--subsubtitle text--primary text--bold mb-s">
        Dukung {{ $fundriser->user['name'] }} {{$proker->nama_kegiatan}}
      </h3>
      <p class="text--semibold">{{ $fundriser->user['name'] }}</p>
      <p class="text--caption text--gray">Mengajak {{ $fundriser->donaturs->count() }} orang berdonasi</p>
      <p class="text--subsubtitle text--bold mt-s">Rp {{ format_uang($fundriser->donaturs->sum('jumlah')) }}</p>
    </div>
  </div>
  @endforeach
  <div class="update-btn">
    <a class="btn btn--rounded" href="{{ url('penggalangan/listfundraiser',$proker->url)}}">
      Lihat semua
      <img src="{{ asset('dist/img/ico-chevron.svg') }}" alt="arrow down">
    </a>
  </div>
  @else 
  <div class="update-btn">
    <a href="{{ url('/penggalangan/fundraiser',$proker->url)}} " class="btn btn--ghost-primary btn-propose-fundraiser">
      Jadi fundraiser
  </a>
  </div>
  @endif
  {{-- <div class="donation-card mb-m">
    <div class="donation-img">
      <img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="">
    </div>
    <div class="donation-content">
      <h3 class="text--subsubtitle text--primary text--bold mb-s">
        Dukung Jojo Bangun 50 Shelter Pengungsi Lombok
      </h3>
      <p class="text--semibold">Jonathan Christie</p>
      <p class="text--caption text--gray">Mengajak 4170 orang berdonasi</p>
      <p class="text--subsubtitle text--bold mt-s">Rp 1.213.542.107</p>
    </div>
  </div> --}}
</section>

<hr class="divider">

<section class="section section-proker">
  <div class="section-header">
    <h2 class="text--subtitle text--bold">Donatur ({{ count($mitraDonations) }})</h2>
  </div>
  @foreach ($mitraDonations as $donation)
  <div class="donation-card mb-m">
    <div class="donation-img">
      @if ($donation->user)
          @if ($donation->user['activated']=='facebook' || $donation->user['activated']=='google')
              <img src="{{ $donation->user['foto'] }}" alt="{{ $donation->user['activated'] ?? 'Donatur' }}">
          @elseif($donation->user['foto'])
              <img src="{{ asset('storage/' . $donation->user['foto']) }}" alt="{{ $donation->user['activated'] ?? 'Donatur' }}">
          @else
              <span class="text--bold text--subtitle">{{ substr($donation->nama, 0, 1) }}</span>
          @endif
      @else
          <span class="text--bold text--subtitle">{{ substr($donation->nama, 0, 1) }}</span>
      @endif
    </div>
    <div class="donation-content">
      <h3 class="text--subsubtitle text--primary text--bold">
        {{ $donation->nama ?? 'Nama Donatur' }}
      </h3>
      <p class="text--subsubtitle">Donasi <span class="text--semibold">Rp {{ number_format($donation->jumlah, 0, ',', '.') }}</span></p>
      <p class="text--caption text--gray">{{ $donation->created_at->diffInDays(now()) }} hari yang lalu</p>
      <p class="mt-m">{{ $donation->message }}</p>
    </div>
  </div>
  @endforeach
</section>

<section class="section section-cta">
  <div class="by-container">
    <button class="btn btn--ghost-primary btn-proker-share">
      <img src="{{ asset('dist/img/ico-share.svg') }}" class="btn__img-prepend" alt="share">
      <span>Bagikan</span>
    </button>
    <a @if($proker->left_day=="Berakhir") href="#" @else href="{{url('donasi-sekarang',$proker->url)}}?utm_source=mobile-sticky-cta&ref={{app('request')->input('ref')}}" @endif class="btn btn--primary btn--block" @if($proker->left_day=="Berakhir") disabled @endif>
      <span>{{ $proker->kategori['nama_button'] }}</span>
    </a>
  </div>
</section>
@stop

@section('bottomsheet')
  @include('layouts.sharer', ['proker_name' => $proker->nama_kegiatan])
@endsection

@section('scripts')
  @parent
  <script src="{{ asset('js/proker.js') }}" type="text/javascript"></script>
@endsection
