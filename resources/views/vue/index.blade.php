@include('vue/header')
@include('vue/form-search')

<div class="banner">
    <Banner></Banner>
</div>
{{--End of banner--}}
<div class="navigation">
    <div class="container">
        <div class="row">
            <div class="col col-4 pr-2">
                <div class="toggle-cat">
                    <p>Choose Category <i class="glyphicon glyphicon-menu-hamburger"></i></p>

                </div>
            </div>
            <div class="col col-8">
                <div class="welcome">
                    Welcome to 365 day market, the biggest online market in Cambodia
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-4 main-nav pr-2">
                <div class="ul parent">
                    <ul class="list-unstyled">
                        @foreach($categories as $category)
                            <li class="{{$category['id']}}" id="{{$category['id']}}">
                                <img src="http://365daymarket.com/{{$category->icon}}" alt="">
                                <a href="">{{$category['name']}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col col-8">
                <div class="child">
                    <div class="list">
                        @foreach($categories as $category)
                            <div class="parent_id_{{$category['id']}} none">
                                <ul class="list-inline">
                                    <?php $start = 1;?>
                                    @foreach($subcategories as $subcategory)
                                        @if($category['id']===$subcategory['parent_id'])
                                            <?php $start++;?>
                                            @if($start <=16)
                                                <li class="list-inline-item">
                                                    <img src="http://365daymarket.com/{{$subcategory->icon}}" alt=""
                                                         class="img-block">
                                                    <a href="{{URL::to('/')}}?category={{$subcategory->name}}">{{$subcategory['name']}}</a>
                                                </li>
                                            @endif
                                        @endif

                                    @endforeach

                                </ul>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="products">
    <Product></Product>
</div>
<div class="location">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="location-list">
                    Location
                </h2>
                <div class="local">
                    <ul class="list-inline">
                        @if(!empty($locations))
                            @foreach($locations as $location)
                                <li class="list-inline-item"><a href=""><i
                                                class="glyphicon glyphicon-map-marker"></i> {{$location->name}}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
{{--Modal register--}}
<Register></Register>
{{--Modal login--}}
<Login></Login>
</div>
@include('vue/footer')