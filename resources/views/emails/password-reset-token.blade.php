@extends('emails.template')

@section('content')
<h2>Kode Reset Password</h2>
<p>
	Halo {{ $name }},
	<br>Kami telah menerima permintaan untuk mengatur ulang password Anda. 
	<br>Silahkan masukkan kode reset di bawah ini ke aplikasi Mas Duit Anda 
	<br><strong>Kode Reset: {{ $reset_code }}</strong>&nbsp;
</p>
@stop