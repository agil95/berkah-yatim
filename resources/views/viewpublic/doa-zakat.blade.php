@extends('layouts.public')
@section('styles')
  @parent
  <link href="{{ asset('css/zakat.css') }}" rel="stylesheet">
@endsection

@section('navbar')
    @include('layouts.navbar', ['page_title' => 'Zakat', 'primary' => false ])
@endsection

@section('content')
<!-- SECTION: doa -->
<section class="section zakat-doa" id="section-doa">
  <img src="{{ asset('dist/img/zakat/ico-zakat-doa.svg') }}" alt="doa zakat">
  <p class="text--italic text--subsubtitle mt-xl">
    "Semoga Allah memberikan pahala kepadamu pada barang yang engkau berikan (zakatkan) 
    dan semoga Allah memberkahimu dalam harta-harta yang masih engkau sisakan dan semoga 
    pula menjadikannya sebagai pembersih (dosa) bagimu"
  </p>
  <a href="#" class="btn btn--primary btn--block mt-l">Aamiin</a>
</section>
<!-- END OF SECTION: doa -->
@stop
