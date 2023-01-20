@extends('layouts.global')

@section('title')Tambah Admin
@endsection

@section('content')

<div class="row">
	<div class="container col-sm-12">
	<div class="col-md-8">
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
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
		<div class="box">
			<h2 align="center">Tambah Admin</h2>
			<div class="box-body">
		<form
		action="{{route('manageadmin.store')}}"
		method="POST"
		enctype="multipart/form-data"
		class="shadow-sm p-3 bg-white"
		>
		@csrf
		<label for="nama">Name </label> <br>
		<input type="text" class="form-control" name="name" placeholder="Your name" value="{{ old('name') }}" required>
		<br>
		<div class="form-group @if($errors->has('role')) has-error @endif">
			<label for="triwulan-field">Role</label>
			 <select class="form-control" id="role-field" name="role">                    
				 <option value="">Pilih Role</option>
				 @foreach($roles as $p)
					 <option value="{{ $p->id }}">{{ $p->name }}</option>
				 @endforeach
			 </select>                       
			@if($errors->has("role"))
			 <span class="help-block">{{ $errors->first("role") }}</span>
			@endif
		 </div>
		<div class="form-group">
			<label>Jenis Kelamin</label><br>
                <label>
                  <input type="radio" name="jkel" value="L" class="minimal" required>Laki-laki
                </label>
                <label>
                  <input type="radio" name="jkel" value="P" class="minimal" required>Perempuan
                </label>
              </div>
		<label for="emai">Email </label> <br>
		<input type="email" class="form-control" name="email"
		placeholder="Your email" value="{{ old('email') }}" required>
		<br>
		<label for="phone">Phone </label> <br>
		<input type="text" class="form-control" name="phone"
		placeholder="Your phone number" value="{{ old('phone') }}" required>
		<br>
		<label for="password">Password </label> <br>
		<input type="password" class="form-control" name="password" id="pw1" 
		placeholder="Your password min 6" value="{{ old('pass') }}" pattern="^\S{6,}$" 
		onchange="this.setCustomValidity(this.validity.patternMismatch ? 'minimal 6 karakter' : '');"  required>
		<span id="notif" ></span>
		<br>
		<label for="password-confirm">Confirm Password </label> <br>
		<input type="password" class="form-control" name="confpass" id="pw2" 
		placeholder="Your password" value="{{ old('confpass') }}" required>
		<br>
		<label for="fotoadmin">Photo</label>
		<input type="file" class="form-control" name="fotoadmin" value="{{ old('fotoadmin') }}" accept="image/*" required>
		<br>	
		<small class="text-muted">Kosongkan jika tidak ingin mengubah
			cover. Ukuran maksimal 1 MB</small>
		<br>
		<input type="submit" name="addadmin" class="btn btn-primary btn-flat" value="Add admin">
	
</form>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
            window.onload = function () {
                document.getElementById("pw1").onchange = validatePassword;
                document.getElementById("pw2").onchange = validatePassword;
            }
            function validatePassword(){
                var pass2=document.getElementById("pw2").value;
                var pass1=document.getElementById("pw1").value;
                if(pass1!=pass2)
                    document.getElementById("pw2").setCustomValidity("Passwords Tidak Sama, Coba Lagi");
                else
                    document.getElementById("pw2").setCustomValidity('');
            }
        </script>


@endsection