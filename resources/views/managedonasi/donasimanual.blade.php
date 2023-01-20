@extends('layouts.global')
@section('title') Daftar Donasi Manual @endsection
@section('content')
<div class="row">
	<div class="container col-sm-12">
		<div class="col-md-12">
			@if(session('status'))
			<div class="alert alert-success">
				{{session('status')}}
			</div>
			@elseif(session('gagal'))
			<div class="alert alert-danger">
				{{session('gagal')}}
			</div>
			@endif
			@php
			$no = 1;
			@endphp
			<h2>List Donasi Manual</h2>
			{{-- <div class="col-md-6 btn-selection">
				<ul class="nav nav-pills">
					<li class="nav-item">
						<a class="btn-primary {{Request::get('status') == 'manual' ?
			'active' : '' }}" href="{{route('manage-donasi-user.manual', ['status' =>
			'manual'])}}">Manual</a>
					</li>

				</ul>
			</div> --}}
			<div class="box" style="margin-top: 15px;">
						<div class="box-body">
							<table id="example1" class="table table-bordered table-striped" style="width: 100%">
								<thead>
									<tr>
										<th>No.</th>
										<th>Invoice</th>
										<th>Nama Pengirim</th>
										<th>Nama Program</th>
										<th>Tanggal</th>
										<th>Email</th>
										<th>Jumlah Donasi</th>
										<th>Metode Bayar</th>
										<th>Bukti Pembayaran</th>
										<th>Ubah Status</th>
									</tr>
								</thead>
		
								<tbody>
		
									@foreach($donasi as $donasis)
									<tr>
										<td>{{$no++}}</td>
										<td>{{$donasis->invoice}}</td>
										<td>{{$donasis->nama}}</td>
										<td>{{$donasis->url}}</td>
										<td>{{$donasis->created_at}}</td>
										<td>{{$donasis->email}}</td>
										<td class="pull-right">Rp. {{format_uang($donasis->jumlah)}}</td>
										<td>{{$donasis->type}}</td>
										<td>@if($donasis->foto)<img src="{{asset('storage/' . $donasis->foto)}}" class="img img-responsive" >
										@endif
										</td>
										<td>
										@if($donasis->foto)
												<form action="{{route('manage-donasi-user.update',['id' => $donasis->id])}}"
												method="POST">
												@csrf
												<input
												type="hidden"
												value="PUT"
												name="_method">
												
												<input onclick="return confirm('Donasi {{$donasis->nama}} Telah Diterima ?')" 
												type="submit"
												value="Konfirmasi Donasi"
												class="btn btn-primary btn-flat">
												
											</form>
										@else
										<form action="{{route('manage-donasi-user.update',['id' => $donasis->id])}}"
												method="POST">
												@csrf
												<input
												type="hidden"
												value="PUT"
												name="_method">
												
												<input onclick="return confirm('Donasi {{$donasis->nama}} Telah Diterima ?')" 
												type="submit"
												value="Konfirmasi Donasi"
												class="btn btn-primary btn-flat" disabled="">
												
											</form>
										@endif</td>
									</tr>
									@endforeach		
									</tbody>
									<tfoot>
								<tr>
								</tr>
							</tfoot>
						</table>
				</div>
			</div>

		</div>
	</div>
</div>


@endsection