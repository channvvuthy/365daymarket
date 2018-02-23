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
    <title>@yield('title')</title>
    <style>
        @font-face {
            font-family: myFirstFont;
            src: url("{{asset('fonts/Pasajero.otf')}}");
        }

    </style>
</head>
<body>
@include('khmer24.inc.header-top')
@include('khmer24.inc.header-middle')
@include('khmer24.inc.nav')
@yield('content')
@include('khmer24.inc.footer-top')
@include('khmer24.inc.footer-middle')
@include('khmer24.inc.footer-botton')

</body>
</html>