@extends('layouts.global')

@section('title')Tambah banner
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

					<h2 align="center">Tambah banner</h2>
					<form action="{{route('manage-banner.store')}}" method="POST" enctype="multipart/form-data" class="shadow-sm p-3 bg-white">
						@csrf
						<label for="title">Nama</label> <br>
						<input type="text" class="form-control" name="nama" placeholder="Masukkan nama banner" value="{{ old('nama') }}" required>
						<br>
						<div class="row">
							<div class="col-md-12">
								<label for="link">Link</label>
								<div class="input-group">
									<span class="input-group-addon bg-gray">www.berkahyatim.com/proker/</span>
									<input type="text" class="form-control" id="link" name="link" value="{{ old('link') }}">
								</div>
							</div>
						</div>
						<br>
						<label for="cover">Dokumentasi</label>
						<input type="file" class="form-control" name="dokumentasi" value="{{ old('dokumentasi') }}" accept="image/*" required>
						@if ($errors->has('dokumentasi'))
						<span class="text--caption text--primary" role="alert">
						  <strong>{{ $errors->first('dokumentasi') }}. Minimal Image 980x480 and size at least 1 MB</strong>
						</span>
						@endif				  
						<small class="text-muted">Minimal Image 980x480.</small>
						<br>

						<button class="btn btn-primary btn-flat" name="save_action" value="PUBLISH">Publish</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection