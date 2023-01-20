@extends('layouts.public')

@section('navbar')
    @include('layouts.navbar', ['page_title' => $type,'primary'=>false])
@endsection

@section('content')
<div data-donation-scroll="true" data-donation-page="2" data-api-url="{{ url('/api/load') }}" data-donation-category="{{ $type }}">
  @foreach($proker as $prokers)
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
@stop