@extends('layouts.global')
@section('title') List User Role @endsection
@section('content')

	<div class="row">
		<div class="container col-sm-12">
		<div class="col-md-12">
			@if(session('status'))
			<div class="alert alert-success">
				{{session('status')}}
			</div>
			@endif
			<h2>List User Role
				<div class="pull-right">
          <a class="btn btn-success" href="{{ route('user_role.create') }}"><i class="glyphicon glyphicon-plus"></i> Tambah User Role</a>
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
                  <th>NO</th>
                  <th>NAME</th>
                  <th>MENU</th>
                  <th class="text-right">Aksi</th>
                  </tr>
              </thead>

              <tbody>
                  @foreach($users as $key => $master_datum)
              <tr>
              <td>{{ ++$key}}</td>
              <td>{{$master_datum->name}}</td>
              <td  width="55%" align="right">{{$master_datum->menu_names}}</td>
              <td class="text-right">
				  <a class="btn btn-xs btn-warning" href="{{ route('user_role.edit', $master_datum->id) }}"><i class="glyphicon glyphicon-edit"></i> Ubah</a>
				  @if(Auth::user()->role_id==1)
				  <form action="{{ route('user_role.destroy', ['id' => $master_datum->id]) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
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