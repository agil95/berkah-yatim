@extends('layouts.public')

@section('content')
<div class="container lg:max-w-5xl px-2 pb-4 md:px-4 md:pb-10 mx-auto pt-2">
  <div class="bg-white p-3 md:p-6 border-custom box-shadow-custom-sm">
    <div class="swiper-wrapper" style="transition-duration: 0ms;">
      @foreach($banner as $banners)
      <div class="CarouselImageContainer-ipwr86-1"><a id="horizontal-image-slider-0" href="{{ url($banners->link) }}" class="CarouselLink-ipwr86-2 fwGrbi"><img src="{{asset('storage/'. $banners->dokumentasi)}}" alt="image-9" class="img-responsive"></a></div>
      @endforeach
    </div>

    <div class="style__Container-bkurlc-0 gjquVt">
      <div role="button" class="style__TileWrapper-bkurlc-1 jNIJRT">
        <div class="style__IconWrapper-bkurlc-2 lkPqZi">
          <div class="icon" style="background-image: url('https://assets.kitabisa.cc/images/products/icon-donasi.png');">
          </div>
        </div>
        <div class="label">Donasi</div>
      </div>
      <div role="button" class="style__TileWrapper-bkurlc-1 jNIJRT">
        <div class="style__IconWrapper-bkurlc-2 lkPqZi">
          <div class="icon" style="background-image: url('https://assets.kitabisa.cc/images/products/icon-zakat.png');">
          </div>
        </div>
        <div class="label">Zakat</div>
      </div>
      <div role="button" class="style__TileWrapper-bkurlc-1 jNIJRT">
        <div class="style__IconWrapper-bkurlc-2 lkPqZi">
          <div class="icon" style="background-image: url('https://assets.kitabisa.cc/images/products/icon-kbplus.png');">
          </div>
        </div>
        <div class="label">Amal Plus</div>
      </div>
      <div role="button" class="style__TileWrapper-bkurlc-1 jNIJRT">
        <div class="style__IconWrapper-bkurlc-2 lkPqZi">
          <div class="icon" style="background-image: url('https://assets.kitabisa.cc/images/products/icon-donasi-rutin.png');">
          </div>
        </div>
        <div class="label">Donasi Rutin</div>
      </div>
    </div>
  </div>
</div>

<div class="container lg:max-w-5xl px-2 pb-4 md:px-4 md:pb-10 mx-auto pt-2">
  <div class="bg-white p-3 md:p-6 border-custom box-shadow-custom-sm">
    <h3 class="text-xl md:text-3xl font-bold text-gray-900 text-center mb-10">Program pilihan berkahyatim.com
    </h3>
    <div class="flex md:flex-wrap featured-section" id="ProgramListPilihan">
      @foreach($proker as $prokers)
      <div class="w-full md:w-1/3 p-2 featured-item">
        <div class="p-card program-item-ex hover:shadow-lg">
          <div class="p-card__head">
            <figure class="p-card__thumb" style="height: 162.992px;"><img class="preview" src="{{asset('storage/'. $prokers->dokumentasi)}}" alt="{{$prokers->tag}}">
            </figure>
          </div>
          <div class="p-card__body">
            <h3 class="p-card__title font-semibold">{{$prokers->nama_kegiatan}}</h3>
            <div class="p-card__subtitle text-gray-800">
              <div class="p-card__subtitle-wording"><span class="text-xs inline">{{$prokers->fundriser['nama']}} <svg class="inline-block ml-1" width="13" height="13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.5 0A6.507 6.507 0 000 6.5C0 10.084 2.916 13 6.5 13S13 10.084 13 6.5 10.084 0 6.5 0z" fill="#FE8057"></path>
                    <path d="M9.588 4.814l-3.596 3.48a.561.561 0 01-.39.156.561.561 0 01-.392-.157l-1.798-1.74a.522.522 0 010-.756.566.566 0 01.782 0l1.407 1.361 3.205-3.1a.566.566 0 01.782 0 .523.523 0 010 .756z" fill="#FAFAFA"></path>
                  </svg></span></div>
            </div>
          </div>
          <div class="p-card__footer text-gray-800">
            <div class="p-card__bar bg-gray-200 w-full h-1 mb-2 rounded overflow-hidden">
              <div class="p-card__progress bg-blue-800 h-1 max-w-full" style="width: {{($prokers->actual_earn/$prokers->target)*100}}%"></div>
            </div>
            <div class="p-card__count">
              <div class="p-card__countitem">
                <div class="p-card__stats"><span>Terkumpul</span><span class="text-sm text-black font-semibold block">Rp {{format_uang($prokers->actual_earn)}}</span></div>
              </div>
              <div class="p-card__countitem text-right">
                <div class="p-card__stats"><span>Sisa hari</span><span class="text-sm text-black font-semibold block">{{$prokers->left_day}}</span></div>
              </div>
            </div>
          </div><a class="p-card__href" href="{{ url('proker', $prokers->url()) }}"></a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

<div class="container px-2 py-4 md:px-4 md:py-10 mx-auto text-center">
  <h3 class="text-xl md:text-3xl font-bold text-gray-900">Mau beramal apa hari ini?</h3>
  <p class="text-gray-600 md:text-xl">Pilih programnya, segerakan dapat amalnya</p>
</div>

<div class="container lg:max-w-5xl px-2 pb-4 md:px-4 md:pb-10 mx-auto">
  <div class="flex flex-wrap" id="ProgramList">
    @foreach($infak as $infaks)
    <div class="w-full sm:w-1/2 md:w-1/3 p-2">
      <div class="p-card program-item-ex hover:shadow-lg">
        <div class="p-card__head">
          <figure class="p-card__thumb" style="height: 162.992px;"><img class="preview" src="{{asset('storage/'. $infaks->dokumentasi)}}" alt="{{ $infaks->judul }}"></figure>
        </div>
        <div class="p-card__body">
          <h3 class="p-card__title font-semibold">{{ $infaks->judul }}</h3>
          <div class="p-card__subtitle text-gray-800">
            <div class="p-card__subtitle-wording"><span class="text-xs inline">{{ $infaks->mitra['nama'] }} <svg class="inline-block ml-1" width="13" height="13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6.5 0A6.507 6.507 0 000 6.5C0 10.084 2.916 13 6.5 13S13 10.084 13 6.5 10.084 0 6.5 0z" fill="#FE8057"></path>
                  <path d="M9.588 4.814l-3.596 3.48a.561.561 0 01-.39.156.561.561 0 01-.392-.157l-1.798-1.74a.522.522 0 010-.756.566.566 0 01.782 0l1.407 1.361 3.205-3.1a.566.566 0 01.782 0 .523.523 0 010 .756z" fill="#FAFAFA"></path>
                </svg></span></div>
          </div>
        </div>
        <div class="p-card__footer text-gray-800">
          <div class="p-card__bar bg-gray-200 w-full h-1 mb-2 rounded overflow-hidden">
            <div class="p-card__progress bg-blue-800 h-1 max-w-full" style="width: {{($infaks->jumlah_real/$infaks->jumlah)*100}}%"></div>
          </div>
          <div class="p-card__count">
            <div class="p-card__countitem">
              <div class="p-card__stats"><span>Terkumpul</span><span class="text-sm text-black font-semibold block">Rp {{ format_uang($infaks->jumlah_real) }}</span></div>
            </div>
            <div class="p-card__countitem text-right">
              <div class="p-card__stats"><span>Sisa hari</span> {{ $infaks->day_left}}
              </div>
            </div>
          </div>
        </div><a class="p-card__href" href="{{ url($infaks->judul) }}"></a>
      </div>
    </div>
    @endforeach
  </div>

  <div class="load-program" style="display: none;">
    <div class="flex flex-wrap">
      <div class="w-full sm:w-1/2 md:w-1/3 p-2">
        <div class="p-card program-item-ex hover:shadow-lg">
          <div class="p-card__head">
            <figure class="p-card__thumb" style="height: 162.992px;"></figure>
          </div>
          <div class="p-card__body p-5">
            <h3 class="p-card__title font-semibold mb-3"></h3>
            <div class="p-card__subtitle text-gray-800"></div>
          </div>
        </div>
      </div>
      <div class="w-full sm:w-1/2 md:w-1/3 p-2 md:block hidden">
        <div class="p-card program-item-ex hover:shadow-lg">
          <div class="p-card__head">
            <figure class="p-card__thumb" style="height: 162.992px;"></figure>
          </div>
          <div class="p-card__body p-5">
            <h3 class="p-card__title font-semibold mb-3"></h3>
            <div class="p-card__subtitle text-gray-800"></div>
          </div>
        </div>
      </div>
      <div class="w-full sm:w-1/2 md:w-1/3 p-2 md:block hidden">
        <div class="p-card program-item-ex hover:shadow-lg">
          <div class="p-card__head">
            <figure class="p-card__thumb" style="height: 162.992px;"></figure>
          </div>
          <div class="p-card__body p-5">
            <h3 class="p-card__title font-semibold mb-3"></h3>
            <div class="p-card__subtitle text-gray-800"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <button type="button" class="w-full mt-10 rounded bg-blue-800 hover:bg-blue-500 py-6 px-3 text-white font-semibold text-center loadmore-explore hidden md:block">
    Tampilkan Lebih Banyak
  </button>
</div>
@stop