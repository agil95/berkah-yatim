@extends('layouts.public')
@section('navbar')
    @include('layouts.navbar', ['page_title' => 'Profile', 'primary' => true])
@endsection 

@section('styles')
@parent
  <link href="{{ asset('css/donatur.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="section profile">
    <a href="{{ route('akun.detail') }}" class="profile-card">
        <div class="profile-card__img">
            <img src="{{ Auth::user()->profilePicture() }}" alt="{{ Auth::user()->name }}">
        </div>
        <p class="text--subsubtitle text--semibold profile-card__text">{{ Auth::user()->name }}</p>
    </a>
    <a href="{{ route('edit.password') }}" class="profile-card">
        <div class="profile-card__img">
            <img src="{{ asset('dist/img/ico-setting.svg') }}" alt="pengaturan" class="icon">
        </div>
        <p class="text--subsubtitle text--semibold profile-card__text">Pengaturan</p>
    </a>
</section>

<hr class="divider">

<section class="section profile">
    <a href="{{ route('faqpage') }}" class="profile-card">
        <div class="profile-card__img">
            <img src="{{ asset('dist/img/ico-faq.svg') }}" alt="faq" class="icon">
        </div>
        <p class="text--subsubtitle text--semibold profile-card__text">FAQ</p>
    </a>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="profile-card">
            <div class="profile-card__img">
                <img src="{{ asset('dist/img/ico-logout.svg') }}" alt="keluar" class="icon">
            </div>
            <p class="text--subsubtitle text--semibold profile-card__text">Keluar</p>
        </button>
    </form>
</section>

<hr class="divider">

<section class="section">
    <h1 class="text--subtitle text--semibold mt-l">Berkah Yatim</h1>
    <p class="text--caption my-s">
        Berkah Yatim adalah platform donasi dan penggalangan dana online yang 
        membantu program zakat, beasiswa pendidikan, sedekah dan bantuan sosial lainnya.
    </p>
    <div class="address">
        <p class="address__label text--semibold">Kantor Pusat</p>
        <p>: Jalan Raya Cilandak HQ No 31, Cilandak - Jakarta Selatan 12550 </p>
    </div>
    <div class="address">
        <p class="address__label text--semibold">Nomor Telepon</p>
        <p>: (021) 57852539</p>
    </div>
    <div class="address">
        <p class="address__label text--semibold">CS</p>
        <p>: halo@berkahyatim.com</p>
    </div>
</section>
@endsection

@section('bottom-nav')
    @include('layouts.bottom-nav', ['nav' => 'akun'])
@endsection
