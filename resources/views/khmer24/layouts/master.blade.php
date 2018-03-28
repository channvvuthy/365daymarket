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
@include('khmer24.inc.form-register')
<script type="text/javascript" charset="utf-8" async defer>
    $(document).on('click','.button_nav',function(){
        $('.nav_cate_left').removeClass('hidden');
        $('.nav_cate_sub').removeClass('hidden');
        $('.nav_cate_welcome').addClass('hidden');
        $('.button_nav').addClass('button_nav_h');
        $('.button_nav').removeClass('button_nav');

        $(document).ready(function () {
        var nav=$(".navInner");
        var navHeight =nav.height() - 20;
        $(".sub-menu").css({"min-height":navHeight+"px"});
    })
    })
    $(document).on('click','.button_nav_h',function(){
        $('.nav_cate_left').addClass('hidden');
        $('.nav_cate_sub').addClass('hidden');
        $('.button_nav_h').addClass('button_nav');
        $('.nav_cate_welcome').removeClass('hidden');
        $('.button_nav_h').removeClass('button_nav_h');
    });
    $(document).on('click','ul.all_category li',function(){
        $('ul.all_category li').removeClass('active');
        $(this).addClass('active');
    });
    $(document).on('click','.select_subcat',function(){
        var catid=$(this).attr('data-id');
        var subcatname=$(this).attr('data-name');
        var catname=$(this).attr('data-cat');
        // 
        jQuery.ajax({
            url: "{{route('brand.category')}}",
            type: "GET",
            data: {catid:catid,subcatname:subcatname},
            success: function (data) {
                console.log(data);
                $(".brandlist").html(data);
            }
        });
        // 
        $('.bt_category').html('<p>'+catname+' => '+subcatname+' <span>Change</span>'+'</p>')
        $('.catid').val(catid);
        $('.catname').val(catname);
        $('.subcatname').val(subcatname);
        $('.choosCate_post').addClass('hidden');
        $('.post-form ').removeClass('hidden');
        $('ul li.select_cate').removeClass('active');
        $('ul li.description_post').addClass('active');
        // 
    });
    $(document).on('click','.bt_category',function(){
        $('.choosCate_post').removeClass('hidden');
        $('.post-form ').addClass('hidden');
        $('ul li.select_cate').addClass('active');
        $('ul li.description_post').removeClass('active');
    });
    $('.btn-category').change(function(){
        $('.btn-category').removeClass('catfirst');
    });
    $('.btn-location').change('click','.locaval',function(){
        $('.btn-location').removeClass('catfirst');
    });
</script>
</body>
</html>