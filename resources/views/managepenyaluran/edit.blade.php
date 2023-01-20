@extends('layouts.global')

@section('title')Edit Pemberdayaan
@endsection

@section('content')
<div class="container col-sm-12">
<div class="row">
	<div class="col-md-8">
		@if(session('status'))
		<div class="alert alert-success">
			{{session('status')}}
		</div>
		@elseif(session('gagal'))
		<div class="alert alert-danger">
			{{session('gagal')}}
		</div>
		@endif
		<div class="box">
			<div class="box-body">
		<form
		action="{{route('penyaluran.update', ['id' => $book->id])}}"
		method="POST"
		enctype="multipart/form-data"
		class="shadow-sm p-3 bg-white"
		>
		@csrf
	<input
	type="hidden"
	value="PUT"
	name="_method">
		<label for="title">Nama Penerima</label> <br>
		<input type="text" class="form-control" name="nama"
		placeholder="Book title" value="{{$book->name}}" required>
		<br>

		<label for="cover">Foto Penerima</label><br>
		<small class="text-muted">Current cover</small><br>
		@if($book->dokumentasi)
		<img src="{{asset('storage/' . $book->dokumentasi)}}" width="96px"/>
		@endif
		<br><br>
		<input
		type="file"class="form-control"
		name="dokumentasi"
		>
		<small class="text-muted">Kosongkan jika tidak ingin mengubah
		gambar</small>
		<br>

		<br>
		<label for="description">Deskripsi</label><br>
		<textarea id="editor1" name="deskripsi" id="description" class="form-control" required>{{$book->deskripsi}}</textarea>
		<br>
	<label for="stock">Jumlah</label><br>
	<input type="number" class="form-control" id="stock" name="jumlah"
	 value="{{$book->jumlah}}" required>
	<br>
	<label for="title">Program Penyaluran</label> <br>
	<select name="penyaluran" class="form-control" required>
		<option hidden>--Pilih Program--</option>
		@foreach($prokers as $mitra)
		<option value="{{$mitra->id}}" @if($mitra->id == $book->penyaluran) selected='selected' @endif>{{$mitra->nama_kegiatan}}</option>
		@endforeach
	</select>
	<br>
<input type="submit" class="btn btn-primary" value="PUBLISH">
</form>
</div>
</div>
</div>
</div>
</div>


@endsection