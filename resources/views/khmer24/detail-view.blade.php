@extends('khmer24.layouts.master')
@section('title')
    365daymarket.com
@stop
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="latest-ads detail_page_wrap">
                    <div class="pang_kisi col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul>
                        	<li><a href="">Home</a></li>
                            <li><a href="">> Category</a></li>
                            <li><a href="">> Sub category</a></li>
                        	<li><a href="">> type</a></li>
                        </ul>
                    </div>
                    <div class="product-list">
                    	<div class="col-xs-12 col-sm-9 col-mg-9 col-lg-9">
	                        <div class="article_detail col-xs-12 col-sm-12 col-mg-12 col-lg-12">
                                @php
                                    $postImg=json_decode($post->images);
                                @endphp
                                <div class="carousel slide article-slide" id="article-photo-carousel">
                                    <div class="carousel-inner cont-slider">
                                    @foreach ($postImg as $imgthum)
                                        <div class="img-slider item">
                                          <img alt="" title="" src="{{ $imgthum }}">
                                        </div>
                                    @endforeach
                                    </div>
                                      <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        @php $i=0; @endphp
                                        @foreach ($postImg as $imgthum)
                                        <li class="thum-list" data-slide-to="{{$i++}}" data-target="#article-photo-carousel">
                                          <img alt="" src="{{ $imgthum }}">
                                        </li>
                                        @endforeach
                                    </ol>
                                </div>
                                <div class="dis_article">
                                    <div class="discription_header">
                                        <div class="clear_padding col-xs-12 col-sm-10 col-mg-10 col-lg-10">
                                            <h2>{{ $post->name }}</h2>
                                            <p class="price_wrap"><span class="price_style"> </span> 
                                            <span class="price">{{ $post->price }}</span></p>
                                            <div class="post-date">
                                                <p>Posted On : <span class="detail-date"> {{date('d-M-Y', strtotime($post->created_at))}} </span>  Views : <span>{{ $post->views }}</span> </p>
                                            </div>
                                        </div>
                                        <div class="padding_right col-xs-12 col-sm-2 col-mg-2 col-lg-2">
                                            <p><i class="icon icon-share text_gray"></i></p>
                                        </div>
                                    </div>
                                    <div class="discription_header">
                                        <h3>Description</h3>
                                        <p>{{ $post->description }}</p>
                                    </div>
                                </div>
	                        </div>
	                    </div>
	                    <div class="right_sidebar padding_left col-xs-12 col-sm-3 col-mg-3 col-lg-3">
                            <div class="store_title">
                                <div class="cover-store clear_padding col-xs-12 col-sm-4 col-mg-4 col-lg-4">
        	                    	<img src="{{ asset('uploads/1024x1024.jpg') }}" alt="" class="img-responsive">
                                </div>
                                <div class="title col-xs-12 col-sm-8 col-mg-8 col-lg-8">
                                    <h3>Store Name HD</h3>
                                    <p>wwwwwwwwwwwwwwwwwwwwww wwwww</p>
                                </div>
                            </div>
                            <div class="store_description">
                                <p><i class="glyphicon glyphicon-phone-alt"></i> 098 777 888 / 090 888 888</p>
                                <p><i class="glyphicon glyphicon-map-marker"></i> Phnom Penh , Beng Kang KongII, Street 310, #419C</p>
                                <p><i class="glyphicon glyphicon-globe"></i> <a href="{{ route('store.market') }}" title="">{{ str_limit("https://www.khmer168.com/LyvannPhoneShop", 30,'...') }}</a></p>
                            </div>
	                    </div>

                    <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.carousel').carousel({
          interval: false
        });
        $(document).ready(function(){
            $('.img-slider:first-child').addClass('active');
            $('.thum-list:first-child').addClass('active');
        });
    </script>
@stop