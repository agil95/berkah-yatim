@extends('emails.template')

@section('content')
<h2>Paket Anda sedang dalam pengiriman</h2>
<p>
	Halo {{ $name }},
	<br>Terima kasih Anda telah mencetak emas karakter/logam mulia di&nbsp;<strong>Mas Duit.</strong>
	<br>Paket anda sedang dalam pengiriman oleh jasa kurir <strong> {{ $kurir }} </strong> dengan <strong>No. Resi : {{ $resi }}</strong>
	<br>Silakan melakukan pelacakan paket anda di website <a href="{{ $web }}">{{ $web }}</a>.
</p>
@stop