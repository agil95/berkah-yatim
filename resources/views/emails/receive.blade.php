@extends('emails.template')

@section('content')
<h2>Transfer Logam Diterima</h2>
<p>
	Halo {{ $name }},
	<br>Anda telah menerima <strong>transfer logam mulia</strong> sejumlah <strong>{{ $qty_unit }} unit</strong>. 
	<br>dari <strong> {{ $sender }} ({{ $email }})</strong> melalui aplikasi Mas Duit.
	<br>Silahkan cek brankas emas Anda.
</p>
@stop