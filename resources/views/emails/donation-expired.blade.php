@extends('layouts.email')
@section('content')
  <p class="paragraph" style="font-size: 16px;line-height: 24px;margin-top: 10px;">
    Hai {{ $donation->nama }}, <br>
    Donasi kamu sebesar <b>Rp {{ number_format($donation->jumlah, 0, '.', ',') }}</b> untuk <b>{{ $donation->prokers ? $donation->prokers->nama_kegiatan : 'program Zakat' }}</b> belum masuk ke dalam sistem kami.
  </p>
  <p class="paragraph" style="font-size: 16px;line-height: 24px;margin-top: 10px;">
    Hal ini bisa terjadi karena dua kemungkinan: <br>
    <ol>
      <li>
        Kamu belum melakukan transfer transaksi donasi.
        silakan klik <a href="{{ url('donasi-sekarang/' . $donation->url) }}">Donasi Ulang</a> untuk melakukan donasi ulang.
      </li>
      <li>
        Ada kesalahan saat transaksi kamu berlangsung, seperti nominal transfer tidak sesuai
        hingga 3 angka terakhir, kamu transfer di luar jam bank, atau sedang terjadi kesalahan pada sistem kami atau sistem bank.
        {{-- Jika kamu melakukan poin ke-2, silakan balas melakukan konfirmasi manual melalui <a href="{{ url('pembayaran-donatur/' . $donation->id . '/upload-donasi') }}">Konfirmasi Manual</a> --}}
      </li>
    </ol>
  </p>
  <p class="paragraph" style="font-size: 16px;line-height: 24px;margin-top: 10px;">
    Apabila masih ada pertanyaan yang ingin disampaikan, mohon hubungi kami melalui <a href="mailto:halo@berkahyatim.com?subject=Donasi {{ $donation->invoice }} kadaluarsa">halo@berkahyatim.com</a>.
  </p>
@endsection