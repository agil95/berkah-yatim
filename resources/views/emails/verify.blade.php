@extends('emails.template')
@section('content')
<h2>Verifikasi Email</h2>
<p>
	Halo {{ $name }},
	<br><br>Terima kasih Anda telah mendaftar di&nbsp;<strong>Berkah Yatim.</strong>
	<br><br>Silakan klik tombol di bawah ini untuk melakukan aktivasi.
	<br><br><a class="btn btn-primary" href="{{ $link }}" alt="Click here to verify your account" target="_blank"> <b> Link Verifikasi </b> </a>
	<br>
</p>
@stop