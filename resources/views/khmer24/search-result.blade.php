@extends('khmer24.layouts.master')
@section('title')
    Khmer24
@stop
@section('content')
    <div class="content search-content">
        <div class="container">
            <div class="row">
                <div class="wrapper-search">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="pangkisi-list">
                            <li>Home</li>
                            <li>All Category</li>
                            <li>Phone / Number</li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        {{-- form body --}}
                        <div class="main_post_wrap choosCate_post body-search">
                            <div class="side_left">
                                <div class="category_sidebar">
                                    <h3>Select a category</h3>
                                    <ul>
                                        <li>
                                            <a href="#" title="">
                                            <img src="{{ asset('uploads/icons.ico') }}" alt="">
                                            <span>111111111111s</span>
                                            </a>

                                        </li>
                                    </ul>
                                </div>
                                <div class="ads-left-banner">
                                    <img src="{{ asset('uploads/side.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="search_center">
                                <div class="ads-banner col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <img src="{{ asset('uploads/banner-center.jpg') }}" alt="">
                                    <img src="{{ asset('uploads/banner-center.jpg') }}" alt="">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="brand-location">
                                        <div class="bland-list">
                                            <ul>
                                                <li>wwwww</li>
                                                <li>wwwww eeeeeee</li>
                                                <li>wwwww</li>
                                                <li>wwwww eeeeeee</li>
                                                <li>wwwww</li>
                                                <li>wwwww eeeeeee</li>
                                                <li>wwwww</li>
                                                <li>wwwww eeeeeee</li>
                                                <li>wwwww</li>
                                                <li>wwwww eeeeeee</li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="all-location">
                                            <label>City/Province : </label>
                                            <select name="loaction">
                                                <option value="option">All City/Province</option>
                                                <option value="option">option</option>
                                                <option value="option">option</option>
                                            </select>
                                            <div class="price-filter">
                                                <label>Price : </label>
                                                <input type="number" name="pricefrom" class="prices" placeholder="1...">
                                                <span>-</span>
                                                <input type="number" name="pricefrom" class="prices" placeholder="10...">
                                                <input type="submit" name="" value=">" class="price-submit">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="product-result">
                                        <div class="header-sort">
                                        <div class="grid-list">
                                            <label>View :</label>
                                            <span class="list-layout"><i class="glyphicon glyphicon-th-list"></i></span>
                                            <span class="grid-layout"><i class="glyphicon glyphicon-th-large"></i></span>
                                        </div>
                                        <div class="sort-by">
                                            <label>Sort :</label>
                                            <select name="sort_by">
                                                <option value="New ads">New ads</option>
                                                <option value="New ads">Last ads</option>
                                                <option value="New ads">Most View</option>
                                            </select>
                                        </div>
                                        </div>
                                        <div class="product-items">
                                            <div class="block-items clear_padding col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <a href="{{ route('view.ads') }}">
                                                <div class="clear_padding item-photo col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                    <img src="{{ asset('uploads/1024x1024.jpg') }}" alt="">
                                                </div>
                                                </a>
                                                <div class="padding_right item-content col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                                    <h2><a href="{{ route('view.ads') }}">Iphone X 120G khmer khmer shopping</a></h2>
                                                    <p><span>address phnom penh cambodia 271 address phnom penh cambodia 271 address phnom penh cambodia 271</span></p>
                                                    <p><span>address phnom penh cambodia / 1 hours ago</span></p>
                                                    <p class="price">1500$</p>
                                                    <div class="img_thum">
                                                        <img src="{{ asset('uploads/1024x1024.jpg') }}" alt="">
                                                        <img src="{{ asset('uploads/1024x1024.jpg') }}" alt="">
                                                        <img src="{{ asset('uploads/1024x1024.jpg') }}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="block-items clear_padding col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <a href="{{ route('view.ads') }}">
                                                <div class="clear_padding item-photo col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                                    <img src="{{ asset('uploads/1024x1024.jpg') }}" alt="">
                                                </div>
                                                </a>
                                                <div class="padding_right item-content col-xs-8 col-sm-8 col-md-8 col-lg-8">
                                                    <h2><a href="{{ route('view.ads') }}">Iphone X 120G khmer khmer shopping</a></h2>
                                                    <p><span>address phnom penh cambodia 271 address phnom penh cambodia 271 address phnom penh cambodia 271</span></p>
                                                    <p><span>address phnom penh cambodia / 1 hours ago</span></p>
                                                    <p class="price">1500$</p>
                                                    <div class="img_thum">
                                                        <img src="{{ asset('uploads/1024x1024.jpg') }}" alt="">
                                                        <img src="{{ asset('uploads/1024x1024.jpg') }}" alt="">
                                                        <img src="{{ asset('uploads/1024x1024.jpg') }}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="side_right">
                                <div class="ads-banner-r">
                                    <img src="{{ asset('uploads/side.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                        {{-- end body --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop