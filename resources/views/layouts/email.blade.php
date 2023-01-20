<html>

<head>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
  <style type="text/css">
    body {
      background-color: #f8f8f8;
      margin: 0 auto;
      padding: 0;
      font-family: 'Open Sans', sans-serif;
      font-size: 14px;
      font-style: normal;
      color: #4a4a4a;
    }
    
    h1 {
      font-size: 16px;
      line-height: 20px;
    }
    
    h2 {
      font-size: 14px;
      line-height: 18px;
    }
    
    h3 {
      font-size: 12px;
      line-height: 14px;
    }
    
    p {
      font-size: 13px;
      line-height: 16px;
    }
    
    a,
    a:hover {
      color: #FC5000
    }
    
    .center {
      text-align: center
    }
    
    .unsubscribe {
      color: #989898;
      line-height: 18px;
    }
    
    .unsubscribe a {
      color: #FC5000
    }
    
    .body-email {
      padding: 0px;
    }
    
    .header {
      margin-bottom: 50px;
      padding-top: 20px;
      padding-bottom: 20px;
      background-color: #FC5000;
    }
    
    .container {
      width: 570px;
      min-width: 500px;
      margin-right: auto;
      margin-left: auto;
      padding-right: 30px;
      padding-left: 30px;
    }
    
    .container.body-email {
      padding-top: 20px;
      padding-bottom: 40px;
      background-color: #fff;
    }
    
    .logo {
      max-height: 35px;
      margin-bottom: 20px;
    }
    
    .logo.top {
      margin-bottom: 0px;
    }
    
    .body {
      padding-bottom: 100px;
      background-color: #f8f8f8;
      font-family: 'Open Sans', sans-serif;
      color: #4a4a4a;
    }
    
    .heading {
      margin-top: 10px;
      margin-bottom: 20px;
      font-size: 24px;
      font-weight: 600;
    }
    
    .bold-text {
      color: #3a3a3a;
      font-size: 21px;
      font-weight: 600;
    }
    
    .paragraph {
      margin-top: 10px;
    }
    
    .auth-box {
      width: 180px;
      margin: 30px auto;
      padding: 15px 10px;
      border-style: solid;
      border-width: 1px;
      border-color: #e8e8e8;
      border-radius: 4px;
    }
    
    .text-block {
      color: #FC5000;
      font-size: 27px;
      font-weight: 600;
      text-align: center;
      letter-spacing: 5px;
    }
    
    .divider {
      margin-top: 30px;
      margin-bottom: 30px;
      border-top: 1px dashed #e8e8e8;
    }
    
    .footer {
      width: 570px;
      margin-right: auto;
      margin-left: auto;
      margin-bottom: 50px;
      padding: 20px 30px 30px;
      background-color: #FC5000;
    }
    
    .footer-wrapper {
      display: -webkit-box;
      display: -webkit-flex;
      display: -ms-flexbox;
      display: flex;
      -webkit-box-orient: horizontal;
      -webkit-box-direction: normal;
      -webkit-flex-direction: row;
      -ms-flex-direction: row;
      flex-direction: row;
      -webkit-justify-content: space-around;
      -ms-flex-pack: distribute;
      justify-content: space-around;
      -webkit-flex-wrap: wrap;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      -webkit-box-align: start;
      -webkit-align-items: flex-start;
      -ms-flex-align: start;
      align-items: flex-start;
    }
    
    .footer-download {
      display: block;
      width: 50%;
      -webkit-box-flex: 0;
      -webkit-flex: 0 auto;
      -ms-flex: 0 auto;
      flex: 0 auto;
    }
    
    .footer-contact {
      width: 50%;
    }
    
    .text-block-2 {
      margin-bottom: 10px;
      color: #fff;
      font-size: 18px;
      font-weight: 600;
    }
    
    .text-block-3 {
      color: #fff;
      font-size: 12px;
    }
    
    .text-block-4 {
      margin-bottom: 10px;
      color: #fff;
      font-size: 12px;
    }
    
    .button-playstore {
      margin-right: 10px;
    }
  </style>
</head>

<body class="body" style="background-color: #f8f8f8;margin: 0 auto;padding: 0;font-family: 'Open Sans', sans-serif;font-size: 16px;line-height: 1.5;font-style: normal;color: #4d4d4d;padding-bottom: 100px;">
  <div class="header" style="margin-bottom: 50px;padding-top: 20px;padding-bottom: 20px;background-color: #FC5000;">
    <div class="container" style="width: 570px;min-width: 500px;margin-right: auto;margin-left: auto;padding-right: 30px;padding-left: 30px;">
      <a href="{{ url('/') }}" target="_blank" class="logo top w-inline-block" style="max-height: 35px;margin-bottom: 0px;">
        <img src="{{ asset('dist/img/img-logo-berkahyatim-white.png') }}" alt="{{ env('APP_NAME') }}" height="23" class="logo top" style="max-height: 35px;margin-bottom: 0px;">
      </a>
    </div>
  </div>
  <div class="container body-email" style="padding: 0px;width: 570px;min-width: 500px;margin-right: auto;margin-left: auto;padding-right: 30px;padding-left: 30px;padding-top: 20px;padding-bottom: 40px;background-color: #fff;">
    @yield('content')
    <p class="paragraph" style="font-size: 14px;line-height: 21px;margin-top: 10px;">
      Terima kasih,<br>
      {{ env('APP_NAME') }}
    </p>
  </div>
  <table align="center" border="0" cellpadding="0" cellspacing="0" class="footer_outer 100" style="margin:20px auto;width:740px">
    <tbody>
      <tr>
        <td>
          <table width="600" align="center" border="0" cellpadding="0" cellspacing="0" class="footer-two 100">
            <tbody>
              <tr>
                <td>
                  <table class="legal 100">
                    <tbody>
                      <tr>
                        <td class="mso_legal">
                          <p style="margin-bottom: 20px; text-align: center;color: #888888;line-height: 17px;">Anda mendapat email ini karena telah mendaftarkan diri atau berdonasi di salah satu pengggalangan dana <a href="{{ url('/') }}">berkahyatim.com</a> - website untuk berdonasi dan menggalang dana secara online.
                          </p>
                          <div style="text-align: center;font-size: 12px;color: #555555;text-decoration: none;">
                            <a href="{{ url('categories/Donasi') }}" target="_blank" style="text-decoration: none;color: #555555;">Donasi</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                            <a href="{{ url('categories/Semua') }}" target="_blank" style="text-decoration: none;color: #555555;">Galang Dana</a>
                            {{-- <a href="#" target="_blank" style="text-decoration: none;color: #555555;">Topup Dompet Kebaikan</a>&nbsp;&nbsp;|&nbsp;&nbsp; --}}
                            {{-- <a href="#" target="_blank" style="text-decoration: none;color: #555555;">Unsubscribe Update</a> --}}
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</body>

</html>