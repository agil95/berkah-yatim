@extends('layouts.global')

@section('title')Edit kategori
@endsection

@section('content')

<div class="row">
	<div class="container col-sm-12">
		<div class="col-md-10">
			@if(session('status'))
			<div class="alert alert-success">
				{{session('status')}}
			</div>
			@elseif(session('gagal'))
			<div class="alert alert-danger">
				{{session('gagal')}}
			</div>
			@endif
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Whoops!</strong> Foto minimal 2MB<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<div class="box">

				<div class="box-body">
					<h2>Edit kategori</h2>
					<form action="{{route('manage-kategori.update', ['id' => $kategori->id ])}}" method="POST" enctype="multipart/form-data" class="shadow-sm p-3 bg-white">
						@csrf
						<input type="hidden" value="PUT" name="_method">
						<label for="stock">Nama</label><br>
						<input type="text" class="form-control" name="nama" id="nama" value="{{$kategori->nama}}">
						<br>
						<label for="title">Nama Tombol</label> <br>
						<input type="text" class="form-control" name="nama_tombol" placeholder="Masukkan nama tombol" value="{{ $kategori->nama_button }}" required>
						<br>
						{{-- <div class="row">
							<div class="col-md-12">
								<label for="url">Link</label>
								<div class="input-group">
									<span class="input-group-addon bg-gray">www.berkahyatim.com/proker/</span>
									<input type="text" class="form-control" id="link" name="link" value="{{ $kategori->link }}">
								</div>
							</div>
						</div> --}}
						<br>
						<label for="cover">Dokumentasi</label><br>
						<small class="text-muted">Current cover</small><br>
						@if($kategori->dokumentasi)
						<img src="{{asset('storage/' . $kategori->dokumentasi)}}" width="320px" />
						@endif
						<br><br>
						<input type="file" class="form-control" name="dokumentasi">
						<small class="text-muted">Minimal Image: Resolusi 250x259 dan 1 MB. Kosongkan jika tidak ingin mengubah gambar</small>
						<br>
						<br>
						<input type="submit" class="btn btn-primary" value="Publish">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection