@extends('emails.template')

@section('content')
<h2>Transfer Logam Berhasil</h2>
<p>
	Halo {{ $name }},
	<br>Terima kasih, Anda telah melakukan <strong>transfer logam mulia</strong> sejumlah <strong>{{ $qty_unit }} unit</strong>.
	<br>ke <strong> {{ $receiver }} ({{ $email }})</strong>
	<br>melalui aplikasi Mas Duit.
</p>
@stop