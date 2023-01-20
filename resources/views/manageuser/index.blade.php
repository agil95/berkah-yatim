@extends('layouts.global')
@section('title') List donatur @endsection
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
		</div>

		<h2>List Donatur</h2>
		@php
		$no = 1;
		@endphp
		<div class="col-md-6 btn-selection">
			<ul class="nav nav-pills">
				<li class="nav-item">
					<a class="btn btn-primary {{Request::get('status') == NULL &&
			Request::path() == 'admin/manageuser' ? 'active' : ''}}" href="
			{{route('manageuser.index')}}"><i class="glyphicon glyphicon-eye-open"></i>Donatur aktif</a>
				</li>
				<li class="nav-item">
					<a class="btn btn-primary {{Request::get('status') == 'donatur-tidak-aktif' ?
			'active' : '' }}" href="{{route('manageuser.index', ['status' =>
			'donatur-tidak-aktif'])}}"><i class="glyphicon glyphicon-eye-open"></i>Donatur tidak aktif</a>
				</li>
			</ul>
		</div>
		<br>
		<br>
		@if(Request::get('status') == NULL && Request::path() == 'admin/manageuser')
		<div class="box">
			<!-- /.box-header -->
			<div class="box-body">
				<table class="table display table-stripped table-bordered" id="example-user" style="width: 100%">
					<thead>
						<tr>
							<th><b>No.</b></th>
							<th><b>Nama</b></th>
							<th><b>Status</b></th>
							<th><b>Email</b></th>
							<th><b>Donasi (count)</b></th>
							<th><b>Amount Donasi (Rp)</b></th>
							<th><b>Action</b></th>

						</tr>
					</thead>
					<tbody>
						@foreach($user as $users)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$users->name}}</td>
							<td>@if($users->status == 'active')
								<span class="label label-success" style="font-size: 13px;"><i class="fa fa-check-circle-o"> aktif </i></span>
								@else
								<span class="label label-danger" style="font-size: 13px;"><i class="fa fa-check-circle-o"> tidak aktif </i></span>
								@endif</td>
							<td><a href="mailto:{{$users->email}}">{{$users->email}}</a></td>

							<td>{{ $users->donasis->count()}}</td>
							<td class="text-right">{{$users->amount->sum('jumlah')}}</td>
							<td>
								<a href="{{route('manageuser.show', ['id' => $users->id])}}" class="btn btn-xs btn-warning"> <i class="glyphicon glyphicon-eye-open"></i> View </a>
								@if ($users->status=='inactive') 
									<a class="btn btn-xs btn-info" href="{{ url('admin/userstatus', [$users->id,'active']) }}"  onclick="if(confirm('Change status to active? Are you sure?')) { return true } else {return false };"><i class="glyphicon glyphicon-edit"></i> Active</a>
								@else
									<a class="btn btn-xs btn-danger" href="{{ url('admin/userstatus', [$users->id,'inactive']) }}"  onclick="if(confirm('Change status to unactive? Are you sure?')) { return true } else {return false };"><i class="glyphicon glyphicon-edit"></i> Deactive</a>
								@endif
							</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th colspan="5" class="text-right">Total:</th>
							<th colspan="2" class="text-right"></th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
		@elseif(Request::get('status') == 'donatur-tidak-aktif')
		<div class="box">
			<!-- /.box-header -->
			<div class="box-body">
				<table class="table table-stripped table-bordered" id="example-user" style="width: 100%">
					<thead>
						<tr>
							<th><b>No.</b></th>
							<th><b>Nama</b></th>
							<th><b>Status</b></th>
							<th><b>Email</b></th>
							<th><b>Donasi (Paid)</b></th>
							<th><b>Amount Donasi (Paid)</b></th>
							<th><b>Action</b></th>

						</tr>
					</thead>
					<tbody>
						@foreach($user as $users)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$users->name}}</td>
							<td>@if($users->status == 'active')
								<span class="label label-success" style="font-size: 13px;"><i class="fa fa-check-circle-o"> Aktif </i></span>
								@else
								<span class="label label-danger" style="font-size: 13px;"><i class="fa fa-check-circle-o"> Tidak aktif </i></span>
								@endif</td>
							<td><a href="mailto:{{$users->email}}">{{$users->email}}</a></td>
							<td>{{ $users->donasis->count()}}</td>
							<td>Rp. {{ format_uang($users->amount->sum('jumlah')) }}</td>
							<td>
								<a href="{{route('manageuser.show', ['id' => $users->id])}}" class="btn btn-xs btn-warning"> <i class="glyphicon glyphicon-eye-open"></i> View </a>
								@if ($users->status=='inactive') 
								<a class="btn btn-xs btn-info" href="{{ url('admin/userstatus', [$users->id,'active']) }}"  onclick="if(confirm('Change status to active? Are you sure?')) { return true } else {return false };"><i class="glyphicon glyphicon-edit"></i> Active</a>
								@else
									<a class="btn btn-xs btn-danger" href="{{ url('admin/userstatus', [$users->id,'inactive']) }}"  onclick="if(confirm('Change status to unactive? Are you sure?')) { return true } else {return false };"><i class="glyphicon glyphicon-edit"></i> Deactive</a>
								@endif
							</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr></tr>
					</tfoot>
				</table>
			</div>
		</div>
		@endif
	</div>
</div>
</div>
@endsection