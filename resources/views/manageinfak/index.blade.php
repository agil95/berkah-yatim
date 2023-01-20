@extends('layouts.global')
@section('title') List kegiatan infak @endsection
@section('content')

	<div class="row">
		<div class="container col-sm-12">
		<div class="col-md-12">
			@if(session('status'))
			<div class="alert alert-success">
				{{session('status')}}
			</div>
			@endif
			<h2>List kegiatan infak</h2>

				<div class="row">
					<div class="col-md-12 text-right">
						<a
						href="{{route('manage-infak.create')}}"
						class="btn btn-primary "
						><i class="glyphicon glyphicon-plus"></i> Tambah kegiatan</a>
					</div>
				</div>
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
									<th>Image</th>
									<th>Nama Mitra</th>
									<th>Nama</th>
									<th>Target dana</th>
									<th>Dana terkumpul</th>
									<th>Sisa hari</th>
									<th>Created by</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($infak as $infaks)
								<tr>
									<td>{{$no++}}</td>
									<td><img src="{{asset('storage/' . $infaks->dokumentasi)}}" width="120px"></td>
									<td>{{$infaks->namaproker}}</td>
									<td>{{$infaks->judul}}</td>
									<td>Rp. {{format_uang($infaks->jumlah)}}</td>
									<td>Rp. {{format_uang($infaks->jumlah_real)}}</td>
									<td>{{$infaks->day_left}}</td>
									<td>admin <strong>{{$infaks->namaadmin}}</strong></td>
									<td>
										<a href="{{route('manage-infak.edit', ['id' => $infaks->id])}}" class="btn btn-xs btn-primary"> <i class="glyphicon glyphicon-edit"></i> Edit </a>
										<a href="{{route('manage-infak.show', ['id' => $infaks->id])}}" class="btn btn-xs btn-warning"> <i class="glyphicon glyphicon-eye-open"></i> View </a>
										<form action="{{ route('manage-infak.destroy', ['id' => $infaks->id]) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
										<input type="hidden" name="_method" value="DELETE">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
									</form>
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