@extends('layouts.global')

@section('title')Tambah Menu
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
				<strong>Whoops!</strong><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<div class="box">
				<div class="box-body">
					<h2 align="center">Tambah Menu</h2>
					<form action="{{ route('menu.store') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group @if($errors->has('parent')) has-error @endif">
                    <label for="parent-field">Parent Menu</label>
                    <select name="parent" class="form-control" required>
                      <option hidden>--Pilih parent--</option>
                      @foreach($menus as $m)
                      <option value="{{$m->id}}">{{$m->name}}</option>
                      @endforeach
                    </select>
                      @if($errors->has("parent"))
                    <span class="help-block">{{ $errors->first("parent") }}</span>
                    @endif
                </div>                    
                <div class="form-group @if($errors->has('name')) has-error @endif">
                   <label for="name-field">Nama</label>
                <input type="text" id="name-field" name="name" class="form-control" />
                   @if($errors->has("name"))
                    <span class="help-block">{{ $errors->first("name") }}</span>
                   @endif
                </div>                    
            <div class="well well-sm">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-link pull-right" href="{{ route('menu.index') }}"><i class="glyphicon glyphicon-backward"></i> Kembali</a>
            </div>
        </form>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection