@isset($nav)
<div class="by-bottom-nav by-container">
  <div class="by-bottom-nav-card">
    <a href="{{ $nav == 'home' ? '/' : '/' }}" class="nav-item">
      <img
        src="{{ asset('dist/img/' . ($nav == 'home' ? 'ico-nav-home-active.svg' : 'ico-nav-home.svg')) }}"
        alt="home"
        class="nav-item__img"
      >
      <p class="nav-item__p">Home</p>
    </a>
    <a href="{{ $nav == 'riwayat' ? '#' : url('donatur/riwayat-donasi') }}" class="nav-item">
      <img
        src="{{ asset('dist/img/' . ($nav == 'riwayat' ? 'ico-nav-history-active.svg' : 'ico-nav-history.svg')) }}"
        alt="riwayat"
        class="nav-item__img"
      >
      <p class="nav-item__p">Riwayat Donasi</p>
    </a>
    <a href="{{ $nav == 'akun' ? '#' : url('donatur/akun') }}" class="nav-item">
      <img
        src="{{ asset('dist/img/' . ($nav == 'akun' ? 'ico-nav-account-active.svg' : 'ico-nav-account.svg')) }}"
        alt="akun"
        class="nav-item__img"
      >
      <p class="nav-item__p">Akun</p>
    </a>
  </div>
</div>
@endisset