@extends('layouts.public')

@section('navbar')
    @include('layouts.navbar', ['page_title' => 'Frequently Asked Questions', 'primary' => false])
@endsection

@section('content')
<section class="section">
  <div class="by-accordion">
    <div class="by-accordion-header">
      <h3 class="text--subsubtitle text--semibold">Apa itu berkahyatim.com?</h3>
    </div>
    <div class="by-accordion-body">
    berkahyatim.com adalah website yang dibuat atas nama {yayasan} agar masyarakat dapat berdonasi untuk program-program sosial di yayasan kami secara online.
    </div>
  </div>
  <div class="by-accordion">
    <div class="by-accordion-header">
      <h3 class="text--subsubtitle text--semibold">Bagaimana cara berdonasi online di berkahyatim.com?</h3>
    </div>
    <div class="by-accordion-body">
      <ol type="a">
        <li>Silakan kunjungi berkahyatim.com dari browser Hp atau PC kamu.</li>
        <li>Pilih salah satu program sosial yang kamu minati</li>
        <li>Di halaman program sosial tersebut, klik tombol yang bertuliskan “Donasi Sekarang”</li>
        <li>Ikuti petunjuk yang muncul selanjutnya (isi nominal donasi - pilih metode pembayaran - isi identitas diri)</li>
        <li>Kamu dapat memilih untuk menyertakan nama kamu atau tidak (anonim).</li>
        <li>Pada akhir tahap donasi kamu di website, akan muncul rangkuman pembayaran berupa nominal donasi dan nomor rekening tujuan transfer.</li>
        <li>Mohon transfer sesuai dengan petunjuk di rangkuman pembayaran agar donasi kamu dapat terverifikasi otomatis di sistem.</li>
        <li>Kamu akan mendapat pemberitahuan via email dan/atau whatsapp saat donasi kamu telah selesai terverifikasi.</li>
      </ul>
    </div>
  </div>
  <div class="by-accordion">
    <div class="by-accordion-header">
      <h3 class="text--subsubtitle text--semibold">Bagaimana jika saya telah transfer, namun saya belum mendapatkan pemberitahuan?</h3>
    </div>
    <div class="by-accordion-body">
      <p>Itu artinya transaksi kamu belum terverifikasi oleh sistem kami. Hal ini bisa terjadi karena beberapa kemungkinan:</p>
      <ul>
        <li>Kamu tidak transfer sesuai kode unik yang tertera (hingga 3 digit terakhir)</li>
        <li>Kamu donasi di luar jam kerja bank sehingga butuh waktu verifikasi lebih lama dari yang seharusnya.</li>
        <li>Sedang terjadi kesalahan pada sistem kami atau pada sistem bank.</li>
      </ul>
      <p>Demi memperjelas masalah transaksi yang kamu hadapi, mohon hubungi customer care kami dengan mengirimkan email ke customer care kami di support@berkahyatim.com</p>
    </div>
  </div>
  <div class="by-accordion">
    <div class="by-accordion-header">
      <h3 class="text--subsubtitle text--semibold">Apakah saya dapat berdonasi tanpa diketahui nama saya?</h3>
    </div>
    <div class="by-accordion-body">
      Ya, kamu dapat berdonasi menggunakan fitur anonim. Dengan begitu nama kamu tidak akan muncul donatur. Kamu dapat
      menggunakan fitur ini dengan menchecklist “donasi sebagai anonim” saat kamu sedang melakukan pengisian data 
      untuk berdonasi online.
    </div>
  </div>
  <div class="by-accordion">
    <div class="by-accordion-header">
      <h3 class="text--subsubtitle text--semibold">Berapa jumlah minimal donasi online di berkahyatim.com?</h3>
    </div>
    <div class="by-accordion-body">
      Kamu dapat berdonasi di berkahyatim.com mulai dari Rp10.000 saja.
    </div>
  </div>
  <div class="by-accordion">
    <div class="by-accordion-header">
      <h3 class="text--subsubtitle text--semibold">Bagaimana saya mengetahui penggunaan dana yang saya donasikan?</h3>
    </div>
    <div class="by-accordion-body">
      Kamu akan mendapatkan pemberitahuan melalui email dan/atau whatsapp dari Tim Program kami berupa update atau 
      progress program sosial yang kamu didonasikan. Dalam update atau progress tersebut, kamu akan diberikan 
      informasi berupa penggunaan dana yang telah dikeluarkan dan detail peruntukkan penggunaan dananya. Dengan 
      begitu, kamu dapat tahu secara transparan berapa total dana donasi yang digunakan dan untuk keperluan apa.
    </div>
  </div>
  <div class="by-accordion">
    <div class="by-accordion-header">
      <h3 class="text--subsubtitle text--semibold">Apakah saya harus login untuk dapat berdonasi?</h3>
    </div>
    <div class="by-accordion-body">
      Tidak, kamu dapat berdonasi tanpa memiliki akun berkahyatim.com. Namun, jika kamu memiliki akun di berkahyatim.com,
      kamu dapat berdonasi lebih mudah karena tidak perlu memasukkan data diri lagi dan kamu dapat melihat riwayat
      donasi yang pernah kamu berikan serta status donasi kamu secara online.
    </div>
  </div>
  <hr class="divider">
  <p class="pt-l">Masih memiliki pertanyaan lain? Silahkan hubungi kami di <a href="mailto:support@berkahyatim.com" class="text--primary">support@berkahyatim.com</a></p>
</section>
@stop
