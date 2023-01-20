@extends('layouts.global')
@section('title') List Metode Pembayaran @endsection
@section('content')

	<div class="row">
		<div class="container col-sm-12">
		<div class="col-md-12">
			@if(session('status'))
			<div class="alert alert-success">
				{{session('status')}}
			</div>
			@endif
			<h2>List Metode Pembayaran
				<div class="pull-right">
					<a
					href="{{route('manage-rekening.create')}}"
					class="btn btn-success"
					><i class="glyphicon glyphicon-plus"></i> Tambah Metode Pembayaran</a>
				</div>
			</h2>
				@php
				$no = 1;
				@endphp
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
						<table class="table display table-bordered table-stripped" id="example1" style="width: 100%">
							<thead>
								<tr>
									<th>No.</th>
									<th>Tipe</th>
									<th>Bank</th>
									<th>Rekening</th>
									<th>Pemilik</th>
									<th>Label</th>
									<th>Logo</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($rekening as $rekenings)
								<tr>
									<td>{{$no++}}</td>
									<td>{{$rekenings->tipe}}</td>
									<td>{{$rekenings->bank}}</td>
									<td>{{$rekenings->account}}</td>
									<td>{{$rekenings->owner}}</td>
									<td>{{$rekenings->branch}}</td>
									<td><img src="{{asset('storage/' . $rekenings->dokumentasi)}}" width="120px"></td>
									<td>
										@if ($rekenings->status==0) 
											<a class="btn btn-xs btn-info" href="{{ url('admin/rekeningstatus', [$rekenings->id,1]) }}"  onclick="if(confirm('Change status to active? Are you sure?')) { return true } else {return false };"><i class="glyphicon glyphicon-edit"></i> Unactive</a>
										@else
											<a class="btn btn-xs btn-danger" href="{{ url('admin/rekeningstatus', [$rekenings->id,0]) }}"  onclick="if(confirm('Change status to unactive? Are you sure?')) { return true } else {return false };"><i class="glyphicon glyphicon-edit"></i> Active</a>
										@endif
									</td>	
									<td>
										<a href="{{route('manage-rekening.edit', ['id' => $rekenings->id])}}" class="btn btn-xs btn-primary"> <i class="glyphicon glyphicon-edit"></i> Edit </a>
										<a href="{{route('manage-rekening.show', ['id' => $rekenings->id])}}" class="btn btn-xs btn-warning"> <i class="glyphicon glyphicon-eye-open"></i> View </a>
										@if(Auth::user()->role_id==1)
										<form action="{{ route('manage-rekening.destroy', ['id' => $rekenings->id]) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
											<input type="hidden" name="_method" value="DELETE">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
										</form>
										@endif
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
	@endsection