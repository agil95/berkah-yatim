@extends('layouts.public')
@section ('title', 'Fundraiser')
@section('navbar')
    @include('layouts.navbar', ['page_title' => 'Fundraiser', 'primary' => false])
@endsection

@section('content')
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/fundraiser.css')}}" />
    <section>
        <div class="fundraiser">
            <h4 class="fundraiser-tittle">
                Terima kasih {{$user->name}} sudah bergabung menjadi fundraiser dari program ini
            </h4>
            <img alt='{{ env('APP_NAME') }}' class='img img-responsive fundraiser-image' src='{{asset('img/fundraiser.png') }}' >
            <h4 class="fundraiser-description"> Salin link di bawah ini untuk disebarkan via Facebook, WhatsApp, dan Instagram.</h4>
            <h5 id="fundraiser-link" class="fundraiser-link">
                {{ url('campaign',$link->url) }}?ref={{$user->id}}
            </h5>
            <button id="btn-copy-link" onclick="navigator.clipboard.writeText('  {{ url('campaign',$link->url) }}?ref={{$user->id}};');copyAction()" class="btn btn--primary fundraiser-button">Salin Link</button>
        </div>
    </section>
@endsection
@section('script')
    @parent
    <script type="text/javascript">
        function copyAction() {
            let toaster = document.querySelector('.by-toaster');
            toaster.innerHTML = "Link berhasil disalin";
            toaster.classList.add('active');

            setTimeout(() => {
                toaster.classList.remove('active');
            }, 3000);
        }
    </script>
@endsection

@section('bottom-nav')
    @include('layouts.bottom-nav', ['nav' => 'home'])
@endsection
