@extends('layouts.public')
@section ('title')Berkah Yatim - donasi sekarang @endsection

@section('content')
<section>
    <div class="dashboard">
        <div class="container">
            <div class="col-md-3 col-md-offset-1">
                <a href="#" class="thumbnail">
                    @if(Auth::user()->activated != '0')
                    <img src="{{ Auth::user()->foto }}" alt="background-user">
                    @else
                    <img src="{{asset('storage/'. Auth::user()->foto) }}" alt="background-user">
                    @endif
                </a>
                <div class="list-group">
                    <a href="{{route('donatur.dashboard')}}" class="list-group-item">Overview</a>
                    <!-- <a href="{{route('donasi.donatur')}}" class="list-group-item active">Donasi Sekarang</a> -->
                    <a href="{{route('edit.profile')}}" class="list-group-item">Edit Profil</a>
                    <!-- <a href="{{route('daftar.donatur')}}" class="list-group-item">Lihat daftar donatur</a> -->
                    <!-- <a href="{{route('daftar.mitra')}}" class="list-group-item">Lihat daftar mitra Berkah Yatim</a> -->
                    <a href="{{ route('logout') }}" class="list-group-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <!-- <a data-toggle="modal" data-target="#confirm-absen" class="list-group-item" style="cursor:pointer;">Berhenti jadi donatur</a> -->
                </div>
            </div>
            <div class="col-md-5 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if(session('gagal'))
                        <div class="alert alert-danger">
                            {{session('gagal')}}
                        </div>
                        @endif
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Errors!</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <h3 class="text-center">Halo {{ Auth::user()->name }}</h3>
                        <p class="text-center text">Mulai Berdonasi Sekarang</p>
                        <form action="{{route('verifikasi.bayar')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Nama program</label> <br>
                                <select name="proker" class="form-control" required>
                                    <option hidden>--Pilih program kerja--</option>
                                    @foreach($programs as $program)
                                    <option value="{{$program->id}}" @if($program->id == $proker) selected='selected' @endif>{{$program->nama_kegiatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                                <div class="input-group">
                                    <div class="input-group-addon">Rp</div>
                                    <input type="number" class="form-control" id="uang" name="jumlah" value="{{$donasi}}" onkeypress="return isNumberKey(event)" required>
                                </div>
                                <sub>* Donasi wajib Anda Rp. {{format_uang($donasi)}}</sub>
                            </div>
                            <button type="submit" class="btn btn-default board">Lanjut Pembayaran</button>
                        </form>
                        <p class="text-center">Sudah melakukan donasi? <span><a href="{{route('donatur.dashboard')}}">klik disini</a></span></p>
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