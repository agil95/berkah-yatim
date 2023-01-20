@extends('layouts.public')
@section ('title', 'Edit Profile')
@section('styles')
  @parent
  <link href="{{ asset('css/donatur.css') }}" rel="stylesheet">
@endsection

@section('navbar')
    @include('layouts.navbar', [
        'page_title' => 'Edit Account',
        'primary' => false,
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
    <form action="{{route('proses.edit.profile')}}" method="POST" enctype="multipart/form-data" accept="image/*">
        @csrf
        <div class="detail-form detail-form--img">
            <img src="{{ Auth::user()->profilePicture() }}" id="profile-pic" alt="{{ Auth::user()->name }}" class="detail-form__img">
            <input type="file" name="profile-pic" id="profile-pic-form" class="detail-form__input-file" accept="image/x-png,image/jpeg,image/jpg">
        </div>
        <div class="detail-form">
            <label for="name">Nama Lengkap</label>
            <input type="text" name="name" class="input mt-s" value="{{ Auth::user()->name }}" id="name">
        </div>
        <div class="detail-form">
            <label for="email">Email</label>
            <input type="text" name="email" class="input mt-s" value="{{ Auth::user()->email }}" id="email" disabled>
        </div>
        {{-- <div class="detail-form">
            <label for="phone">Nomor Kontak</label>
            <input type="text" name="nohp" class="input mt-s" value="{{ Auth::user()->nohp }}" id="nohp" disabled>
        </div> --}}
        <div class="detail-form">
            <label for="birth-date">Tanggal Lahir</label>
            <input type="date" name="birth_date" class="input mt-s" value="{{ Auth::user()->birth_date }}" id="birth-date" placeholder="dd/mm/yyyy">
        </div>
        <div class="detail-form">
            <label for="bio">Bio Singkat</label>
            <textarea name="bio" class="textarea mt-s" id="bio" rows="4" placeholder="Cerita singkat">{{ Auth::user()->alamat }}</textarea>
        </div>
        <div class="detail-alert my-l">
            Informasi berikut <strong>hanya dapat dilihat oleh kamu</strong> dan tidak akan kami publikasikan
        </div>
        <div class="pb-l">
            <input type="hidden" name="_method" value="PUT">
            <button type="submit" class="btn btn--primary btn--block">Simpan</button>
        </div>
    </form>
</section>
@endsection

@section('scripts')
  @parent
  <script src="{{ asset('js/donatur.js') }}" type="text/javascript"></script>
  <script>
        //document.getElementById("birth-date").valueAsDate = new Date();
  </script>
@endsection
