<!DOCTYPE html>
<html lang="id">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Language" content="en">
  <meta name="msapplication-TileColor" content="#fe8057">
  <meta name="theme-color" content="#fe8057">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <title>@yield('title', 'Cari Kebaikan') - {{ env('APP_NAME') }}</title>
  <meta name="description" content="{{ env('APP_NAME') }} adalah platform donasi dan penggalangan dana online yang membantu program zakat, beasiswa pendidikan, sedekah dan bantuan sosial lainnya.">
  <meta name="robots" content="all">

  <meta property="og:title" @if(isset($proker['nama_kegiatan'])) content="Klik untuk donasi - {{ $proker->nama_kegiatan }}" @endif>
  <meta property="og:description" content="{{ env('APP_NAME') }} adalah platform donasi dan penggalangan dana online yang membantu program zakat, beasiswa pendidikan, sedekah dan bantuan sosial lainnya.">
  <meta property="og:url" @if(isset($proker['url'])) content="{{ url('campaign',$proker->url) }}" @else content="{{ url('/') }}"  @endif>
  <meta property="og:type" content="article">
  <meta property="og:image" @if(isset($proker['nama_kegiatan'])) content="{{ asset('storage/'.$proker->dokumentasi) }}?ar=16:9&amp;w=720&amp;auto=format,compress" @endif>
  <meta property="fb:app_id" content="{{ env('FACEBOOK_APP_ID') }}" >

  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/icons/favicon-32x32.png')}}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/icons/favicon-16x16.png')}}">

  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic' rel='stylesheet' type='text/css'>

  <link href="{{ asset('css/app-public.css') }}" rel="stylesheet">
  <link href="{{ asset('css/styesheet.css') }}" rel="stylesheet">
  <!-- Add the slick-theme.css if you want default styling -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css')}}" />
  <!-- Add the slick-theme.css if you want default styling -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.css')}}" />
  <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/themify-icons.css')}}" />

  <!-- <script src="https://connect.facebook.net/signals/config/524472591656390?v=2.9.18&amp;r=stable" async=""></script> -->
  <!-- <script src="https://berkahyatim-s3.imgix.net/cover/524472591656390" async=""></script> -->
  <!-- <script async="" src="https://connect.facebook.net/en_US/fbevents.js"></script> -->
  <!-- <script type="application/ld+json">{"@context":"https:\/\/schema.org","@type":"WebPage","name":"Over 9000 Thousand!","description":"For those who helped create the Genki Dama"}</script> -->

  <!-- Facebook Pixel Code -->
  <!-- <script>!function (f, b, e, v, n, t, s) { if (f.fbq) return; n = f.fbq = function () { n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments) }; if (!f._fbq) f._fbq = n; n.push = n; n.loaded = !0; n.version = '2.0'; n.queue = []; t = b.createElement(e); t.async = !0; t.src = v; s = b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t, s) }(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js'); fbq('set', 'autoConfig', false, '524472591656390'); fbq('init', '524472591656390');</script> -->
  <!-- <noscript><img height=1 width=1 style="display:none" src="https://www.facebook.com/tr?id=524472591656390&ev=PageView&noscript=1" /></noscript> -->
  <!-- End Facebook Pixel Code -->
  <!-- <script type="text/javascript">fbq('track', 'PageView');</script> -->
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <!-- <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-147157692-1"></script> -->
  <!-- <script>window.dataLayer = window.dataLayer || []; function gtag() { dataLayer.push(arguments); } gtag('js', new Date()); gtag('config', 'UA-147157692-1');</script> -->
  <!-- Global site tag (gtag.js) - Google Ads: 652903517 -->
  <!-- <script async="" src="https://www.googletagmanager.com/gtag/js?id=AW-652903517"></script> -->
  <!-- <script>window.dataLayer = window.dataLayer || []; function gtag() { dataLayer.push(arguments); } gtag('js', new Date()); gtag('config', 'AW-652903517');</script> -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MD3Q2GX');</script>
    <!-- End Google Tag Manager -->
  
</head>

<body class="explore-bd" data-gr-c-s-loaded="true">
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MD3Q2GX"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
  
  <div id="loading">
    <img id="loading-image" src="{{ asset('css/ajax-loader.gif')}}" alt="Loading..." />
  </div>
  <div class="backdrop hidden"></div>
  <header id="header" class="bg-blue-800 sticky top-0">
    <nav class="container w-container flex items-center justify-between flex-wrap px-4 mx-auto py-3">
      <div class="logo-header flex items-center flex-shrink-0 text-white md:mr-6">
        <a href="{{ urL('/') }}/?utm_source=logo-header">
          <img class="logo" src="{{ asset('dist/img/berkahyatim.png') }}" alt="Logo berkahyatim.com">
        </a>
      </div>
      <div class="md:pl-5 md:w-1/2 w-1/2 search">
        <div class="relative text-right"><button type="button" class="button-search px-3 py-2"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="none">
              <rect width="100%" height="100%"></rect>
              <g class="currentLayer">
                <path d="M13.533 12.467l-2.55-2.542A5.94 5.94 0 0012.25 6.25a6 6 0 10-6 6 5.94 5.94 0 003.675-1.268l2.542 2.55a.75.75 0 001.23-.244.751.751 0 00-.164-.82zM1.75 6.25a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0z" fill="#fff"></path>
              </g>
            </svg></button>
          <div class="relative search-responsive text-left">
            <div class="absolute top-0 left-0 ml-4 mt-3"><svg width="18" height="18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.533 14.467l-2.55-2.542A5.94 5.94 0 0014.25 8.25a6 6 0 10-6 6 5.94 5.94 0 003.675-1.268l2.542 2.55a.75.75 0 001.23-.244.751.751 0 00-.164-.82zM3.75 8.25a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0z" fill="#AAA"></path>
              </svg></div><input type="text" id="search-bar" placeholder="Cari berkahyatim hari ini" class="pl-10 w-full h-10 rounded pr-10 md:pr-4 focus:outline-none search-input-header" autocomplete="off"><button type="button" class="closeSearch outline-none md:hidden h-10 w-10 absolute top-0 right-0">x</button>
          </div>
          <div class="search-list-container bg-white border border-solid border-gray-400 shadow-md p-5 absolute left-0 w-full rounded mt-3 hidden text-left">
            <div id="SearchKey" style="display:none">
              <h3 class="text-xs text-gray-900 mb-4" id="titleSearch"></h3>
            </div>
            <div id="SearchHistory" style="display:none">
              <h3 class="text-xs text-gray-900 mb-4">Pencarian Terakhir</h3>
            </div>
            <div id="SearchPopuler">
              <h3 class="text-xs text-gray-900 mb-4">Pencarian Populer</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="menuToggle block lg:hidden"><button class="flex items-center px-3 py-2 border rounded text-orange-200 border-orange-200 hover:text-white hover:border-white" id="MenuToggle"><svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>Menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
          </svg></button>
      </div>
      <div class="w-full hidden lg:text-right lg:block flex-grow lg:flex lg:items-center lg:w-auto" id="MenuContent">

        <div class="lg:flex-grow md:mx-6">
          <!-- <a href="https://www.berkahyatim.com/" class="block mt-4 lg:inline-block lg:mt-0 text-orange-100 hover:text-white mr-4">Cari Amalan</a> -->
        </div>
        <div>
          @if(Auth::check())
          <a href="{{ url('donatur/home') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-blue-900 hover:bg-white mt-4 lg:mt-0">Dashboard</a>
          @else
          <div><a href="{{ route('login') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-blue-900 hover:bg-white mt-4 lg:mt-0">Masuk / Daftar</a></div>
          @endif
        </div>
      </div>
    </nav>
  </header>
  <main class="main-content">
    @yield('content')
  </main>

  <div class="bar_wpp">
    <a href="https://api.whatsapp.com/send?phone=6281284064281&amp;text=Assalaamualaikum%20admin%20...%0A%0A%0ASumber%20info%3A%20https://www.berkahyatim.com" title="Kirim Pesan" target="_blank">
      <div class="icon_wpp">
        <svg class="fill-current text-white h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path d="M260.062 32C138.605 32 40.134 129.701 40.134 250.232c0 41.23 11.532 79.79 31.559 112.687L32 480l121.764-38.682c31.508 17.285 67.745 27.146 106.298 27.146C381.535 468.464 480 370.749 480 250.232 480 129.701 381.535 32 260.062 32zm109.362 301.11c-5.174 12.827-28.574 24.533-38.899 25.072-10.314.547-10.608 7.994-66.84-16.434-56.225-24.434-90.052-83.844-92.719-87.67-2.669-3.812-21.78-31.047-20.749-58.455 1.038-27.413 16.047-40.346 21.404-45.725 5.351-5.387 11.486-6.352 15.232-6.413 4.428-.072 7.296-.132 10.573-.011 3.274.124 8.192-.685 12.45 10.639 4.256 11.323 14.443 39.153 15.746 41.989 1.302 2.839 2.108 6.126.102 9.771-2.012 3.653-3.042 5.935-5.961 9.083-2.935 3.148-6.174 7.042-8.792 9.449-2.92 2.665-5.97 5.572-2.9 11.269 3.068 5.693 13.653 24.356 29.779 39.736 20.725 19.771 38.598 26.329 44.098 29.317 5.515 3.004 8.806 2.67 12.226-.929 3.404-3.599 14.639-15.746 18.596-21.169 3.955-5.438 7.661-4.373 12.742-2.329 5.078 2.052 32.157 16.556 37.673 19.551 5.51 2.989 9.193 4.529 10.51 6.9 1.317 2.38.901 13.531-4.271 26.359z"></path>
        </svg>
      </div>
      <div class="txt_wpp"> Butuh bantuan?</div>
    </a>
  </div>

  @include('layouts.public-footer')

  <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/app-public.js') }}" type="text/javascript"></script>
  <script type="text/javascript" src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/slick.min.js') }}"></script>
  <script src="{{ asset('js/jquery-ui.min.js') }}"></script>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-178026555-1"></script>
  <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-178026555-1');
  </script>

  <script>
    let pagingState = true,
      loadState = true,
      type = '{{ $type->nama}}',
      nextProgramUrl = "{{ url('/api/load?page=2') }}&kategori="+type,
      $programList = $('#ProgramList'),
      $loader = $('.load-program');

    $(document).ready(function() {

      $('#loading').hide();
      $('.load-program').hide();

      $(document).on('click', '.loadmore-explore', function() {
        if (nextProgramUrl != null) {
          getMorePrograms();
        } else {
          $(this).attr("style", "display: none !important");
        }
      });

      // $('.swiper-wrapper').slick({
      //   dots: true,
      //   infinite: true,
      //   slidesToShow: 1,
      //   slidesToScroll: 1,
      //   autoplay: true,
      //   autoplaySpeed: 2000
      // });

    });
    $(window).on('resize', function() {
      $('.program-item-ex .p-card__thumb').height(($(".program-item-ex").width() / 2) + 15);
    }).resize();

    $(window).scroll(function() {
      let screen = $(this).scrollTop(),
        screenDoc = $(document).height(),
        screenWidth = $(window).width();
      if (screenWidth < 768 && screen >= (screenDoc - 1000) && pagingState) {
        pagingState = false;
        if (nextProgramUrl != null && loadState && $programList.length!=0) {
            getMorePrograms();
        } else {
          $loader.hide();
          pagingState = false;
          loadState = false;
          $('#loading').hide();
        }
      }
    });

    function getMorePrograms() {

      $.ajax({
          url: nextProgramUrl,
          beforeSend: function(xhr) {
            xhr.setRequestHeader('token', '{{csrf_token()}}');
            $loader.show();
            $('#loading').show();
          }
        })
        .done(function(data) {
          if (!data.status || data.data.length==0) {
            loadState = false;
            $loader.hide();
            pagingState = false;
            $('#loading').hide();
          } else {
            nextProgramUrl = data.next_page_url+"&kategori="+type;
            programs = data.data;
            $.each(programs, function(key, item) {
              let status = '';
              if (item.status == '2') {
                status = '<span>Status</span> Sudah berakhir'
              } else {
                status = `<span>Sisa hari</span><span class="text-sm text-black font-semibold block">${item.left_day}</span>`
              }
              var imageUrl = `{{ asset('storage/${item.dokumentasi}')}}`;
              var url = `{{ url('proker')}}/` + item.url;

              $programList.append(`<div class="w-full sm:w-1/2 md:w-1/3 p-2 program-app highlight">
                <div class="p-card program-item-ex hover:shadow-lg"><div class=p-card__head>
                <figure class=p-card__thumb><img class=preview src="${imageUrl}" alt="${item.nama_kegiatan}"></figure>
                </div><div class=p-card__body><h3 class="p-card__title font-semibold">${item.nama_kegiatan}</h3><div class="p-card__subtitle text-gray-800">
                  <div class="p-card__subtitle text-gray-800 p-card__count" style="margin-top: 15px">
                <div class="p-card__subtitle-wording p-card__countitem">
                  <span class="text-xs inline font-bold py-1 px-1 rounded">${ item.mitra.nama } 
                  <svg class="inline-block ml-1" width="13" height="13" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M6.5 0A6.507 6.507 0 000 6.5C0 10.084 2.916 13 6.5 13S13 10.084 13 6.5 10.084 0 6.5 0z" fill="#FE8057"></path>
                      <path d="M9.588 4.814l-3.596 3.48a.561.561 0 01-.39.156.561.561 0 01-.392-.157l-1.798-1.74a.522.522 0 010-.756.566.566 0 01.782 0l1.407 1.361 3.205-3.1a.566.566 0 01.782 0 .523.523 0 010 .756z" fill="#FAFAFA"></path>
                    </svg>
                  </span>
                </div>
                <div class="p-card__subtitle-wording p-card__countitem text-right"><span class="text-xs inline bg-blue-800 hover:bg-blue-500 text-white font-bold py-1 px-1 rounded">${ item.kategori.nama } 
                  </span>
                </div>
              </div>
                </div><div class="p-card__footer text-gray-800"><div class="p-card__bar bg-gray-200 w-full h-1 mb-2 rounded overflow-hidden">
                <div class="p-card__progress ${(item.status == '2') ? 'bg-red-700 ' : 'bg-blue-800 '}h-1 max-w-full" style="width: ${item.percent}%"></div></div>
                <div class=p-card__count><div class=p-card__countitem><div class=p-card__stats><span>Terkumpul</span>
                <span class="text-sm text-black font-semibold block">Rp ${new Intl.NumberFormat('id-ID').format((item.actual_earn ? item.actual_earn : 0))}</span></div></div>
                <div class="p-card__countitem text-right"><div class=p-card__stats> ${status}</div></div></div></div><a class=p-card__href href="${url}"></a></div></div>`)
              $('.program-item-ex .p-card__thumb').height(($(".program-item-ex").width() / 2) + 15);
            });
            $loader.hide();
            pagingState = true;
            loadState = true;
            $('#loading').hide();
          }
        });
    }
  </script>
  <script>
    function toggleSearch(state) {
      if (state == 'open') {
        $('.backdrop').removeClass('hidden').addClass('block');
        $('.search-list-container').removeClass('hidden').addClass('block');
      } else {
        $('.backdrop').addClass('hidden').removeClass('block');
        $('.search-list-container').addClass('hidden').removeClass('block');
      }
    }
    $(document).ready(function() {

      let HistorySearch = JSON.parse(localStorage.getItem('HistorySearch'));
      if (HistorySearch != null) {
        $("#SearchHistory").show()
        $.each(HistorySearch, function(key, item) {
          var imageUrl = `{{asset('storage/${item.dokumentasi}')}}`;
          var url = `{{ url('proker')}}/` + item.url;

          $("#SearchHistory").append(`<div class="search-item flex mb-3 cursor-pointer" onclick='location.href="${url}"'>
          <div class="w-1/4 rounded h-14"><img src="${imageUrl}?w=313&h=157" placeholder="${imageUrl}" class="rounded h-14"/></div><div class="pl-4 w-3/4">
          <h3 class="text-sm font-semibold">${item.nama_kegiatan}</h3>
          <!-- <div class="text-gray-500 text-xs">${item.mitra.nama}
          <svg class="inline-block ml-1" width=13 height=13 fill=none xmlns="http://www.w3.org/2000/svg"><path d="M6.5 0A6.507 6.507 0 000 6.5C0 10.084 2.916 13 6.5 13S13 10.084 13 6.5 10.084 0 6.5 0z" fill="#FE8057"/>
          <path d="M9.588 4.814l-3.596 3.48a.561.561 0 01-.39.156.561.561 0 01-.392-.157l-1.798-1.74a.522.522 0 010-.756.566.566 0 01.782 0l1.407 1.361 3.205-3.1a.566.566 0 01.782 0 .523.523 0 010 .756z" fill="#FAFAFA"/></svg>
           </div>-->
          </div></div></div>`)
        });
      }
      $(".button-search").on('click', function() {
        $(".search").removeClass("w-1/2").addClass("w-full")
        $(".menuToggle").addClass("hidden")
        $(".logo-header").addClass("hidden")
        $(".search-responsive").show()
        $(this).hide()
      })
      $(".closeSearch").on('click', function() {
        $(".search").addClass("w-1/2").removeClass("w-full")
        $(".menuToggle").removeClass("hidden")
        $(".logo-header").removeClass("hidden")
        $(".search-responsive").hide()
        $(".button-search").show()
        $("#search-bar").val('')
      })

      $("#search-bar").autocomplete({
        source: function(request, response) {

          var $this = $(this);
          var search = request.term;

          $("#titleSearch").html("Pencarian dengan kata kunci <b>" + search + "</b>")
          $("#SearchKey").show();
          if (search.length > 1) {
            var urlSearch = "{{ url('/api/search')}}?search=" + search;
            $('#loading').show();

            $.ajax({
              url: urlSearch,
              beforeSend: function(xhr) {
                xhr.setRequestHeader('token', '{{csrf_token()}}');
                $loader.show();
                $('#loading').show();
              }
            }).done(function(data) {
              let $SearchKey = $("#SearchKey"),
                programsSearch = data.search_results;
              $SearchKey.find('.search-item').remove()
              if (programsSearch.length > 0) {
                $(".notfound").remove();
                localStorage.removeItem('HistorySearch')
                localStorage.setItem('HistorySearch', JSON.stringify(programsSearch))
                $.each(programsSearch, function(key, item) {
                  var imageUrl = `{{asset('storage/${item.dokumentasi}')}}`;
                  var url = `{{ url('proker')}}/` + item.url;

                  $SearchKey.append(`<div class="search-item flex mb-3 cursor-pointer" onclick='location.href="${url}"'>
                  <div class="w-1/4 rounded h-14"><img src="${imageUrl}?w=313&h=157" placeholder="${item.image_url}" class="rounded h-14"/></div>
                  <div class="pl-4 w-3/4"><h3 class="text-sm font-semibold">${item.nama_kegiatan}</h3>
                  <!--<div class="text-gray-500 text-xs">${item.mitra.nama}
                  <svg class="inline-block ml-1" width=13 height=13 fill=none xmlns="http://www.w3.org/2000/svg">
                  <path d="M6.5 0A6.507 6.507 0 000 6.5C0 10.084 2.916 13 6.5 13S13 10.084 13 6.5 10.084 0 6.5 0z" fill="#FE8057"/>
                  <path d="M9.588 4.814l-3.596 3.48a.561.561 0 01-.39.156.561.561 0 01-.392-.157l-1.798-1.74a.522.522 0 010-.756.566.566 0 01.782 0l1.407 1.361 3.205-3.1a.566.566 0 01.782 0 .523.523 0 010 .756z" fill="#FAFAFA"/>
                   </svg></div>-->
                  </div></div></div>`)
                });
              } else {
                $SearchKey.html('<p class="text-center text-xs text-black notfound mb-6">Program Kebaikan yang anda cari tidak ditemukan</p>');
              }
              $loader.hide();
              $('#loading').hide();
            }).fail(function(jqXHR, textStatus, error) {
              $SearchKey.html('<p class="text-center text-xs text-black notfound mb-6">Program Kebaikan yang anda cari tidak ditemukan</p>');
            });
          }

        },
        response: function(event, ui) {
          // Make your preferred selection here
          //var item = ui.content[0].label;

          //$(this).val(item).trigger('change');
        }
      });
      /*
      $('#search-bar').on('keypress', function(e) {
        if (e.which == 13) {
          e.preventDefault();
          var search = $(this).val();
          $("#titleSearch").html("Pencarian dengan kata kunci <b>" + search + "</b>")
          $("#SearchKey").show();
          if (search.length > 1) {
            var urlSearch = "{{ url('/api/search')}}?search=" + search;
            $.ajax({
              url : urlSearch
            }).done(function(data) {
              let $SearchKey = $("#SearchKey"),
                programsSearch = data.search_results;
              $SearchKey.find('.search-item').remove()
              if (programsSearch.length > 0) {
                $(".notfound").remove();
                localStorage.removeItem('HistorySearch')
                localStorage.setItem('HistorySearch', JSON.stringify(programsSearch))
                $.each(programsSearch, function(key, item) {
                  var imageUrl = `{{asset('storage/${item.dokumentasi}')}}`;
                  $SearchKey.append(`<div class="search-item flex mb-3 cursor-pointer" onclick='location.href="/${item.nama_kegiatan}"'>
                  <div class="w-1/4 rounded h-14"><img src="${imageUrl}?w=313&h=157" placeholder="${item.image_url}" class="rounded h-14"/></div>
                  <div class="pl-4 w-3/4"><h3 class="text-sm font-semibold">${item.nama_kegiatan}</h3><div class="text-gray-500 text-xs">${item.mitra.nama}
                  <svg class="inline-block ml-1" width=13 height=13 fill=none xmlns="http://www.w3.org/2000/svg">
                  <path d="M6.5 0A6.507 6.507 0 000 6.5C0 10.084 2.916 13 6.5 13S13 10.084 13 6.5 10.084 0 6.5 0z" fill="#FE8057"/>
                  <path d="M9.588 4.814l-3.596 3.48a.561.561 0 01-.39.156.561.561 0 01-.392-.157l-1.798-1.74a.522.522 0 010-.756.566.566 0 01.782 0l1.407 1.361 3.205-3.1a.566.566 0 01.782 0 .523.523 0 010 .756z" fill="#FAFAFA"/>
                  </svg></div></div></div></div>`)
                });
              } else {
                $SearchKey.html('<p class="text-center text-xs text-black notfound mb-6">Program Kebaikan yang anda cari tidak ditemukan</p>');
              }
            }).fail(function(jqXHR, textStatus, error) {
              $SearchKey.html('<p class="text-center text-xs text-black notfound mb-6">Program Kebaikan yang anda cari tidak ditemukan</p>');
            });
          }
        }
      });
      */

      $(document).on('focus', '.search-input-header', function(e) {
        toggleSearch('open');
        $('html, body').animate({
          scrollTop: $('#header').offset().top - 20
        }, 'slow');
      });
      $(document).on('click', '.backdrop, .closeSearch', function(e) {
        toggleSearch('closed');
      });
    })
  </script>

  @yield('script')

</body>

</html>