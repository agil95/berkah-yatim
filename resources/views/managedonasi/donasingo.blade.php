@extends('layouts.global')
@section('title') Daftar Donasi @endsection
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
			<h2>List Donasi NGO
				<div class="pull-right">
					<a class="btn btn-success" href="{{ route('manage-donasi-user.create') }}"><i class="glyphicon glyphicon-plus"></i> Tambah Donasi</a>
				  </div>			
			</h2>
			<div class="box">
				<div class="box-body">
					<table class="table display table-bordered table-striped donasiuser" style="width: 100%">
						<thead>
							<tr>
								<th>No.</th>
								<th>Invoice</th>
								<th>Nama Pengirim</th>
								<th>Program</th>
								<th>Tanggal</th>
								<th>Email</th>
								<th>Metode Bayar</th>
								<th>Jumlah Donasi</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($donasi as $donasis)
							<tr>
								<td></td>
								<td>{{$donasis->invoice}}</td>
								<td>{{$donasis->nama}}</td>
								<td>{{$donasis->url}}</td>
								<td>{{$donasis->updated_at}}</td>
								<td>{{$donasis->email}}</td>
								<td>{{$donasis->type}}</td>
								<td class="text-right">Rp. {{format_uang($donasis->jumlah)}}</td>
								<td>@if($donasis->status == 'sampai' || $donasis->status=="settlement" ||  $donasis->status=="success" || $donasis->status=="paid")
									<span class="label label-success" style="font-size: 13px;"><i class="fa fa-check-circle-o"> {{ $donasis->status}}</i></span>
									@elseif($donasis->status == 'pending')
									<span class="label label-warning" style="font-size: 13px;"><i class="fa fa-spinner"> {{ $donasis->status}}</i> </span>
									@elseif($donasis->status == 'verified')
									<span class="label label-success" style="font-size: 13px;"><i class="fa fa-check"> {{ $donasis->status}}</i> </span>
									@else
									<span class="label label-danger" style="font-size: 13px;"><i class="fa fa-spinner"> {{ $donasis->status}}</i> </span>
									@endif
								</td>
								<td>
									<a href="{{route('manage-donasi-user.edit', ['id' => $donasis->id])}}" class="btn btn-xs btn-primary"> <i class="glyphicon glyphicon-edit"></i> Edit </a>
									{{-- <form action="{{ route('manage-donasi-user.destroy', ['id' => $donasis->id]) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete donasi no {{ $donasis->invoice }} ? Are you sure?')) { return true } else {return false };">
										<input type="hidden" name="_method" value="DELETE">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
									</form> --}}
								</td>
							</tr>
							@endforeach

						</tbody>
					</table>
						</div>
					</div>					
				</div>
			</div>

		</div>
	</div>
</div>
@endsection