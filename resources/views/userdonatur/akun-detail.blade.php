@extends('layouts.public')
@section ('title', 'Edit Profile')

@section('styles')
  @parent
  <link href="{{ asset('css/donatur.css') }}" rel="stylesheet">
@endsection

@section('navbar')
    @include('layouts.navbar', [
        'page_title' => 'Account',
        'primary' => false,
        'action_text' => 'Edit',
        'action_link' => route('akun.edit'),
        'back_link' => '/donatur/akun'
    ])
@endsection

@section('content')
<section class="section detail pt-m">
    @if(session('status'))
    <div class="by-alert py-s">
        {{session('status')}}
    </div>
    @elseif(session('gagal'))
    <div class="by-alert by-alert--warning py-s">
        {{session('gagal')}}
    </div>
    @endif
    @if (count($errors) > 0)
    <div class="by-alert by-alert--warning py-s">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="detail-form mb-xl">
        <img src="{{ Auth::user()->profilePicture() }}" alt="{{ Auth::user()->name }}" class="detail-form__img">
    </div>
    <div class="detail-item">
        <img src="{{ Auth::user()->name ? asset('dist/img/ico-check-green.svg') : asset('dist/img/ico-check-gray.svg') }}" @if(Auth::user()->name!="") alt="checked" @endif class="detail-item__img">
        <div class="detail-item__desc">
            <p class="text--gray mb-m">Nama Lengkap</p>
            <p class="text--subsubtitle">{{ Auth::user()->name }}</p>
        </div>
    </div>
    <div class="detail-item">
        <img src="{{ Auth::user()->email ? asset('dist/img/ico-check-green.svg') : asset('dist/img/ico-check-gray.svg') }}"  @if(Auth::user()->email!="") alt="checked" @endif class="detail-item__img">
        <div class="detail-item__desc">
            <p class="text--gray mb-m">Email</p>
            <p class="text--subsubtitle">{{ Auth::user()->email }}</p>
        </div>
    </div>
    <div class="detail-item">
        <img
            src="{{ Auth::user()->birth_date ? asset('dist/img/ico-check-green.svg') : asset('dist/img/ico-check-gray.svg') }}"
            alt="checked"
            class="detail-item__img"
        >
        <div class="detail-item__desc">
            <p class="text--gray mb-m">Tanggal Lahir</p>
            <p class="text--subsubtitle">
                {{ Auth::user()->birth_date ? Auth::user()->birth_date : '-' }}
            </p>
        </div>
    </div>
    <div class="detail-item">
        <img
            src="{{ Auth::user()->alamat ? asset('dist/img/ico-check-green.svg') : asset('dist/img/ico-check-gray.svg') }}"
            alt="checked"
            class="detail-item__img"
        >
        <div class="detail-item__desc">
            <p class="text--gray mb-m">Bio Singkat</p>
            <p class="text--subsubtitle">
                {{ Auth::user()->alamat ? Auth::user()->alamat : '-' }}
            </p>
        </div>
    </div>
    <div class="detail-alert mt-l">
        Informasi berikut <strong>hanya dapat dilihat oleh kamu</strong> dan tidak akan kami publikasikan
    </div>
</section>
@endsection
