@extends('layouts.donatur')
@section ('title', 'Edit Profile')
@section('content')

<section>
    <div class="dashboard">
        <div class="container">
            @include('layouts.donatur-sidebar', ['active' => 'edit-profile'])
            <div class="col-md-6 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if(session('status'))
                        <div class="alert alert-success" role="alert">{{session('status')}}</div>
                        @elseif(session('gagal'))
                        <div class="alert alert-danger" role="alert">{{session('gagal')}}</div>
                        @endif
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Foto minimal 2MB<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <h3 class="text-center">Halo {{ Auth::user()->name }}</h3>
                        <p class="text-center text">Update profil anda</p>
                        <form action="{{route('proses.edit.profile')}}" method="POST" enctype="multipart/form-data" accept="image/*">
                            @csrf
                            <div class="input-group">
                                <div class="input-group-addon"><span class="ti ti-user"></span></div>
                                <input type="text" class="form-control" id="exampleInputAmount" value="{{ Auth::user()->name }}" name="name" required placeholder="Nama Lengkap">
                            </div>

                            <div class="input-group">
                                <label>Jenis Kelamin</label><br>
                                @if(Auth::user()->jkel =='L')
                                <label>
                                    <input type="radio" name="jkel" value="L" class="minimal" required checked> Laki-laki&nbsp;&nbsp;</input>
                                </label>
                                <label>
                                    <input type="radio" name="jkel" value="P" class="minimal" required> Perempuan </input>
                                </label>
                                @else
                                <label>
                                    <input type="radio" name="jkel" value="L" class="minimal" required> Laki-laki&nbsp;&nbsp;</input>
                                </label>
                                <label>
                                    <input type="radio" name="jkel" value="P" class="minimal" required checked> Perempuan </input>
                                </label>
                                @endif
                            </div>
                            <div class="input-group">
                                <div class="input-group-addon"><span>@</span></div>
                                <input type="email" class="form-control" id="exampleInputAmount" value="{{ Auth::user()->email }}" name="email" placeholder="Alamat Email" required>
                            </div>
                            <!-- <div class="input-group">
                                <div class="input-group-addon"><span class="ti ti-money"></div>
                                <input type="tel" class="form-control" id="exampleInputEmail1" placeholder="Jumlah minimal donasi perbulan" name="donasi" onkeypress="return isNumberKey(event)" value="{{ Auth::user()->donasi_awal }}" required>
                            </div> -->
<!--                             <div class="input-group">
                                <div class="input-group-addon"><span class="ti ti-lock"></span></div>
                                <input placeholder="Masukkan Password Baru *sensitive" type="password" name="pass" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Minimal 6 Karakter' : ''); if(this.checkValidity()) form.pass2.pattern = this.value;" class="form-control" id="passwordfield">
                            </div> -->
                            <div class="input-group">
                                <div class="input-group-addon"><span class="ti ti-mobile"></span></div>
                                <input type="tel" class="form-control" placeholder="Nomor Telpon Seluler" id="exampleInputEmail1" value="{{ Auth::user()->nohp }}" name="nohp" onkeypress="return isNumberKey(event)" required>
                            </div>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="ti-map-alt"></span></div>
                                <input type="text" class="form-control" placeholder="Alamat" id="exampleInputEmail1" value="{{ Auth::user()->alamat }}" name="alamat" required>
                            </div>
                            <div class="input-group">
                                <label for="exampleInputFile">Upload Foto</label>
                                <input type="file" id="exampleInputFile" name="profile" accept="image/*">
                                <p class="help-block">Maximum 2MB.</p>
                            </div>
                            <br>
                            <input type="hidden" name="_method" value="PUT">
                            <input type="submit" class="btn btn-primary edit" value="Simpan Pembaruan">
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="confirm-absen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Berhenti jadi Donatur</h4>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin melanjutkan ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" style="margin-top:24px;
                        background-color: #fb0000; border-color: #fb0000;">Batal</button>
                            <form action="{{route('stop-donatur')}}" method="POST">
                                @csrf
                                <input type="submit" name="" class="btn btn-primary btn-ok" value="Konfirmasi">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection