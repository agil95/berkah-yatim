@extends('layouts.global')

@section('title')Tambah Metode Pembayaran
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

					<h2 align="center">Tambah Metode Pembayaran</h2>
					<form action="{{route('manage-rekening.store')}}" method="POST" enctype="multipart/form-data" class="shadow-sm p-3 bg-white">
						@csrf
						<label for="title">Tipe</label> <br>
						<select name="tipe" class="form-control" required>
							<option value="payment_gateway">Payment Gateway</option>
							<option value="transfer_manual">Transfer Manual</option>
							<option value="instant_payment">Pembayaran Instant</option>
							<option value="manual">Manual/Cash</option>
						</select>
						<br>
						<label for="title">Bank</label> <br>
						<input type="text" class="form-control" name="bank" placeholder="Masukkan nama bank" value="{{ old('bank') }}" required>
						<br>
						<label for="title">No. Account</label> <br>
						<input type="text" class="form-control" name="account" placeholder="Masukkan nomor rekeining" value="{{ old('account') }}" required>
						<br>
						<br>
						<label for="title">Pemilik Rekening</label> <br>
						<input type="text" class="form-control" name="owner" placeholder="Masukkan pemilik rekeining" value="{{ old('owner') }}" required>
						<br>
						<label for="title">Label</label> <br>
						<input type="text" class="form-control" name="label" placeholder="Masukkan kantor cabang" value="{{ old('label') }}" required>
						<br>
						<label for="cover">Logo</label>
						<input type="file" class="form-control" name="logo" value="{{ old('logo') }}" accept="image/*" required>
						<br>
						<label for="cover">Judul Panduan Pembayaran 1</label>
						<input type="text" class="form-control" name="judul_panduan_pembayaran1" value="{{ old('judul_panduan_pembayaran1') }}" required>
						<br>
						<label for="description">Panduan Pembayaran 1</label><br>
						<div class="box">
							<textarea id="editor1"  class="textarea" name="panduan_pembayaran1" rows="10" cols="80" required placeholder="Masukkan deskripsi">{{ old('panduan_pembayaran1') }}
							</textarea>
						</div>
						<br>
						<label for="cover">Judul Panduan Pembayaran 2</label>
						<input type="text" class="form-control" name="judul_panduan_pembayaran2" value="{{ old('judul_panduan_pembayaran2') }}" required>
						<br>
						<label for="description">Panduan Pembayaran 2</label><br>
						<div class="box">
							<textarea id="editor2"  class="textarea" name="panduan_pembayaran2" rows="10" cols="80" required placeholder="Masukkan deskripsi">{{ old('panduan_pembayaran2') }}
							</textarea>
						</div>
						<label for="cover">Judul Panduan Pembayaran 3</label>
						<input type="text" class="form-control" name="judul_panduan_pembayaran3" value="{{ old('judul_panduan_pembayaran3') }}" required>
						<br>
						<label for="description">Panduan Pembayaran 3</label><br>
						<div class="box">
							<textarea id="editor3"  class="textarea" name="panduan_pembayaran3" rows="10" cols="80" required placeholder="Masukkan deskripsi">{{ old('panduan_pembayaran3') }}
							</textarea>
						</div>

						<button class="btn btn-primary btn-flat" name="save_action" value="PUBLISH">Publish</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection