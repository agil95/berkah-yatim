@extends('layouts.public')
@section('navbar')
    @include('layouts.navbar', ['page_title' => 'Verifikasi Email','primary'=>false])
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 py-xl">
            <div class="card">
                <div class="card-header text--subtitle text--semibold mb-l">{{ __('Verifikasi Alamat Email Anda') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Tautan verifikasi yang baru telah dikirim ke alamat email Anda.') }}
                        </div>
                    @endif

                    {{ __('Sebelum melanjutkan, periksa email Anda untuk tautan verifikasi.') }}
                    {{ __('Jika Anda tidak menerima email') }}, <a href="{{ route('verification.resend') }}"  class="text--primary">{{ __('klik di sini untuk meminta email yang lain') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('bottom-nav')
    @include('layouts.bottom-nav', ['nav' => 'home'])
@endsection

