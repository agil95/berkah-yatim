@extends('layouts.global')
@section('title') List Mitra @endsection
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
			
			<h2>List mitra
				<div class="pull-right">
					<a
					href="{{route('manage-mitra.create')}}"
					class="btn btn-success"
					><i class="glyphicon glyphicon-plus"></i> Tambah Mitra</a>
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
									<th>Nama mitra</th>
									<th>Alamat</th>
									<th>Email</th>
									<th>Jumlah anggota</th>
									<th>Created by</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($mitra as $mitras)
								<tr>
									<td>{{$no++}}</td>
									<td>{{$mitras->nama}}</td>
									<td>{{$mitras->alamat}}</td>
									<td>{{$mitras->email}}</td>
									<td>{{$mitras->jumlah}}</td>
									<td>admin <strong>{{$mitras->namaadmin}}</strong></td>
									<td>
										<a href="{{route('manage-mitra.edit', ['id' => $mitras->id])}}" class="btn btn-xs btn-primary"> <i class="glyphicon glyphicon-edit"></i> Edit </a>
										<a href="{{route('manage-mitra.show', ['id' => $mitras->id])}}" class="btn btn-xs btn-warning"> <i class="glyphicon glyphicon-eye-open"></i> View </a>
										<form action="{{ route('manage-mitra.destroy', ['id' => $mitras->id]) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
										<input type="hidden" name="_method" value="DELETE">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
										</form>
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