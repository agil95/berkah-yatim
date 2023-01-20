@extends('layouts.public')
@section ('title', 'Edit Profile')
@section('styles')
@parent
  <link href="{{ asset('css/donatur.css') }}" rel="stylesheet">
@endsection

@section('navbar')
    @include('layouts.navbar', ['page_title' => 'Pengaturan Password', 'primary' => false])
@endsection 

@section('content')
<section class="section pt-l">
    @if(session('status'))
			<div class="by-alert py-s">
				{{session('status')}}
			</div>
			@elseif(session('gagal'))
			<div class="by-alert py-s by-alert--warning">
				{{session('gagal')}}
			</div>
			@endif
			@if (count($errors) > 0)
			<div class="by-alert py-s by-alert--warning">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
    @endif
    <h2 class="text--title py-xl">Masukkan password kamu</h2>
    <form action="{{route('proses.edit.password')}}" method="POST" enctype="multipart/form-data" accept="image/*">
        @csrf
        <div class="detail-form">
            <label for="password">Password Lama</label>
            <input type="password" name="oldpassword" pattern="^\S{6,}$" class="input mt-s" id="oldpassword">
        </div>
        <div class="detail-form">
            <label for="password">Password Baru</label>
            <input type="password" name="password" pattern="^\S{6,}$" class="input mt-s" id="password">
        </div>
        <div class="detail-form">
            <label for="password-confirmation">Ulangi Password Baru</label>
            <input type="password" name="password_confirmation" pattern="^\S{6,}$" class="input mt-s" id="password-confirmation">
        </div>
        <div class="py-l">
            <input type="hidden" name="_method" value="PUT">
            <button type="submit" class="btn btn--primary btn--block">Simpan</button>
        </div>
    </form>
</section>
@endsection
