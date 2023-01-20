@extends('layouts.global')
@section('title') Detail Banner @endsection
@section('content')
<div class="box">
	<div class="box-body">

	<div class="card">
		<div class="card-body">
			<label><b>Nama</b></label><br>
			{{$show->nama}}
			<br><br>
			<label><b>Link</b></label><br>
			{{$show->link}}
			<br><br>
			<label><b>Dokumentasi </b></label><br>
			@if($show->dokumentasi)
			<img src="{{asset('storage/' . $show->dokumentasi)}}"
			width="185px">
			@endif
			<br><br>
			<label><b>Ditulis Pada : </b></label><br>
			{{$show->created_at}}
			<br><br>

		</div>
	</div>
</div>
</div>
@endsection