@extends('layouts.global')

@section('title')Edit banner
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
					<h2>Edit banner</h2>
					<form action="{{route('manage-banner.update', ['id' => $banner->id ])}}" method="POST" enctype="multipart/form-data" class="shadow-sm p-3 bg-white">
						@csrf
						<input type="hidden" value="PUT" name="_method">
						<label for="stock">Nama</label><br>
						<input type="text" class="form-control" name="nama" id="nama" value="{{$banner->nama}}">
						<br>

						<div class="row">
							<div class="col-md-12">
								<label for="url">Link</label>
								<div class="input-group">
									<span class="input-group-addon bg-gray">www.berkahyatim.com/proker/</span>
									<input type="text" class="form-control" id="link" name="link" value="{{ $banner->link }}">
								</div>
							</div>
						</div>
						<br>
						<label for="cover">Dokumentasi</label><br>
						<small class="text-muted">Current cover</small><br>
						@if($banner->dokumentasi)
						<img src="{{asset('storage/' . $banner->dokumentasi)}}" width="320px" />
						@endif
						<br><br>
						<input type="file" class="form-control" name="dokumentasi">
						@if ($errors->has('dokumentasi'))
						<span class="text--caption text--primary" role="alert">
						  <strong>{{ $errors->first('dokumentasi') }}. Minimal Image 980x480 and size at least 1 MB</strong>
						</span>
						@endif				  
						<small class="text-muted">Minimal Image 980x480. Kosongkan jika tidak ingin mengubah gambar</small>
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