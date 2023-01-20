@extends('layouts.global')

@section('title')Edit kegiatan infak
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
					<h2>Edit kegiatan infak</h2>
					<form action="{{route('manage-infak.update', ['id' => $infak->id ])}}" method="POST" enctype="multipart/form-data" class="shadow-sm p-3 bg-white">
						@csrf
						<input type="hidden" value="PUT" name="_method">
						<label for="title">Asal Mitra</label> <br>
						<select class="form-control" name="mitra">
							@foreach($proker as $prokers)
							<option value="{{$prokers->id}}" {{$infak['nama_kegiatan'] == $prokers['id'] ? 'selected' : '' }}>{{$prokers->nama}}</option>
							@endforeach
						</select>
						<br>

						<label for="cover">Dokumentasi</label><br>
						<small class="text-muted">Current cover</small><br>
						@if($infak->dokumentasi)
						<img src="{{asset('storage/' . $infak->dokumentasi)}}" width="120px" />
						@endif
						<br><br>
						<input type="file" class="form-control" name="dokumentasi">
						<small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
						<br>
						
						<label for="judul">Judul</label><br>
						<input type="text" class="form-control" id="judul"  name="judul" value="{{$infak->judul}}">
						<br>

						<label for="description">Deskripsi</label><br>
						<div class="box">
							<textarea id="editor1" name="deskripsi" rows="10" cols="80" required placeholder="Masukkan deskripsi">{{$infak->deskripsi }}
							</textarea>

						</div>
						<br>

						<label for="stock">Dana ditargetkan</label><br>
						<input type="number" class="form-control" id="jumlah"  name="jumlah" value="{{$infak->jumlah}}">
						<br>

						<label for="stock">Dana yang terkumpul</label><br>
						<input type="number" class="form-control" id="jumlah_real" name="jumlah_real" value="{{$infak->jumlah_real}}" disabled>
						<br>

						<label for="stock">Target Hari</label><br>
						<input type="number" class="form-control" id="day" name="day" value="{{$infak->day}}" >
						<br>

						<label for="stock">Sisa Hari</label><br>
						<input type="number" class="form-control" id="day" name="day_left" value="{{$infak->day_left}}" disabled>
						<br>

						<input type="submit" class="btn btn-primary" value="Publish">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection