@extends('khmer24.layouts.master')
@section('title')
    365daymarket.com
@stop
@section('content')
    <div class="content search-content">
        <div class="container">
            <div class="row">
                <div class="wrapper-search">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul class="pangkisi-list">
                            <li><a href="{{ asset('') }}" title=""><i class="glyphicon glyphicon-home"></i> Home</a></li>
                            @if (!empty($_GET['category']) || !empty($_GET['cats']))
                                <li><span class="menu-list">》</span> <a href="{{ route('search.result') }}?_token={{ bcrypt('1') }}&category=&location=&p=&search_param=all&keycod={{ bcrypt('1') }}" title="">All Categories</a></li>
                            @else
                                <li><span class="menu-list">》</span> All ads in cambodia</li>
                            @endif
                            @if (!empty($_GET['cats']))
                                <li><span class="menu-list">》</span> {{ str_replace('||','&',$_GET['cats']) }}</li>
                            @endif
                            @if (!empty($_GET['category']))
                                @php
                                    $categorys=App\Category::where('name',$_GET['category'])->first();
                                    $catsID=$categorys->parent_id;
                                    $cats=App\Category::where('id',$catsID)->first();
                                @endphp

                                <li><span class="menu-list">》</span> <a href="{{ route('search.result') }}?_token={{ bcrypt('1') }}&cats={{ str_replace('&','||',$cats->name) }}" title="">{{ $cats->name }}</a></li>
                                <li><span class="menu-list">》</span> {{ $_GET['category'] }}</li>
                            @endif
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        {{-- form body --}}
                        <div class="main_post_wrap choosCate_post body-search">
                            <div class="side_left">
                                <div class="category_sidebar">
                                    <h3>Select a category</h3>
                                    <ul>
                                        @if (!empty($_GET['category']) || !empty($_GET['cats']))
                                            <li><a href="{{ route('search.result') }}?_token={{ bcrypt('1') }}&category=&location=&p=&search_param=all&keycod={{ bcrypt('1') }}" title=""><span class="icon-prev"></span> All Categories</a></li>
                                        @endif
                                        {{--  --}}
                                        @if (!empty($_GET['cats']) )
                                            @php
                                                $catname=str_replace('||','&',$_GET['cats']);
                                                $catid=App\Category::where('name',$catname)->first();
                                                $allcategories=App\Category::where('parent_id',$catid->id)->orderBy('id','ASC')->get();
                                            @endphp
                                            @foreach ($allcategories as $categoriesAll)
                                            <li class="categorylist">
                                                <a href="{{ route('search.result') }}?_token={{ bcrypt('1') }}&category={{ str_replace('&','||',$categoriesAll->name) }}" @if($categoriesAll->name == str_replace('||','&',$_GET['cats'])) class="active" @endif>
                                                <img src="{{ $categoriesAll->icon }}" alt="">
                                                <span>{{ $categoriesAll->name }}</span>
                                                </a>
                                            </li>
                                            @endforeach
                                        @endif
                                        @if (empty($_GET['category']) && empty($_GET['location']) && empty($_GET['p']) && !empty($_GET['search_param']))
                                            @foreach ($categoty as $Categories)
                                                <li class="categorylist">
                                                    <a href="{{ route('search.result') }}?_token={{ bcrypt('1') }}&cats={{ str_replace('&','||',$Categories->name) }}">
                                                    <img src="{{ $Categories->icon }}" alt="">
                                                    <span>{{ $Categories->name }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        @endif
                                        @if ((empty($_GET['category']) && empty($_GET['location']) && empty($_GET['p']) && empty($_GET['search_param'])) || ((empty($_GET['category']) && empty($_GET['location']) && !empty($_GET['p']))))
                                            {{-- @foreach ($categoty as $Categories)
                                                <li class="categorylist">
                                                    <a href="{{ route('search.result') }}?_token={{ bcrypt('1') }}&cats={{ str_replace('&','||',$Categories->name) }}">
                                                    <img src="{{ $Categories->icon }}" alt="">
                                                    <span>{{ $Categories->name }}</span>
                                                    </a>
                                                </li>
                                            @endforeach --}}
                                            @if (!empty($_GET['cats']))
                                                @php
                                                    $catname=str_replace('||','&',$_GET['cats']);
                                                    $catid=App\Category::where('name',$catname)->first();
                                                    $allcategories=App\Category::where('parent_id',$catid->id)->orderBy('id','ASC')->get();
                                                @endphp
                                                @foreach ($allcategories as $categoriesAll)
                                                <li class="categorylist">
                                                    <a href="{{ route('search.result') }}?_token={{ bcrypt('1') }}&category={{ str_replace('&','||',$categoriesAll->name) }}" @if($categoriesAll->name == str_replace('||','&',$_GET['cats'])) class="active" @endif>
                                                    <img src="{{ $categoriesAll->icon }}" alt="">
                                                    <span>{{ $categoriesAll->name }}</span>
                                                    </a>
                                                </li>
                                                @endforeach
                                            @endif
                                        @endif
                                        @if (empty($_GET['category']) && !empty($_GET['location']))
                                            @foreach ($categoty as $Categories)
                                                <li class="categorylist">
                                                    <a href="{{ route('search.result') }}?_token={{ bcrypt('1') }}&cats={{ str_replace('&','||',$Categories->name) }}">
                                                    <img src="{{ $Categories->icon }}" alt="">
                                                    <span>{{ $Categories->name }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        @endif

                                        {{--  --}}
                                        @if (!empty($_GET['category']))
                                            @php
                                                $categorys=App\Category::where('name',$_GET['category'])->first();
                                                $catsID=$categorys->parent_id;
                                                $cats=App\Category::where('id',$catsID)->first();
                                                $allcategories=App\Category::where('parent_id',$catsID)->get();
                                            @endphp
                                            <li>
                                                <a href="{{ route('search.result') }}?_token={{ bcrypt('1') }}&cats={{ str_replace('&','||',$cats->name) }}">
                                                <img src="{{ $cats->icon }}" alt="">
                                                <span>{{ $cats->name }}</span>
                                                </a>
                                            </li>
                                            @foreach ($allcategories as $allCategory)
                                            <li class="categorylist">
                                                <a href="{{ route('search.result') }}?_token={{ bcrypt('1') }}&category={{ str_replace('&','||',$allCategory->name) }}" title="" 
                                                @if ($allCategory->name == $_GET['category']) class="active" @endif>- <span>{{ $allCategory->name }}</span></a>
                                            </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <div class="ads-left-banner">
                                @if (count($adsleft)>0)
                                    @foreach ($adsleft as $adsleft)
                                    {{-- @php
                                        $adsleft=json_decode($adsleft->image,true);
                                    @endphp --}}
                                    <a href="{{ $adsleft->external_url }}" target="_blank">
                                    <img src="{{ $adsleft->image }}" alt="">
                                    </a>
                                    @endforeach
                                @endif
                                </div>
                            </div>
                            <div class="search_center">
                                <div class="ads-banner col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    @if (count($adstop)>0)
                                        @foreach ($adstop as $adsleft)
                                        <a href="{{ $adsleft->external_url }}" target="_blank">
                                        <img src="{{ $adsleft->image }}" alt="">
                                        </a>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="brand-location">
                                        {{-- <div class="bland-list">
                                            <ul>
                                            </ul>
                                        </div> --}}
                                        <div class="clearfix"></div>
                                        <div class="all-location">
                                            <form action="{{ route('search.result') }}" method="get" accept-charset="utf-8" class="formlocation">
                                            <label>City/Province : </label>
                                                <input type="hidden" name="_token" value="{{ bcrypt('a') }}" class="postby">
                                                <select name="location" class="location-search">
                                                    <option value="">All City/Province</option>
                                                    @foreach ($location as $locations)
                                                    <option value="{{ $locations->name }}" 
                                                        @if (!empty($_GET['location']))
                                                        @if ($locations->name == $_GET['location'])
                                                        selected="selected"
                                                        @endif
                                                        @endif>
                                                    {{ $locations->name }}</option>
                                                    @endforeach
                                                </select>
                                                <input type="hidden" name="category" value="@if (!empty($_GET['category'])){{$_GET['category']}}@endif" class="category">
                                                <input type="hidden" name="p" value="@if (!empty($_GET['p'])){{$_GET['p']}}@endif" class="p">
                                                <input type="hidden" name="postby" value="@if (!empty($_GET['postby'])){{$_GET['postby']}}@endif" class="postby">
                                                <input type="hidden" name="endkey" value="{{ bcrypt('a') }}" class="postby">
                                            </form>
                                            <div class="price-filter">
                                                <form action="{{ route('search.result') }}" method="get" accept-charset="utf-8">
                                                <label>Price : </label>
                                                <input type="hidden" name="_token" value="{{ bcrypt('a') }}" class="postby">
                                                <input type="number" name="pricefrom" class="prices" min="1" max="100000">
                                                <span>-</span>
                                                <input type="number" name="priceto" class="prices" min="1" max="10000000">
                                                <input type="submit" name="" value=">" class="price-submit">
                                                {{--  --}}
                                                <input type="hidden" name="category" value="@if (!empty($_GET['category'])){{$_GET['category']}}@endif" class="category">
                                                <input type="hidden" name="location" value="@if (!empty($_GET['location'])){{$_GET['location']}}@endif" class="location">
                                                <input type="hidden" name="p" value="@if (!empty($_GET['p'])){{$_GET['p']}}@endif" class="p">
                                                <input type="hidden" name="postby" value="@if (!empty($_GET['postby'])){{$_GET['postby']}}@endif" class="postby">
                                                <input type="hidden" name="endkey" value="{{ bcrypt('a') }}" class="postby">
                                                </form>
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
                                            <form action="{{ route('search.result') }}" class="sortfilter" method="get" accept-charset="utf-8">
                                            <input type="hidden" name="_token" value="{{ bcrypt('a') }}" >
                                            <label>Sort :</label>
                                                <select name="postby" class="sortfilterby">
                                                    <option value="last" @if ($_GET['postby']=='last') selected="selected" @endif>New ads</option>
                                                    <option value="popular" @if ($_GET['postby']=='popular') selected="selected" @endif>Most View</option>
                                                </select>
                                                {{--  --}}
                                                <input type="hidden" name="category" value="@if (!empty($_GET['category'])){{$_GET['category']}}@endif" class="category">
                                                <input type="hidden" name="location" value="@if (!empty($_GET['location'])){{$_GET['location']}}@endif" class="location">
                                                <input type="hidden" name="p" value="@if (!empty($_GET['p'])){{$_GET['p']}}@endif" class="p">
                                            </form>
                                        </div>
                                        </div>
                                        <div class="product-items">
                                            @if (count($post) < 1)
                                                No result ...
                                            @endif
                                            @foreach ($post as $product)
                                            <div class="block-items clear_padding col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="post-items">
                                                <a href="{{ route('view.ads') }}?key={{ bcrypt($product->name) }}&id={{ $product->id }}">
                                                @php
                                                    $imgArr=json_decode($product->images,true);
                                                @endphp
                                                <div class="clear_padding item-photo col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                                   @if(!empty($product->img_thum))
			                              @php
				                          $imgthum=json_decode($product->img_thum,true);
				                      @endphp
			                              <img src="{{ $imgthum[0] }}" alt="">
			                           @else
			                              <img src="{{ $imgArr[0] }}" alt="">
			                           @endif
                                                </div>
                                                </a>
                                                <div class="padding_right item-content col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                                    <h2>
                                                        <a href="{{ route('view.ads') }}?key={{ bcrypt($product->name) }}&id={{ $product->id }}">{{ str_limit($product->name,30,'...') }}</a>
                                                    </h2>
                                                    <p>{{ str_limit($product->address,30,'...') }} <span class="datepost">/ Post On : {{date('d-M-Y', strtotime($product->created_at))}}</span></p>
                                                    <p class="price">{{ $product->price }} @if(strpos($product->price, '$') === false) $ @endif </p>
                                                    <div class="img_thum">
                                                        @foreach ($imgArr as $productimg)
                                                            <img src="{{ $productimg }}" alt="">
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            @endforeach
                                            {{-- {!! $post->render() !!} --}}
                                            {{ $post->appends(\Request::except('_token'))->render() }}
                                            {{-- <div class="block-items clear_padding col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="side_right">
                                <div class="ads-banner-r">
                                    @if (count($adsright)>0)
                                        @foreach ($adsright as $adsleft)
                                        <a href="{{ $adsleft->external_url }}" target="_blank">
                                        <img src="{{ $adsleft->image }}" alt="">
                                        </a>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- end body --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).on('click','.list-layout',function(){
            $('.block-items').removeClass('col-md-6 col-lg-6');
            $('.block-items').addClass('col-md-12 col-lg-12');
            $('.item-photo').removeClass('col-md-12 col-lg-12');
            $('.item-photo').addClass('col-md-4 col-lg-4');
            $('.item-content').removeClass('col-md-12 col-lg-12');
            $('.item-content').addClass('col-md-8 col-lg-8');
            $('.img_thum').removeClass('hidden')
            $(".item-content").removeClass('LR_padding');
        });
        $(document).on('click','.grid-layout',function(){
            $('.block-items').removeClass('col-md-12 col-lg-12');
            $('.block-items').addClass('col-md-6 col-lg-6');
            $('.item-photo').removeClass('col-md-4 col-lg-4');
            $('.item-photo').addClass('col-md-12 col-lg-12');
            $('.item-content').removeClass('col-md-8 col-lg-8');
            $('.item-content').addClass('col-md-12 col-lg-12');
            $(".item-content").addClass('LR_padding');
            $('.img_thum').addClass('hidden')
        });
        $(document).on('change','.location-search',function(){
            $('.formlocation').submit();
        });
        $(document).on('change','.sortfilterby',function(){
            $('.sortfilter').submit();
        });
    </script>
@stop