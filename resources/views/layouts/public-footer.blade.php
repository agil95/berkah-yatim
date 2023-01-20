<footer class="container lg:max-w-5xl px-2 pb-4 md:px-4 md:pb-10 mx-auto text-center text-xs pt-10">
  <div class="flex md:flex-wrap">
    <div class="w-full md:w-1/4 p-2">
      <a href="{{url('/')}}">
        <img style="height: 95px;" src="{{ asset('img/logo_color.png') }}" alt="#berkahyatim">
      </a>
      <p class="margin-tp-xs">Yayasan Berkah Yatim adalah lembaga penggalangan dana online dengan situs
        berkahyatim.com yang menggalang program Zakat, Beasiswa, Infaq, Sedekah dan Wakaf.</p>
    </div>

    <div class="w-full md:w-1/4 p-2">
      <h4 class="margin-top-zero">Tentang</h4>
      <ul class="list-unstyled">
        <li><a class="link-footer" href="{{ url('term-and-policy') }}">Syarat dan Ketentuan</a></li>
        <li><a class="link-footer" href="{{ url('privacy-policy') }}">Privasi</a></li>
        <li><a class="link-footer" href="{{ url('about') }}">Tentang Kami</a></li>
        <li>
          @if(Auth::check())
          <a href="{{ route('logout') }}" class="link-footer" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            <strong>{{ __('Logout') }}</strong>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
          @endif
        </li>
      </ul>
    </div>

    <div class="w-full md:w-1/4 p-2">
      <h4 class="margin-top-zero">Kategori</h4>
      <ul class="list-unstyled">
        @foreach($kategori as $kategories)
        <li>
          <a class="link-footer" target="_blank" href="{{url('prokers',$kategories->nama)}}">{{$kategories->nama}}</a>
        </li>
        @endforeach
      </ul>
    </div>

    <div class="w-full md:w-1/4 p-2">
      <h4 class="margin-top-zero">Pusat Bantuan</h4>
      <div class="flex items-end justify-center pt-2">
        <span><a href="tel:6281284064281" class="ico-social" target="_blank"><i class="ti-mobile"></i></a></span>
        <span><a href="mailto:admin@berkahyatim.com" class="ico-social" target="_blank"><i class="ti-email"></i></a></span>
        <span><a href="#" class="ico-social" target="_blank"><i class="ti-twitter"></i></a></span>
        <span><a href="https://www.facebook.com/berkah.yatim.100" class="ico-social" target="_blank"><i class="ti-facebook"></i></a></span>
        <span><a href="#" class="ico-social" target="_blank"><i class="ti-instagram"></i></a></span>
        <span><a href="#" class="ico-social" target="_blank"><i class="ti-youtube"></i></a></span>
        <span><a href="https://web.whatsapp.com/send?phone=6281284064281&amp;text=Assalammu%27alaikum+admin%2C+saya+mau+bertanya" class="ico-social" target="_blank"><i class="ti-whatsapp"></i></a></span>
      </div>
    </div>
  </div>
  <!-- <p class="mb-4">© 2019 <a href="https://www.berkahyatim.com/?utm_source=copyright" class="underline">Yayasan Berkah Yatim</a></p> -->

</footer>