<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Berkah Yatim - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/themify-icons.css')}}" />
    <link  rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MD3Q2GX');</script>
    <!-- End Google Tag Manager -->
    
  
</head>
<body>
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MD3Q2GX"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->      
    <div class="main">
        <nav class="navbar" style="background: #4267b2;">
            <div class="container">
                <div class="navbar-header">
                    <div class="logo-header text-center">
                        <a href="{{ url('') }}">
                            <img class="logo" src="{{asset('dist/img/berkahyatim.png')}}" alt="Logo berkahyatim.com">
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-178026555-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-178026555-1');
    </script>
</body>
</html>
