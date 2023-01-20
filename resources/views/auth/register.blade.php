@extends('layouts.public')
@section('title', 'Register')
<link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">

@section('navbar')
    @include('layouts.navbar', ['page_title' => 'Daftar','primary'=>false])
@endsection

@section('content')

<section class="section section-login py-xl">
  <h1 class="text--subtitle text--semibold mb-l mt-xl">Daftar Akun baru</h1>
  <form action="{{url('/register')}}" method="POST" enctype="multipart/form-data" class="mb-l">
    {{ csrf_field() }}
    <input type="text" class="input mb-m" name="email" placeholder="Email Anda" required>
    @if ($errors->has('email'))
        <span class="invalid-feedback text-danger" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
    <div class="input-password mb-m">
      <input type="password" class="input" name="password" placeholder="Password" required>
      @if ($errors->has('password'))
      <span class="invalid-feedback text-danger" role="alert">
          <strong>{{ $errors->first('password') }}</strong>
          </span>
      @endif
      <span class="input-password__icon"></span>
    </div>
    {{-- <div class="input-password mb-xl">
          <input id="password-confirm"  placeholder="Password Confirmation" type="password" class="input" name="password_confirmation" required>
          @if ($errors->has('password_confirmation'))
          <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('password_confirmation') }}</strong>
              </span>
          @endif    
          <span class="input-password__icon"></span>
    </div> --}}
    <input type="submit" class="btn btn--primary btn--block" value="Daftar">
  </form>
  <p class="text--center text--subsubtitle mb-xl">
    Sudah punya akun?
    <a href="/login" class="text--primary">Masuk</a>
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
