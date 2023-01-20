@extends('layouts.email')
@section('content')
  <p class="paragraph" style="font-size: 16px;line-height: 24px;margin-top: 10px;">
    Donasi kamu sebesar <b>Rp {{ number_format($donation->jumlah, 0, '.', ',') }}</b> telah berhasil diterima oleh sistem kami.
  </p>
  <p class="paragraph" style="font-size: 16px;line-height: 24px;margin-top: 10px;">
    Nantikan berita terbaru dari galang dana: <b>{{ $donation->prokers ? $donation->prokers->nama_kegiatan : 'program Zakat' }}</b> untuk melihat progress dari penggunaan donasi yang kamu berikan. Percayalah, bantuan darimu telah memberikan dampak yang besar.
  </p>
  <p class="paragraph" style="font-size: 16px;line-height: 24px;margin-top: 10px;">
    Tertarik lebih rutin memberikan dampak kebaikan setiap bulan? Aktifkan fitur pengingat donasi setiap bulan via Whatsapp.
  </p>
  <div class="align-center" style="text-align: center; width: 100%; margin: 0 auto;">
    <a href="{{ url('categories/Semua') }}" style="margin:0 auto 1rem auto;display: inline-block;color: white;background: #FC5000;border: 0;font-size: .9rem;padding: 0.75rem .5rem;border-radius: 3px;text-decoration: none;font-weight: bold; width: 270px;" target="_blank">
      Lihat Galang Dana Lainnya
    </a>
  </div>  
@endsection