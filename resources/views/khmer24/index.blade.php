@extends('khmer24.layouts.master')
@section('title')
    Khmer24
@stop
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="popular">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h2 class="title-popular text-center">
                            Latest Ads
                        </h2>
                    </div>
                    <div class="product-list">
                        @foreach ($lastpost as $lastAds) 
                        <div class="col-xs-12 col-sm-2 col-mg-3 col-lg-3">
                            <div class="homeblock height-items">
                                <a href="{{ route('view.ads') }}?key={{ bcrypt($lastAds->name) }}&id={{ $lastAds->id }}">
                                @php
                                    $imgArr=json_decode($lastAds->images,true);
                                @endphp
                                <div class="home_img">
                                    <img src="{{ $imgArr[0] }}" alt="">
                                </div>
                                </a>
                                <div class="p">
                                    <h3><a href="{{ route('view.ads') }}">{{ str_limit($lastAds->name,100,'...') }}</a></h3>
                                    {{-- <p>{{ str_limit($lastAds->description,100,'...') }}</p> --}}
                                    <p><span class="price-item">$ {{ $lastAds->price }}</span></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="clearfix"></div>
                        <div class="col-xs-12 col-sm-12 col-mg-12 col-lg-12 viewmore_btn">
                            <a href="" title="">View More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="popular">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h2 class="title-popular text-center">
                            Popular Ads
                        </h2>
                    </div>
                    <div class="product-list">
                        @foreach ($popular as $lastAds) 
                        <div class="col-xs-12 col-sm-2 col-mg-3 col-lg-3">
                            <div class="homeblock height-items">
                                <a href="{{ route('view.ads') }}?key={{ bcrypt($lastAds->name) }}&id={{ $lastAds->id }}">
                                @php
                                    $imgArr=json_decode($lastAds->images,true);
                                @endphp
                                <div class="home_img">
                                    <img src="{{ $imgArr[0] }}" alt="">
                                </div>
                                </a>
                                <div class="p">
                                    <h3><a href="{{ route('view.ads') }}">{{ str_limit($lastAds->name,100,'...') }}</a></h3>
                                    {{-- <p>{{ str_limit($lastAds->description,100,'...') }}</p> --}}
                                    <p><span class="price-item">$ {{ $lastAds->price }}</span></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="clearfix"></div>
                        <div class="col-xs-12 col-sm-12 col-mg-12 col-lg-12 viewmore_btn">
                            <a href="" title="">View More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop