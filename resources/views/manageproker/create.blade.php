@extends('layouts.global')

@section('title')Tambah Program
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
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<div class="box">
				<div class="box-body">

					<h2 align="center">Tambahkan Campaign</h2>
					<form action="{{route('manage-campaign.store')}}" method="POST" class="shadow-sm p-3 bg-white" enctype="multipart/form-data">
						@csrf
						<br>
						<label for="title">Nama Pemilik Campaign</label> <br>
						<select name="pemilik" class="form-control" required>
							<option hidden>--Pilih pemilik--</option>
							@foreach($mitras as $mitra)
							<option value="{{$mitra->id}}">{{$mitra->nama}}</option>
							@endforeach
						</select>
						<br>
						<label for="title">Kategori</label> <br>
						<select name="kategori" class="form-control" required>
							<option hidden>--Pilih kategori--</option>
							@foreach($kategories as $mitra)
							<option value="{{$mitra->id}}">{{$mitra->nama}}</option>
							@endforeach
						</select>
						<br>
						<label for="title">Nama Campaign</label> <br>
						<input type="text" class="form-control" name="nama_kegiatan" placeholder="Masukkan nama program" value="{{ old('nama_kegiatan') }}" required>
						<br>

						<label for="title">Tag</label> <br>
						<input type="text" class="form-control" name="tag" placeholder="Masukkan tag" value="{{ old('tag') }}" required>

						<label for="title">Urutan</label> <br>
						<input type="number" min="1" class="form-control" name="urutan" placeholder="Masukkan urutan" value="{{ old('urutan') }}" required><br>
						<br>
						<div class="row">
							<div class="col-md-12">
								<label for="url">Link Tombol</label>
								<div class="input-group">
									<span class="input-group-addon bg-gray">www.berkahyatim.com/proker/</span>
									<input type="text" class="form-control" id="url" name="url" value="{{ old('url') }}">
								</div>
							</div>
						</div>
						<br>
						<label for="title">Target Donasi (Rp)</label> <br>
						<input type="number"  min="1" class="form-control" name="target" placeholder="Masukkan target donasi" onkeypress="return isNumberKey(event)" value="{{ old('target') }}" required>
						<br>

						<label for="title">Target Hari </label> <br>
						<input type="date" class="form-control" id="target_date" name="target_date" min='{{ date('Y-m-d')}}' placeholder="Masukkan target hari" value="{{ old('target_date') }}" required>
						<br>

						<label for="cover">Dokumentasi</label>
						<input type="file" class="form-control" name="dokumentasi" value="{{ old('dokumentasi') }}" accept="image/*">
						@if ($errors->has('dokumentasi'))
						<span class="text--caption text--primary" role="alert">
						  <strong>{{ $errors->first('dokumentasi') }}. Minimal Image: 980x480 and size at least 1 MB</strong>
						</span>
						@endif				  
						<small class="text-muted">Minimal Image: 980x480 dan ukuran 1 MB.</small>
						<br>

						<label for="description">Deskripsi</label><br>
						<div class="box">
							<textarea id="editor1"  class="textarea" name="deskripsi" rows="10" cols="80" required placeholder="Masukkan deskripsi">{{ old('deskripsi') }}
							</textarea>
						</div>
						<label for="description">Note</label><br>
						<div class="box">
							<textarea id="note1"  class="textarea" name="note" rows="10" cols="80" required placeholder="Masukkan note">{{ old('note') }}
							</textarea>
						</div>
						<button class="btn btn-primary btn-flat" name="save_action" value="PUBLISH">Publish</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/moment.js')}}"></script>
<script>
 document.getElementById("target_date").valueAsDate = new Date();
 function isNumberKey(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

      return true;
    }

    function isDecimalKey(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 46 || charCode > 57))
        return false;

      return true;
    } 
</script>
@endsection
