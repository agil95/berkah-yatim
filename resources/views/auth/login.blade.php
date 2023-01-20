@extends('layouts.public')
@section('title', 'Login')
@section('navbar')
    @include('layouts.navbar', ['page_title' => 'Masuk', 'primary'=>false])
@endsection

@section('content')

<section class="section section-login py-xl">
  @if(session('status'))
  <div class="by-alert py-s">
    {{session('status')}}
  </div>
  @elseif(session('gagal'))
  <div class="by-alert by-alert--warning py-s">
    {{session('gagal')}}
  </div>
  @endif

  <h1 class="text--subtitle text--semibold mb-l mt-xl">Masuk ke akun Anda</h1>
  <form method="POST" action="{{ route('login') }}" class="mb-l">
    {{ csrf_field() }}
    <input type="text" class="input {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{old('email')}}" placeholder="Email Anda">
    @if ($errors->has('email'))
    <span class="text--caption text--primary" role="alert">
      <strong>{{ $errors->first('email') }}</strong>
    </span>
    @endif
    <div class="input-password mt-m mb-l">
      <input type="password" class="input {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password">
      @if ($errors->has('password'))
      <span class="text--caption text--primary" role="alert">
        <strong>{{ $errors->first('password') }}</strong>
      </span>
      @endif
      <span class="input-password__icon"></span>
    </div>
    <div class="u-flex-center mb-l">
      <div>
        <input type="checkbox" id="remember-me" class="input">
        <label for="remember-me" class="text--gray"> Ingat saya</label>
      </div>
      <a href="{{ url('/password/reset') }}" target="_blank" class="text--primary">
        Lupa password?
      </a>
    </div>
    <input type="submit" class="btn btn--primary btn--block" value="Masuk">
  </form>
  <p class="text--center text--subsubtitle mb-xl">
    Belum punya akun {{ env('APP_NAME') }}?
    <a href="{{ url('/register')}}" class="text--primary">Daftar</a>
  </p>
  <hr class="divider">
  <div class="mt-xl">
    <a href="/redirect/facebook" class="btn btn--primary btn--block btn--fb mb-l">
      <img src="{{ asset('dist/img/ico-fb-white.svg') }}" class="btn__img-prepend" alt="facebook">
      Masuk dengan Facebook
    </a>
    <a href="/redirect/google" class="btn btn--primary btn--block btn--google">
      <img src="{{ asset('dist/img/ico-google.svg') }}" class="btn__img-prepend" alt="google">
      <span>Masuk dengan Google</span>
    </a>
  </div>
</section>
@stop

@section('bottom-nav')
    @include('layouts.bottom-nav', ['nav' => 'akun'])
@endsection
