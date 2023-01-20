@extends('layouts.donatur')
@section ('title')Berkah Yatim - deskripsi infak @endsection
@section('content')
    <section>
        <div class="input judul">
            <div class="container">
                <h1 class="text-center" style="margin-top:0px;">{{$detail->nama}}</h1>
                <div style="padding-top:20px;">
                    <div class="container">
                        <div class="col-md-8">
                            <img src="{{asset('storage/'. $detail->dokumentasi)}}" class="img-responsive img" style="margin-top:0px; width:100%;">
                            <p style="margin-top:20px; font-size:18px;">
                                @php echo $detail->deskripsi; @endphp
                            </p>
                        </div>
                        <div class="col-md-4">
                            <h2 style="color:#6b6b6b;">Jumlah dana <strong>Rp. {{format_uang($detail->jumlah)}}</strong></h2>
                            <sub style="color:#6b6b6b;">Terakhir kali di donasi pada {{$detail->updated_at}}</sub><hr style="background-color:#bebebe; height:1px; border-radius:5px;">
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