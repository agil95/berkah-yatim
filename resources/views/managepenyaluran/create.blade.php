@extends('layouts.global')

@section('title')Donasi Create Pemberdayaan
@endsection

@section('content')
<div class="container">
<div class="row">
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
		<div class="box">
			<div class="box-body">
				<script type="text/javascript">
				function hitung($total)
				{
					var x = document.getElementById("stock").value;
					if(x > $total){
						alert("Uang Yang Di Masukkan Lebih");
					window.history.back();
					}else if (x < 0){
						alert("Uang Yang Di Masukkan Kurang");
						window.history.back();
					}else return true;  
				}
				</script>
				<h2 align="center">Salurkan Donasi</h2>
						<form
						action="{{route('penyaluran.store')}}"
						method="POST"
						enctype="multipart/form-data"
						class="shadow-sm p-3 bg-white"
						>
						@csrf
						<label for="title">Nama Penerima</label> <br>
						<input type="text" class="form-control" name="nama"
						placeholder="Book title" value="{{ old('nama') }}" required>
						<br>
						<label for="cover">Foto penerima</label>
						<input type="file" class="form-control" name="dokumentasi" value="{{ old('dokumentasi') }}">
						<br>
						<label for="description">Deskripsi</label><br>
						<textarea id="editor1" name="deskripsi" id="description" class="form-control" rows="3" required>{{ old('deskripsi') }}</textarea>
						<br>
						<label for="title">Program Penyaluran</label> <br>
						<select name="penyaluran" class="form-control" required>
							<option hidden>--Pilih Program--</option>
							@foreach($prokers as $mitra)
							<option value="{{$mitra->id}}">{{$mitra->nama_kegiatan}}</option>
							@endforeach
						</select>
						<br>
					<label for="stock">Jumlah Saldo : Rp. {{$total}}</label><br>
					<input type="number" class="form-control" id="stock" name="jumlah"
					min=0 value="{{ old('jumlah') }}" required>
					<br>
					<button
					class="btn btn-primary btn-flat"
					name="save_action"
					value="PUBLISH" >Publish</button>
				</form>
			</div>
		</div>
	</div>
	</div>
</div>


@endsection