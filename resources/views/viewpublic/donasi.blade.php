@extends('layouts.public')

@section('navbar')
  @include('layouts.navbar', ['page_title' => 'Donasi', 'primary' => false])
@endsection

@section('styles')
<link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/bootstrap.css')}}" />
<link type="text/css" media="screen"  href="{{ asset('css/app-public.css') }}" rel="stylesheet">
<link type="text/css" media="screen"  href="{{ asset('css/styesheet.css') }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/donasi.css')}}" />
@endsection

@section('content')
<section class="by by-container bg-white">
    <div style="min-height:90vh;">
        <div class="form-auth mx-auto w-full text-gray-700">
                <div id="NominalArea">
                    @if(session('gagal'))
                        <div class="alert alert-danger my-m py-m">
                            {{session('gagal')}}
                        </div>
                    @endif
                    @if ($errors->has('invoice'))
                        <div class="alert alert-danger my-m py-m">
                            <strong>No transaksi sudah terpakai. Mohon coba refresh laman anda.</strong>
                        </div>
                    @endif                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group input-amount">
                                <span class="font-semibold text-lg text-black mt-1">Rp</span>
                                <input
                                    type="text"
                                    class="form-control bg-white text-right amount pl-10 h-57px text-black border-custom bg-gray-custom focus:border-black"
                                    name="amount-first"
                                    id="amount-input"
                                    placeholder="0"
                                    data-mask="000.000.000.000.000"
                                    data-mask-reverse="true"
                                    autocomplete="off"
                                    maxlength="13" value="">
                            </div>
                            @if ($errors->has('jumlah'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $errors->first('jumlah')}}</strong>
                                </span>
                            @endif           
                            <span id="nominal-rule" class="pull-right c-red" hidden>
                                <sup>* nominal tidak kurang dari 10.000 dan tidak lebih dari 1 triliun</sup>
                            </span>             
                        </div>
                    </div>
                    <div class="row list-nominal">
                        <a href="javascript:;" data-nominal="10.000" class="col-xs-3 item-nominal">
                            <div><span class="text-black font-semibold">Rp 10.000</span></div>
                            <div></div>
                        </a><a href="javascript:;" data-nominal="50.000" class="col-xs-3 item-nominal">
                            <div><span class="text-black font-semibold">Rp 50.000</span></div>
                            <div></div>
                        </a><a href="javascript:;" data-nominal="100.000" class="col-xs-3 item-nominal">
                            <div><span class="text-black font-semibold">Rp 100.000</span></div>
                            <div></div>
                        </a><a href="javascript:;" data-nominal="250.000" class="col-xs-3 item-nominal">
                            <div><span class="text-black font-semibold">Rp 250.000</span></div>
                            <div></div>
                        </a><a href="javascript:;" data-nominal="500.000" class="col-xs-3 item-nominal">
                            <div><span class="text-black font-semibold">Rp 500.000</span></div>
                            <div></div>
                        </a>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-12 title-donasi">
                            Pilih metode pembayaran
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-xs-8 mt-2">
                             <div id="payment-chosen">
                                Metode Pembayaran
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <button id="btn-payment-chosen" class="btn-primary btn-payment-chosen pull-right" disabled> Pilih <svg class="caret-down" width="14" height="14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.5 14.25a.75.75 0 01-.578-1.23L10.282 9l-3.24-4.027a.75.75 0 01.113-1.058.75.75 0 011.095.113l3.623 4.5a.75.75 0 010 .952l-3.75 4.5a.75.75 0 01-.623.27z" fill="#ffffff"></path>
                                </svg></button>
                        </div>
                        @if ($errors->has('payment_method'))
                        <span id="nominal-rule" class="pull-right c-red" hidden>
                            <sup>* Mohon pilih metode pembayaran</sup>
                        </span>    
                        @endif           
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 title-donasi">
                            Informasi Donatur
                        </div>
                    </div>
                    <div class="row">
                        <form method="post" action="{{ url('donasi-sekarang/donate') }}">
                        <input hidden id="_token" name="_token" value="{{ csrf_token() }}"/>
                        <input hidden id="nominal_donate" name="nominal_donate" value=""/>
                        <input hidden id="payment_method" name="payment_method" value=""/>
                        <input hidden id="url" name="url" value="{{ $url }}"/>
                        <input hidden id="invoice" name="invoice" value="{{ $invoice }}"/>
                        <input hidden id="anonymous_user" name="anonymous_user" value=""/>
                        
                        <div class="col-xs-12 mt-4">
                            <input id="input-name"
                                    name="name"
                                class="form-control"
                                placeholder="Nama lengkap"
                                value="{{ Auth::check() ? Auth::user()->name : '' }}">
                                @if ($errors->has('name'))
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="col-xs-12 mt-4">
                            <input id="input-wa-or-email"
                                class="form-control"
                                name="wa_or_email"
                                placeholder="No Whatsapp atau Email Anda"
                                type="text"
                                value="{{ Auth::check() ? Auth::user()->email : '' }}">
                                <span id="wa-or-email-rule" class="pull-right c-red" hidden>
                                    <sup>* email tidak sesuai atau nomor telpon tidak lengkap</sup>
                                </span>
                        </div>
                        <div class="col-xs-12 mt-4">
                            Sembunyikan nama (anonim)
                            <label class="switch pull-right">
                                <input id="anonymous" type="checkbox"/>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div class="col-xs-12 mt-4">
                            Tulis doa dan dukungan (opsional)
                        </div>
                        <div class="col-xs-12 mt-4">
                            <input id="input-support-message" name="support_message" class="form-control" placeholder="Beri doa dan dukungan disini">
                        </div>
                        <div class="col-xs-12 mt-4">
                            <button type="submit" id="custom-submit" class="btn-primary btn--rounded btn-custom-submit" disabled>Lanjut Pembayaran</button>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="by-overlay"> </div>
                <div class="by by-bottomsheet">
                    <div class="row by-bottomsheet-header">
                        <div class="col-xs-12 text-center">
                            Metode Pembayaran
                            <button class="by-bottomsheet__btn-close">&times;</button>
                        </div>
                    </div>
                    @if($instans->count()>0)
                    <div class="row mt-2 mb-2">
                        <div class="col-md-12 title-donasi">
                            Pembayaran Instan (Cepat &amp; Mudah)
                        </div>
                        @foreach($instans as $va)
                        <div class="col-xs-12">
                            <div class="row item-payment" name="{{$va->bank}}">
                                <div class="col-xs-3">
                                    <img src="{{ asset('storage/'.$va->dokumentasi) }}" style="max-width: 60px; margin: auto">
                                </div>
                                <div class="col-xs-9">
                                    {{$va->branch}}
                                </div>
                            </div>
                            <hr/>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    @if($vas->count()>0)
                    <div class="row mt-2 mb-2">
                        <div class="col-md-12 title-donasi">
                            Virtual Account (Verifikasi Otomatis)
                        </div>
                        @foreach($vas as $va)
                        <div class="col-xs-12">
                            <div class="row item-payment" name="{{$va->bank}}">
                                <div class="col-xs-3">
                                    <img src="{{ asset('storage/'.$va->dokumentasi) }}" style="max-width: 60px; margin: auto">
                                </div>
                                <div class="col-xs-9">
                                    {{$va->branch}}
                                </div>
                            </div>
                            <hr/>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    @if($rekenings->count()>0)
                    <div class="row mt-2 mb-2">
                        <div class="col-md-12 title-donasi">
                            Transfer Bank (Verifikasi Manual 1x24jam)
                        </div>
                        @foreach($rekenings as $va)
                        <div class="col-xs-12">
                            <div class="row item-payment" name="{{$va->bank}}">
                                <div class="col-xs-3">
                                    <img src="{{ asset('storage/'.$va->dokumentasi) }}" style="max-width: 60px; margin: auto">
                                </div>
                                <div class="col-xs-9">
                                    {{$va->branch}}
                                </div>
                            </div>
                            <hr/>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
        </div>
    </div>
</section>
@endsection
@section('script')
@parent
<script src="{{ asset('js/jquery.mask.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/input-donasi.js') }}" type="text/javascript"></script>
@endsection