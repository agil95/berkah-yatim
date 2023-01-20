@extends('layouts.donatur')
@section ('title', 'Penyaluran')
@section('content')
<section>
    <div class="dashboard">
        <div class="container">
            @include('layouts.donatur-sidebar', ['active' => 'penyaluran'])
            <div class="col-md-9">
                <h2 style="margin-top:40px;">Daftar penyaluran di Berkah Yatim</h2>
                <hr style="background-color:#01579b; height:3px; border-radius:5px;">
                <table id="example" class="table table-bordered table-stripped">
                    <thead style="background-color: #01579b; color:#ffffff;">
                        <tr>
                            <th>Nama Penerima</th>
                            <th>Deskripsi</th>
                            <th>Program</th>
                            <th>Tanggal</th>
                            <th>Jumlah Donasi</th>
                            <th>Dokumentasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($penyaluran as $donaturs)
                        <tr>
                            <td>{{$donaturs->name}}</td>
                            <td>{!!$donaturs->deskripsi!!}</td>
                            <td><a target="_blank" href="{{ url('proker',$donaturs->prokers['url']) }}">{{$donaturs->prokers['nama_kegiatan']}}</a></td>
                            <td>{{$donaturs->created_at}}</td>
                            <td>Rp. {{format_uang($donaturs->jumlah)}}</td>
                            <td><img src="{{asset('storage/' . $donaturs->dokumentasi)}}" width="120px"></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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