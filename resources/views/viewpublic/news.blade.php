@extends('layouts.public')

@section('styles')
  @parent
  <link href="{{ asset('css/proker.css') }}" rel="stylesheet">
@endsection

@section('navbar')
    @include('layouts.navbar', ['page_title' => 'Kabar Terbaru', 'primary' => false])
@endsection

@section('content')
<section class="section section-proker pt-l">
  @foreach($news as $update)
  <div class="update-card">
    <div class="update-header">
      <img src="{{ asset('storage/' . $update->dokumentasi) }}" alt="{{ $news[0]->name }}" class="update-header__img">
      <div class="update-header-text">
        <h3 class="text--subsubtitle text--bold">{{ $update->name }}</h3>
        <p class="text--caption text--gray">{{ $update->created_at->diffInDays(now()) }} hari lalu</p>
      </div>
    </div>
    {!! $update->deskripsi !!}
  </div>
  @endforeach
</section>
@stop
