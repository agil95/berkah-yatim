@extends('layouts.global')

@section('title')Edit Metode Pembayaran
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
					<h2>Edit Metode Pembayaran</h2>
					<form action="{{route('manage-rekening.update', ['id' => $rekening->id ])}}" method="POST" enctype="multipart/form-data" class="shadow-sm p-3 bg-white">
						@csrf
						<label for="title">Tipe</label> <br>
						<select name="tipe" class="form-control" required>
							<option @if($rekening->tipe=='payment_gateway') selected='selected' @endif  value="payment_gateway">Payment Gateway</option>
							<option  @if($rekening->tipe=='transfer_manual') selected='selected' @endif value="transfer_manual">Transfer Manual</option>
							<option  @if($rekening->tipe=='manual') selected='selected' @endif value="manual">Manual/cash</option>
							<option  @if($rekening->tipe=='instant_payment') selected='selected' @endif value="instant_payment">Pembayaran Instant</option>
						</select>
						<br>
						<input type="hidden" value="PUT" name="_method">
						<label for="title">Bank</label> <br>
						<input type="text" class="form-control" name="bank" placeholder="Masukkan nama bank" value="{{ $rekening->bank }}" readonly>
						<br>
						<label for="title">No. Account</label> <br>
						<input type="text" class="form-control" name="account" placeholder="Masukkan nomor rekeining" value="{{ $rekening->account }}" required>
						<br>
						<label for="title">Pemilik Rekening</label> <br>
						<input type="text" class="form-control" name="owner" placeholder="Masukkan pemilik rekeining" value="{{ $rekening->owner }}" required>
						<br>
						<label for="title">Label</label> <br>
						<input type="text" class="form-control" name="label" placeholder="Masukkan label" value="{{ $rekening->branch }}" required>
						<br>
						<label for="cover">Logo</label><br>
						<small class="text-muted">Current cover</small><br>
						@if($rekening->dokumentasi)
						<img src="{{asset('storage/' . $rekening->dokumentasi)}}" width="320px" />
						@endif
						<br><br>
						<input type="file" class="form-control" name="logo">
						<small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
						<br>
						<label for="cover">Judul Panduan Pembayaran 1</label>
						<input type="text" class="form-control" name="judul_panduan_pembayaran1" value="{{ $rekening->judul_panduan_pembayaran1 }}" required>
						<br>
						<label for="description">Panduan Pembayaran 1</label><br>
						<div class="box">
							<textarea id="editor1"  class="textarea editor" name="panduan_pembayaran1" rows="10" cols="80" required placeholder="Masukkan deskripsi">{{ $rekening->panduan_pembayaran1 }}
							</textarea>
						</div>
						<label for="cover">Judul Panduan Pembayaran 2</label>
						<input type="text" class="form-control" name="judul_panduan_pembayaran2" value="{{ $rekening->judul_panduan_pembayaran2 }}" required>
						<br>
						<label for="description">Panduan Pembayaran 2</label><br>
						<div class="box">
							<textarea id="editor2"  class="textarea editor" name="panduan_pembayaran2" rows="10" cols="80" required placeholder="Masukkan deskripsi">{{ $rekening->panduan_pembayaran2 }}
							</textarea>
						</div>
						<label for="cover">Judul Panduan Pembayaran 3</label>
						<input type="text" class="form-control" name="judul_panduan_pembayaran3" value="{{ $rekening->judul_panduan_pembayaran3 }}" required>
						<br>
						<label for="description">Panduan Pembayaran 3</label><br>
						<div class="box">
							<textarea id="editor3"  class="textarea editor" name="panduan_pembayaran3" rows="10" cols="80" required placeholder="Masukkan deskripsi">{{ $rekening->panduan_pembayaran3 }}
							</textarea>
						</div>
						<br>
						<input type="submit" class="btn btn-primary" value="Publish">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection