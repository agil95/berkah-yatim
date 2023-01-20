@extends('layouts.email')
@section('content')
  <p class="paragraph" style="font-size: 16px;line-height: 24px;margin-top: 10px;">
    Salam kenal <b>{{ $donation->nama }}</b>,<br>
    Terima kasih atas donasi pertama kamu di website {{ env('APP_NAME')}} untuk {title galang dana}. Kami sangat bahagia atas partisipasi kebaikan kamu.
    Kamu tidak hanya membantu mereka secara finansial, namun kamu juga memperlihatkan bahwa di dunia ini masih banyak orang-orang baik yang rela berkorban dan berbagi dengan sesama.
  </p>
  <p class="paragraph" style="font-size: 16px;line-height: 24px;margin-top: 10px;">
    Semoga langkah awal berbagi kamu di {{ env('APP_NAME')}}  bisa terus berlanjut agar semakin banyak saudara yang sedang membutuhkan dapat bangkit dan melewati cobaan hidupnya. Dan semoga partisipasi kamu dapat menjadi mutiara kebaikan yang mampu memberikan keberkahan bagi dirimu dan keluarga.
  </p>
@endsection