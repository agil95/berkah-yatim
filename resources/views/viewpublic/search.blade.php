@extends('layouts.public')

@section('styles')
  @parent
  <link href="{{ asset('css/search.css') }}" rel="stylesheet">
@endsection

@section('navbar')
<header class="by-navbar by-navbar--page">
  <div class="by-container">
    <nav class="by-nav">
      <div class="by-nav__back">
        <img src="{{ asset('dist/img/ico-arrow-left.svg') }}" alt="back">
      </div>
      <input type="text" class="by-nav__search-bar" placeholder="Cari penggalangan" id="by-search-bar" autofocus>
    </nav>
  </div>
</header>
@endsection

@section('content')
<input type="hidden" name="url" id="api-url" value="{{ url('/api/search') }}">
<input type="hidden" name="token" id="api-token" value="{{ csrf_token() }}">
<div class="search-empty">
  <img src="{{ asset('dist/img/img-empty-search.svg') }}" alt="empty search" class="search-empty__img">
  <p class="text--subsubtitle text--gray mt-xl">Maaf, campaign yang kamu cari tidak ditemukan</p>
</div>
<section class="section search" id="search-result" data-asset="{{ asset('storage/') }}" data-proker-url="{{ url('proker') }}">
  <h2 class="text--gray mb-m">Hasil Pencarian</h2>
  <div class="search-list"></div>
</section>
<section class="section search" id="search-history" data-asset="{{ asset('storage/') }}" data-proker-url="{{ url('proker') }}">
  <h2 class="text--gray mb-m">Pencarian Terakhir</h2>
  <div class="search-list"></div>
</section>
<a id="search-card-template" href="#" class="search-card" hidden>
  <img src="/storage/fotobeasiswa/PRZp7aHHegPK268NZzPWxTaWqczt61IIBz07MtmX.jpeg" alt="" class="search-card__img">
  <p class="text--semibold search-card__text">Bantu renovasi madrasah pesantren attaufiqillah</p>
</a>
@stop

@section('scripts')
  @parent
  <script src="{{ asset('js/search.js') }}" type="text/javascript"></script>
@endsection
