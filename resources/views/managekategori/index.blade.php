@extends('layouts.global')
@section('title') List kategori @endsection
@section('content')

	<div class="row">
		<div class="container col-sm-12">
		<div class="col-md-12">
			@if(session('status'))
			<div class="alert alert-success">
				{{session('status')}}
			</div>
			@endif
			<h2>List kategori
				<div class="pull-right">
					<a
					href="{{route('manage-kategori.create')}}"
					class="btn btn-success"
					><i class="glyphicon glyphicon-plus"></i> Tambah kategori</a>
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
									<th>Nama</th>
									<th>Nama Tombol</th>
									<th>Foto</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($kategori as $kategoris)
								<tr>
									<td>{{$no++}}</td>
									<td>{{$kategoris->nama}}</td>
									<td>{{$kategoris->nama_button}}</td>
									<td><img src="{{asset('storage/' . $kategoris->dokumentasi)}}" width="120px"></td>
									<td>			
										@if ($kategoris->status=='inactive') 
										<a class="btn btn-xs btn-info" href="{{ url('admin/kategoristatus', [$kategoris->id,'active']) }}"  onclick="if(confirm('Change status to active? Are you sure?')) { return true } else {return false };"><i class="glyphicon glyphicon-edit"></i> Unactive</a>
										@else
											<a class="btn btn-xs btn-danger" href="{{ url('admin/kategoristatus', [$kategoris->id,'inactive']) }}"  onclick="if(confirm('Change status to unactive? Are you sure?')) { return true } else {return false };"><i class="glyphicon glyphicon-edit"></i> Active</a>
										@endif
									</td>
									<td>
										<a href="{{route('manage-kategori.edit', ['id' => $kategoris->id])}}" class="btn btn-xs btn-primary"> <i class="glyphicon glyphicon-edit"></i> Edit </a>
										<a href="{{route('manage-kategori.show', ['id' => $kategoris->id])}}" class="btn btn-xs btn-warning"> <i class="glyphicon glyphicon-eye-open"></i> View </a>
										@if(Auth::user()->role_id==1)
										<form action="{{ route('manage-kategori.destroy', ['id' => $kategoris->id]) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
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