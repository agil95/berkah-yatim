<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Berkah Yatim - tentang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('zakat/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('zakat/css/bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{asset('zakat/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('zakat/css/themify-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('zakat/css/owl.carousel.min.css')}}" />
    
</head>
<body>
    <div class="container-fluid main">
        <nav class="navbar navbar-dark">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{route('donatur.index')}}">Berkah Yatim</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pemberdayaan <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('beasiswa.index')}}">Beasiswa</a></li>
                                <li><a href="{{route('usaha-kecil-menengah.index')}}">Usaha Kecil Menengah</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('kegiatan-infak.index')}}">Penyaluran Infak Sedekah</a></li>
                        
                        <li><a href="{{route('donatur-about')}}">About</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('donatur.dashboard')}}">Dashboard</a></li>
                                <li>
                  <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <section class="style">
        <div class="about" style="padding-top:70px;">
            <div class="jumbotron text-center">
                <h1>Apa itu Berkah Yatim?</h1>
                <p class="container">Berkah Yatim adalah Lembaga Sosial dan keummatan yang berkhidmat dan berfokus pada upaya membantu,
                    mencerahkan dan memberdayakan ummat terutama kaum dhuafa dan anak-anak yatim untuk menjadi ummat yang madani.</p>
            </div>
        </div>
        <div class="main-head">
            <div class="col-md-10 col-md-offset-1 info-panel">
                <h4 class="main-header">Visi dan Misi Berkah Yatim</h4>
            </div>
            <div class="col-md-8 col-md-offset-2 panel-text">
                <h5>Visi :</h5>
                <p>Menjadi lembaga yang selalu eksis membantu, mencerahkan dan memberdayakan anak-anak tatim dhuafa.</p>
                <h5>Misi :</h5>
                <p>1. Mengajak masyarakat untuk bersama-sama peduli kepada anak-anak yatim dan kaum dhuafa.</p>
                <p>2. Mengupayakan dana dan penyaluran untuk kesejahteraan anak-anak yatim dan dhuafa.</p>
                <p>3. Mengajak instansi, perusahaan, corporate yang memiliki nilai yang sama untuk bermitra.</p>
                <p>4. Merealisasikan terbentuknya dan sarana yang berdayaguna.</p>
            </div>
        </div>
        <div class="main-head">
            <div class="col-md-10 col-md-offset-1 info-panel-2">
                <h4 class="main-header">Struktur Berkah Yatim</h4>
            </div>
            <div class="pengurus">
                <div class="col-md-3 col-md-offset-2">
                    <h5>Pembina :</h5>
                    <p>Dr. KH Hasan Basri Rahman, MA</p>
                    <p>Drs. Abdul Ganing Dg Ngompo</p>
                    <p>Ust. Askar Al Makassari</p>
                </div>
                <div class="col-md-3">
                    <h5>Pengurus Dan Pengawas :</h5>
                    <p>KETUA : Syarifuddin Liwang, Spdi.,SS</p>
                    <p>SEKRETARIS : M Basri, Spdi</p>
                    <p>BENDAHARA : Musriati, Sp.d</p>
                    <p>PENGAWAS : Asmawati, SE</p>
                </div>
                <div class="col-md-3">
                    <h5>Direksi :</h5>
                    <p>Pimpinan Umum : Syarifuddin Liwang</p>
                    <p>Koordinator Fundraising : Asmawati,SE</p>
                    <p>Pimried Majalah : Juhaenah, Sp.d</p>
                    <p>Humas : Ir Nur Ichsan Ahmadayah</p>
                </div>
            </div>
        </div>
    </section>
    <section class="section" style="padding-bottom:50px; padding-top:20px;">
        <div class="container">
            <div class="text-center">
                <div class="col-md-12">
                    <p class="footer-txt">Temukan kami di :
                        <span class="social-icons">
                            <a href=https://www.instagram.com/sririnardiputra_srp/><span class="ti-instagram"></span></a>
                <a href="https://www.facebook.com/Berkah-YATIM-867929073332931/"><span class="ti-facebook"></span></a>
                        </span>
                    </p>
                    <p class="lock-1">
                        <span class="ti-location-pin mr-3"></span> Jln. Lorem Ipsum 12 No 12 <br> Indonesia
                    </p>
                    <div>
                        <p class="lock-2">
                        <span class="ti-email mr-3"></span> brkah.yatim@gmail.com
                        </p>
                    </div>
                    <div>
                        <p class="lock-3">
                        <span class="ti-headphone-alt mr-3"></span> 081284064281
                        </p>
                    </div>
                </div>
            </div>
    </section>
    <script src="{{asset('zakat/js/datatable.rowrecorder.min.js')}}"></script>
    <script src="{{asset('zakat/js/table.responsive.min.js')}}"></script>
    <script src="{{asset('zakat/js/jquery.min.js')}}"></script>
    <script src="{{asset('zakat/js/jquery.datatables.js')}}"></script>
    <script src="{{asset('zakat/js/bootstrap.js')}}"></script>
    <script src="{{asset('zakat/js/jquery.mask.min.js')}}"></script>

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