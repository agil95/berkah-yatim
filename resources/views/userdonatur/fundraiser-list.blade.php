@extends('layouts.public')
@section ('title', 'Fundraiser List')
@section('navbar')
    @include('layouts.navbar', ['page_title' => 'Fundraiser', 'primary' => false])
@endsection

@section('content')
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/fundraiser.list.css')}}" />
    <section>
       <div class="fundraiser">
           @foreach($data as $item)
               <div class='row fundraiser-list'>
                   <div class='col-xs-3'><img alt='{{ env('APP_NAME') }}' class='img img-responsive fundraiser-list-image' src='{{ $item->user->profilePicture() }}' ></div>
                   <div class='col-xs-9'>
                       <h6 class='font-bold fundraiser-list-title'>{{$item->user["name"]}}</h6>
                       <p class="fundraiser-list-owner">{{$item["fundraiser"]}}</p>
                       <p class="fundraiser-list-participant">Mengajak {{ $item->donaturs->count() }} orang berdonasi</p>
                       <h6 class="fundraiser-list-price">Rp {{format_uang($item->donaturs->sum('jumlah'))}}</h6>
                   </div>
               </div>
           @endforeach
           <div class="w-100 text-center">
               <a href="{{ url('/penggalangan/fundraiser',$proker->url)}} " class="btn btn--ghost-primary btn-propose-fundraiser">
                   Jadi Fundraiser
               </a>
           </div>
       </div>
    </section>
@endsection
@section('script')
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/moment.js')}}"></script>
@endsection

@section('bottom-nav')
    @include('layouts.bottom-nav', ['nav' => 'home'])
@endsection
