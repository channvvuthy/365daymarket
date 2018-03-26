@extends('khmer24.layouts.master')
@section('title')
    Khmer24
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
	                        	<div class="img-slider">
	                        		<img src="{{ asset('uploads/1024x1024.jpg') }}" alt="">
	                        	</div>
	                        	<div class="img-slider_thu">
                                    <img src="{{ asset('uploads/1024x1024.jpg') }}" alt="">
                                    <img src="{{ asset('uploads/1024x1024.jpg') }}" alt="">
	                        		<img src="{{ asset('uploads/1024x1024.jpg') }}" alt="">
	                        	</div>
                                <div class="dis_article">
                                    <div class="discription_header">
                                        <div class="clear_padding col-xs-12 col-sm-10 col-mg-10 col-lg-10">
                                            <h2>Headset AKG by Haman Nseries from USA</h2>
                                            <p class="price_wrap"><span class="price_style"> </span> <span class="price">$1200</span></p>
                                            <p>Posted On:<span>11-Mar-2018</span> / visitor:<span>1 K</span> </p>
                                        </div>
                                        <div class="padding_right col-xs-12 col-sm-2 col-mg-2 col-lg-2">
                                            <p><i class="icon icon-share text_gray"></i></p>
                                        </div>
                                    </div>
                                    <div class="discription_header">
                                        <h3>Description</h3>
                                        <p>Dear all customer in our shop just arrived the AKG by Haman (bluetooth headset). It new in box. It was the black color. It&#039;s nice sound. Interest pl call. Thank.Dear all customer in our shop just arrived the AKG by Haman (bluetooth headset). It new in box. It was the black color. It&#039;s nice sound. Interest pl call. Thank.</p>
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
                                <p><i class="glyphicon glyphicon-globe"></i> <a href="https://www.khmer168.com/LyvannPhoneShop" title="">{{ str_limit("https://www.khmer168.com/LyvannPhoneShop", 30,'...') }}</a></p>
                            </div>
	                    </div>

                    <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop