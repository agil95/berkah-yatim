@extends('layouts.global')
@section('title') Detail Metode Pembayaran @endsection
@section('content')
<div class="box">
	<div class="box-body">
	<div class="card">
		<div class="card-body">
			<label><b>Tipe</b></label><br>
			{{$show->tipe}}
			<br><br>
			<label><b>Bank</b></label><br>
			{{$show->bank}}
			<br><br>
			<label><b>No Rekening</b></label><br>
			{{$show->account}}
			<br><br>
			<label><b>Nama Pemilik</b></label><br>
			{{$show->owner}}
			<br><br>
			<label><b>Label</b></label><br>
			{{$show->branch}}
			<br><br>
			<label><b>Dokumentasi </b></label><br>
			@if($show->dokumentasi)
			<img src="{{asset('storage/' . $show->dokumentasi)}}"
			width="185px">
			@endif
			<br><br>
			<label><b>Judul Panduan Pembayaran 1</b></label><br>
			{{$show->judul_panduan_pembayaran1}}
			<br><br>
			<label><b>Panduan Pembayaran 1</b></label><br>
			{!! $show->panduan_pembayaran1 !!}
			<br><br>
			<label><b>Judul Panduan Pembayaran 2</b></label><br>
			{{$show->judul_panduan_pembayaran1}}
			<br><br>
			<label><b>Panduan Pembayaran 2</b></label><br>
			{!! $show->panduan_pembayaran2 !!}
			<br><br>

			<label><b>Judul Panduan Pembayaran 3</b></label><br>
			{{$show->judul_panduan_pembayaran3}}
			<br><br>
			<label><b>Panduan Pembayaran 3</b></label><br>
			{!! $show->panduan_pembayaran3 !!}
			<br><br>
			<label><b>Ditulis Pada : </b></label><br>
			{{$show->created_at}}
			<br><br>

		</div>
	</div>
</div>
</div>
@endsection