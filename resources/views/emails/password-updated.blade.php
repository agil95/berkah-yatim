@extends('emails.template')

@section('content')
<h2>Password Diubah</h2>
<p>
	Halo {{ $name }},
	<br>Password Mas Duit Anda telah diubah. 
	<br>Silahkan masukkan kode reset di bawah ini ke aplikasi Mas Duit Anda 
	<br><strong>Kode Reset: {{ $reset_code }}</strong>&nbsp;
</p>
@stop