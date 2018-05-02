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
                        <ul class="pangkisi-list">
                            <li><a href="{{ asset('') }}" title=""><i class="glyphicon glyphicon-home"></i> Home</a></li>
                            <li><span class="menu-list">》</span> <a href="{{ route('search.result') }}?_token={{ bcrypt('1') }}&category=&location=&p=&search_param=all&keycod={{ bcrypt('1') }}" title="">All Categories</a></li>
                            <li><span class="menu-list">》</span> <a href="{{ route('search.result') }}?_token={{ bcrypt('1') }}&cats={{ str_replace('&','||',$post->category_name) }}" title="">{{$post->category_name}}</a></li>
                            <li><span class="menu-list">》</span> <a href="{{ route('search.result') }}?_token={{ bcrypt('1') }}&category={{ str_replace('&','||',$post->sub_category_name) }}" title=""><span>{{$post->sub_category_name}}</a></li>
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
                                            <p><a href="https://www.facebook.com/sharer/sharer.php?u={{ route('view.ads') }}?id={{ $post->id }}" title="" target="_blank"><i class="icon icon-share text_gray"></i></a></p>
                                        </div>
                                    </div>
                                    <div class="discription_header">
                                        <h3>Description</h3>
                                        <p>{{ $post->description }}</p>
                                    </div>
                                    {{--  --}}
                                </div>
                                <div class="more-adsstores">
                                    @php
                                      $userstore=App\Store::where('user_id',$post->user_id)->first();
                                      $getuser=App\User::where('id',$post->user_id)->first();
                                    @endphp
                                    <div class="more-adsheader">
                                        @if (!empty($getuser->image))
                                        <img src="{{ $getuser->image }}" alt="" class="img-responsive">
                                        @else
                                        <img src="{{ asset('uploads/1024x1024.jpg') }}" alt="" class="img-responsive">
                                        @endif
                                        <h2><a href="{{ route('stores',['id'=>$getuser->user_id,'name'=>$getuser->name]) }}" title="">{{ $getuser->name }}</a></h2>
                                        <p><a href="{{ route('stores',['id'=>$post->user_id,'name'=>$getuser->name]) }}" title="{{ $getuser->image }}-Shop">{{ route('stores',['id'=>$post->user_id,'name'=>$getuser->name]) }}</a></p>
                                        <div class="gotostore">
                                            <a href="{{ route('stores',['id'=>$post->user_id,'name'=>$getuser->name]) }}" title="{{ $getuser->image }}-Shop"><i class="glyphicon glyphicon-shopping-cart"></i> Go to shop</a>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    @php
                                        $postmore=App\Post::where('user_id',$post->user_id)->where('status','Published')->orderBy('updated_at','desc')->limit(6)->get();
                                    @endphp
                                    @foreach ($postmore as $getAds)
                                    <div class="col-xs-12 col-sm-4 col-mg-4 col-lg-4 mor-body">
                                        <div class="item-moreads">
                                            @php
                                                $imgItem=json_decode($getAds->images,true);
                                            @endphp
                                            <div class="moreImg">
                                                <a href="{{ route('view.ads') }}?key={{ bcrypt($adsItems->name) }}&id={{ $adsItems->id }}" title="">
                                                <img src="{{ $imgItem[0] }}" alt="">
                                                </a>
                                            </div>
                                            <div class="morep">
                                                <a href="{{ route('view.ads') }}?key={{ bcrypt($adsItems->name) }}&id={{ $adsItems->id }}" title="">
                                                <h2>{{ $getAds->name }}</h2>
                                                </a>
                                                <P>{{ $getAds->price }}</P>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                {{--  --}}
                            </div>
                        </div>
                        <div class="right_sidebar padding_left col-xs-12 col-sm-3 col-mg-3 col-lg-3">
                            <div class="store_title">
                                <div class="cover-store clear_padding col-xs-12 col-sm-4 col-mg-4 col-lg-4">
                                    @if (!empty($getuser->image))
                                    <img src="{{ $getuser->image }}" alt="" class="img-responsive">
                                    @else
                                    <img src="{{ asset('uploads/1024x1024.jpg') }}" alt="" class="img-responsive">
                                    @endif
                                </div>
                                <div class="title col-xs-12 col-sm-8 col-mg-8 col-lg-8 item-stores-cover">
                                    <h3>{{ $userstore->name }}</h3>
                                    <p><a href="{{ route('stores',['id'=>$post->user_id,'name'=>$userstore->name]) }}" title="">Show all products</a></p>
                                </div>
                            </div>
                            <div class="store_description">
                                <p><i class="glyphicon glyphicon-phone-alt"></i> {{ $userstore->phone }}</p>
                                <p><i class="glyphicon glyphicon-map-marker"></i> {{ $userstore->address }}</p>
                                <p><i class="glyphicon glyphicon-globe"></i> <a href="{{ route('stores',['id'=>$post->user_id,'name'=>$userstore->name]) }}" title="">{{ str_limit(route('stores',['id'=>$post->user_id,'name'=>$userstore->name]),40) }}</a></p>
                                <div class="clearfix"></div>
                                @if (!empty($userstore->maplon))
                                <h2 class="map-location"><i class="glyphicon glyphicon-map-marker"></i> Location :</h2>
                                <div class="__google__map">
                                    <div id="map" style="height:300px;">
                                        <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0"
                                                marginwidth="0"
                                                src="https://maps.google.com/maps?q={{$userstore->maplat}},{{$userstore->maplon}}&hl=es;z=17.5&amp;output=embed"></iframe>
                                    </div>
                                    <script async defer
                                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB301j39-PCrbDTVZhn95hif4AB7JG5K_Q&callback=initMap"></script>
                                </div>
                                @endif
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
        // 
    </script>
@stop