@extends('layouts.global')
@section('title') List Logs @endsection
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
			<h2>List Logs 		
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
				<table class="table display table-stripped table-bordered donasilog" style="width: 100%">
					<thead>
						<tr>
							<th>No.</th>
							<th>Name</th>
							<th>Created By</th>
							<th>Created At</th>
							<th>Content</th>
						</tr>
					</thead>
					<tbody>
						@foreach($logs as $log)
						<tr>
							<td>{{$log->no}}</td>
							<td>{{$log->name}}</td>
							<td>{{$log->created_by}}</td>					
							<td>{{$log->created_at}}</td>					
							<td>{{$log->content}}</td>
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