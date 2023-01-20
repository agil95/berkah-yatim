@extends('layouts.global')

@section('title')Edit User Role
@endsection

@section('content')

<div class="row">
	<div class="container col-sm-12">
		<div class="col-md-11">
			@if(session('status'))
			<div class="alert alert-success">
				{{session('status')}}
			</div>
			@elseif(session('gagal'))
			<div class="alert alert-danger">
				{{session('gagal')}}
			</div>
			@endif
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Whoops!</strong><br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<div class="box">

				<div class="box-body">
					<h2>Edit User Role</h2>
					<form action="{{ route('user_role.update', $role->id) }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group @if($errors->has('name')) has-error @endif">
                   <label for="name-field">Nama</label>
                <input type="text" id="name-field" name="name" class="form-control" value="{{ $role->name}}" />
                   @if($errors->has("name"))
                    <span class="help-block">{{ $errors->first("name") }}</span>
                   @endif
                </div>
                <div class="form-group @if($errors->has('menu_ids')) has-error @endif">
                   <label for="user_id-field">Menu</label>
                    <select multiple="multiple" class="form-control select2" id="menu_ids-field" name="menu_ids[]">                    
                    @foreach ($menus as $u)
                        <option @if(Auth::user()->cek($role->menu_ids,$u->id)) selected="selected" @endif  value="{{$u->id}}">{{ $u->name }}</option>
                    @endforeach
                    </select>                       
                     @if($errors->has("menu_ids"))
                    <span class="help-block">{{ $errors->first("menu_ids") }}</span>
                   @endif
                </div>
                <div class="well well-sm">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-link pull-right" href="{{ route('user_role.index') }}"><i class="glyphicon glyphicon-backward"></i> Kembali</a>
            </div>
        </form>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection