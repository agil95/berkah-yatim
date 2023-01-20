@extends('layouts.global')
@section('title') List Banner @endsection
@section('content')

	<div class="row">
		<div class="container col-sm-12">
		<div class="col-md-12">
			@if(session('status'))
			<div class="alert alert-success">
				{{session('status')}}
			</div>
			@endif
			<h2>List banner
				<div class="pull-right">
					<a
					href="{{route('manage-banner.create')}}"
					class="btn btn-sucess"
					><i class="glyphicon glyphicon-plus"></i> Tambah banner</a>
				</div>
			</h2>

				@php
				$no = 1;
				@endphp
				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">
						<table class="table table-bordered display table-stripped" id="example1" style="width: 100%">
							<thead>
								<tr>
									<th>No.</th>
									<th>Nama</th>
									<th>Link</th>
									<th>Status</th>
									<th>Foto</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($banner as $banners)
								<tr>
									<td>{{$no++}}</td>
									<td>{{$banners->nama}}</td>
									<td>{{$banners->link}}</td>
									<td>{{$banners->status}}</td>
									<td><img src="{{asset('storage/' . $banners->dokumentasi)}}" width="120px"></td>
									<td>
										<a href="{{route('manage-banner.edit', ['id' => $banners->id])}}" class="btn btn-xs btn-primary"> <i class="glyphicon glyphicon-edit"></i> Edit </a>
										<a href="{{route('manage-banner.show', ['id' => $banners->id])}}" class="btn btn-xs btn-warning"> <i class="glyphicon glyphicon-eye-open"></i> View </a>
										@if(Auth::user()->role_id==1)
										<form action="{{ route('manage-banner.destroy', ['id' => $banners->id]) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure delete ? {{$banners->id}}')) { return true } else {return false };">
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