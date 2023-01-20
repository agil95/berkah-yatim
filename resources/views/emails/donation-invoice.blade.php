@extends('layouts.email')
@section('content')
  <p class="paragraph" style="font-size: 16px;line-height: 24px;margin-top: 10px;">
    Halo <b>{{ $donation->nama }}</b>, <br>
    Invoice {{ $donation->invoice }} Anda berstatus {{ $donation->status }}
  </p>
  <div class="align-center" style="text-align: center; width: 100%; margin: 0 auto;">
    <a href="{{ url('donasi-pembayaran?donasi=' . $donation->ref . '&snap_token=' . $donation->snap_token) }}" style="margin:0 auto 1rem auto;display: inline-block;color: white;background: #FC5000;border: 0;font-size: .9rem;padding: 0.75rem .5rem;border-radius: 3px;text-decoration: none;font-weight: bold; width: 270px;" target="_blank">
      View Transaksi
    </a>
  </div>  
@endsection