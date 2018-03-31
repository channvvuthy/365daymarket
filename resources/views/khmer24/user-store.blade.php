<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/emoji.css')}}">
    <link rel="stylesheet" href="{{asset('css/icon.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.matchHeight.js')}}"></script>
    <script type="text/javascript" async>
      $(function() {
        $('.height-items').matchHeight();
      });
    </script>
    <title>365daymarket.com</title>
    <style>
        @font-face {
            font-family: myFirstFont;
            src: url("{{asset('fonts/Pasajero.otf')}}");
        }

    </style>
</head>
<body>
<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <h1 class="margin">365daymarket</h1>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <div class="menus pull-right">

                </div>
            </div>
        </div>
    </div>
</div>

@include('khmer24.inc.footer-top')
@include('khmer24.inc.footer-middle')
@include('khmer24.inc.footer-botton')
@include('khmer24.inc.form-register')

</body>
</html>