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

  <link href='https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap' rel='stylesheet' type='text/css'>

  @section('styles')
  <link rel="stylesheet" href="{{ asset('css/styesheet.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/slick-theme.css')}}" />
  <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/themify-icons.css')}}" />
  <link href="{{ asset('dist/css/normalize.css') }}" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  @show

  <!-- Facebook Pixel Code -->
  <!-- <script>!function (f, b, e, v, n, t, s) { if (f.fbq) return; n = f.fbq = function () { n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments) }; if (!f._fbq) f._fbq = n; n.push = n; n.loaded = !0; n.version = '2.0'; n.queue = []; t = b.createElement(e); t.async = !0; t.src = v; s = b.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t, s) }(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js'); fbq('set', 'autoConfig', false, '524472591656390'); fbq('init', '524472591656390');</script> -->
  <!-- <noscript><img height=1 width=1 style="display:none" src="https://www.facebook.com/tr?id=524472591656390&ev=PageView&noscript=1" /></noscript> -->
  <!-- End Facebook Pixel Code -->
  <!-- <script type="text/javascript">fbq('track', 'PageView');</script> -->
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-MD3Q2GX');</script>
  <!-- End Google Tag Manager -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-178026555-1"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
  <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'UA-178026555-1');</script>
</head>

<body class="explore-bd" data-gr-c-s-loaded="true">
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MD3Q2GX"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  
  <!-- End Google Tag Manager (noscript) -->
  
  <div id="loading">
    <div class="lds-ellipsis">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>

  <div class="by-overlay"></div>

  <div class="by-toaster text--subtitle"></div>

  @yield('navbar')

  <main class="by by-container">
    @yield('content')
  </main>

  @yield('fab-wa')

  @yield('bottom-nav')
  
  @if(Request::path() == 'donasi-summary-zakat')
    <div class="by-modal by-container">
      @yield('modal')
    </div>
  @endif

  @if(Request::path() == 'donasi-pembayaran-zakat')
    <div class="by-modal by-container">
      @yield('modal')
    </div>
  @endif

  <div class="by-bottomsheet by-container">
    @yield('bottomsheet')
  </div>

  @section('scripts')
  <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/app-public.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/slick.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery-ui.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
  @show

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-178026555-1"></script>
  <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-178026555-1');
  </script>
  @yield('script')

</body>

</html>