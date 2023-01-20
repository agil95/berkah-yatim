@extends('layouts.global')
@section('title') List Menu @endsection
@section('content')

	<div class="row">
		<div class="container col-sm-12">
		<div class="col-md-12">
			@if(session('status'))
			<div class="alert alert-success">
				{{session('status')}}
			</div>
			@endif
			<h2>List Menu
				<div class="pull-right">
						{{-- <a class="btn btn-success" href="{{ route('menu.create') }}"><i class="glyphicon glyphicon-plus"></i> Tambah Menu</a> --}}
				</div>
			</h2>
				@php
				$no = 1;
				@endphp
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
						<table class="table table-bordered table-stripped" id="example1" style="width: 100%">
							<thead>
								<tr>
									<th>No.</th>
                  <th>ID Parent Menu</th>
                  <th>ID Menu</th>
                  <th>Name</th>
                <th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($users as $key => $master_datum)
								<td width="5%">{{ ++$key}}</td>
								<td width="5%">{{ $master_datum->parent_id}}</td>
								<td width="5%">{{ $master_datum->id}}</td>
								<td width="65%" align="center">{{$master_datum->name}}</td>
								<td width="30%" align="center">
									<a class="btn btn-xs btn-warning" href="{{ route('menu.edit', $master_datum->id) }}"><i class="glyphicon glyphicon-edit"></i> Ubah</a>
									@if(Auth::user()->role_id==1)
									<form action="{{ route('menu.destroy', $master_datum->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
										<input type="hidden" name="_method" value="DELETE">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
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