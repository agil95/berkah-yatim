@extends('emails.template')

@section('content')
<h2>Informasi Pengambilan Emas </h2>
<p>
	Halo {{ $name }},
	<br>Terima kasih, anda telah  <strong>mencetak Logam Mulia</strong> sejumlah <strong>{{ $detail_qty }} unit</strong>. 
	<br>Kode transaksi anda adalah {{ $trans->code }}	
	<br>
	<br>Anda dapat mengambil Emas Anda dengan menunjukan kode transaksi di Toko di bawah ini 
	<br>
	<br>{{ $store->name}}
	<br>{{ $store->description}}
	<br>{{ $store->address}}
	<br>No Kontak: {{ $store->fax}}
	<br>
	<br>Terima Kasih
</p>
@stop