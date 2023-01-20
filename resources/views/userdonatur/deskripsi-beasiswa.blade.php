@extends('layouts.donatur')
@section ('title')Berkah Yatim - detail beasiswa @endsection
@section('content')
    <section>
        <div class="input judul">
            <div class="container">
                <h1 class="text-center" style="margin-top:0px;">{{$detail->nama_penerima}}</h1>
                <p class="text-center">Asal Kampus {{$detail->kampus}} , Dari Mitra <strong>{{$detail->namamitra}}</strong></p>
                <div style="padding-top:20px;">
                    <div class="container">
                        <div class="col-md-8">
                            <img src="{{asset('storage/'. $detail->dokumentasi)}}" class="img-responsive img" style="margin-top:0px; width:100%;">
                            <p style="margin-top:20px; font-size:18px;">
                                @php echo $detail->deskripsi; @endphp
                            </p>
                        </div>
                        <div class="col-md-4">
                            <h2 style="color:#6b6b6b;">Beasiswa per semester Rp. {{format_uang($detail->jumlah_persemester)}}</h2>
                            <br>
                            <h5 style="color:#6b6b6b;">Telah terima Rp. {{format_uang($detail->jumlah_total)}}</h5>
                            <sub style="color:#6b6b6b;">{{$detail->updated_at}}</sub><br>
                            <sub style="color:#6b6b6b;">Jenjang pendidikan <strong>{{$detail->pendidikan}}</strong></sub><hr style="background-color:#bebebe; height:1px; border-radius:5px;">
                            <a href="{{route('donasi.donatur')}}">
                                <button type="submit" class="btn btn-default now"><strong>DONASI SEKARANG</strong></button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection