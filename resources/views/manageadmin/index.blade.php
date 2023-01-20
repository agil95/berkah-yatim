@extends('layouts.global')
@section('title') List Admin @endsection
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
			<h2>List Admin 			
				<div class="text-right">
				<a class="btn btn-success" href="{{ route('manageadmin.create') }}"><i class="glyphicon glyphicon-plus"></i> Tambah Admin</a>
			</div>
		</h2>
		</div>
		<div class="row mb-3">
		</div>
		@php
		$no = 1;
		@endphp
		<div class="box">
			<!-- /.box-header -->
			<div class="box-body">
				<table class="table table-stripped display table-bordered" id="example1" style="width: 100%">
					<thead>
						<tr>
							<th>No.</th>
							<th>Nama</th>
							<th>Role</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($admin as $admins)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$admins->name}}</td>
							<td>{{$admins->role['name']}}</td>
							<td>
								<a href="{{route('manageadmin.edit', ['id' => $admins->id])}}" class="btn btn-xs btn-primary"> <i class="glyphicon glyphicon-edit"></i> Edit </a>
								<a href="{{route('manageadmin.show', ['id' => $admins->id])}}" class="btn btn-xs btn-warning"> <i class="glyphicon glyphicon-eye-open"></i> View </a>
								@if(Auth::user()->role_id==1)
								<form action="{{ route('manageadmin.destroy', ['id' => $admins->id]) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
								<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
								</form>
								@endif
							</td>					
				</tr>
				@endforeach
			</tbody>
			<tfoot>
			</tfoot>
		</table>
	</div>
</div>
</div>
</div>
</div>
@endsection