<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    body{padding:2rem 4rem;font-family:sans-serif;line-height:1.6rem;background:#eee}
    .email{background:#fff;margin-bottom:1rem;box-shadow:0 0 25px rgba(0,0,0,.2)}
    .header{background:#333;color:#fff;padding:.7rem;font-size:2rem}
    .header>img{height:50px}
    .main{padding:1rem 2rem}
    .bottom{padding:1rem 2rem;border-top:1px solid #eee;color:#666;font-weight:lighter;font-size:0.9rem;}
    .footer{padding-right:1rem;padding-left:1rem;font-weight:lighter;color:#999}
    .btn{font-family:Avenir,Helvetica,sans-serif;box-sizing:border-box;border-radius:3px;color:#fff;display:inline-block;text-decoration:none;background-color:#3097d1;border-top:10px solid #3097d1;border-right:18px solid #3097d1;border-bottom:10px solid #3097d1;border-left:18px solid #3097d1}
    </style>
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
</head>
<body>
  <div class="email">
    <div class="main">
      @yield('content')
      Hormat Kami,<br><br>Berkah Yatim
    </div>
    {{-- <div class="bottom">
      <table>
        <tr>
          <td width="100px">Kantor Pusat</td>
          <td>Yayasan Berkah Yatim 88@Kasablanka 18th Floor Tower A <br>Jl. Raya Kasablanka Kav.88 Tebet Jakarta Selatan 12870</td>
        </tr>
        <tr>
          <td>Phone</td>
          <td>021-29607612</td>
        </tr>
        <tr>
          <td>Fax</td>
          <td>021-29607501</td>
        </tr>
      </table>
    </div>
  </div> --}}
  <div class="footer">
    {{ date('Y') }} &copy; Berkah Yatim.  All Right Reserved.
  </div>
</body>
</html>