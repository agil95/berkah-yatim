@extends('layouts.global')
@section('title') Detail Campaign @endsection
@section('content')
<div class="box">
	<div class="box-body">

	<div class="card">
		<div class="card-body">

			<label><b>Nama Campaign</b></label><br>
			{{$proker->nama_kegiatan}}
			<br><br>

			<label><b>Tag</b></label><br>
			@php echo $proker->tag; @endphp
			<br><br>

			<label><b>Urutan</b></label><br>
			@php echo $proker->urutan; @endphp
			<br><br>			

			<label><b>Deskripsi</b></label><br>
			@php echo $proker->deskripsi; @endphp
			<br><br>

			<label><b>Note</b></label><br>
			@php echo $proker->note; @endphp
			<br><br>
			
			<label><b>Target</b></label><br>
			Rp @php echo $proker->target; @endphp
			<br><br>

			<label><b>Target Hari</b></label><br>
			@php echo $proker->target_date; @endphp
			<br><br>

			<label><b>Aktual Donasi</b></label><br>
			Rp @php echo $proker->actual_earn; @endphp
			<br><br>

			<label><b>Sisa Hari</b></label><br>
			@php echo $proker->left_day; @endphp
			<br><br>

			<br><br>
			<label><b>Dokumentasi </b></label><br>
			@if($proker->dokumentasi)
			<img src="{{asset('storage/' . $proker->dokumentasi)}}" class="img-responsive">
			@endif
			<br><br>

			<label><b>Penulis </b></label><br>
			admin <strong>{{$proker->created_by}}</strong>
			<br><br>

			<label><b>Ditulis Pada : </b></label><br>
			{{$proker->created_at}}
			<br><br>

		</div>
	</div>
</div>
</div>
@endsection