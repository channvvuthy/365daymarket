<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>365daymarket</title>
    <link rel="stylesheet" href="{{asset('vues/css/bootstrap/dist/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('vues\fontawesome\css\all.css')}}">
    <link rel="stylesheet" href="{{asset('vues\css\style.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


</head>
<style>
    @font-face {
        font-family: reqular;
        src: url("{{asset('fonts/opensans-regular.ttf')}}");
    }

    @font-face {
        font-family: bold;
        src: url("{{asset('fonts/opensans-bold.ttf')}}");
    }
</style>
<body>
<div id="app">
    <div class="header bg-primary">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="logo" style="margin-top: 29px;">
                        <a href="">
                            365daymarket.com
                        </a>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col col-9">
                    <div class="store-name">
                        <h2 style="text-transform: capitalize;color: #007bff;">{{$name}}</h2>
                    </div>
                </div>
                <div class="col-3">
                    <div class="store-name clear-store">
                        <div class="contact">
                            <h3>Contact</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-9">
                    <h3 class="title-all-product">All Product</h3>
                </div>
            </div>
        </div>
    </div>
{{--End of header section--}}
@include('vue/footer')