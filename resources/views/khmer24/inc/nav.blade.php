<div class="navigation">
    <div class="container wrapper-nav">
        <div class="row">
            <div class="col-sm-3 col-md-3 navInner no-padding-right">
                <div class="panel-group" id="accordion">
                    <div class="nav-sidebarmenu panel panel-default">
                        <div class="panel-heading button_nav">
                            <h4 class="panel-title">
                                <a  href="#"><span class="glyphicon glyphicon-list">
                                </span>  Choose Category</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="nav_cate_left panel-collapse collapse in hidden">
                            <ul class="list-group">
                                @foreach ($categoty as $Categories)
                                <li class="categories-list list-group-item" data-categories="{{ $Categories->icon }}">
                                    <i><img src="{{ $Categories->icon }}" alt=""></i>
                                    <a href="#"> {{ $Categories->name }}</a>
                                    <div class="subcate-list">
                                        <ul>
                                            @foreach ($Categories->hasSubcategory as $subcategory)
                                                <li><a href="{{ route('search.result') }}?_token={{ bcrypt($subcategory->name) }}&category={{ $subcategory->name }}&location=&p=" title="">
                                                    <span>{{ str_limit($subcategory->name,25,'...') }}</span>
                                                    <div class="icon">
                                                        @if (!empty($subcategory->icon))
                                                            <img src="{{ $subcategory->icon }}" alt="">
                                                        @else
                                                            <img src="{{ asset('uploads/icons.ico') }}" alt="">
                                                        @endif
                                                    </div>
                                                </a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav_cate_sub col-xs-12 col-sm-9 col-md-9 col-lg-9 no-padding-left hidden">
                <div class="sub-menu">
               {{--  @php $i=0;@endphp
                @foreach ($categoty as $Categories)
                    @if ($i==0)
                    <div class="pop-cat">
                        <ul class="list-inline">
                        @foreach ($Categories->hasSubcategory as $subcategory)
                            <li class="li">
                                <a href="">
                                    <div class="icon">
                                        <span class="icon-sell"><img src="{{ asset('uploads/icons.ico') }}" alt=""></span>
                                    </div>
                                    <p class="title">{{ $subcategory->name }}</p>
                                </a>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    @php $i++;@endphp
                @endforeach --}}
                </div>
            </div>
            <div class="nav_cate_sub nav_cate_welcome col-xs-12 col-sm-9 col-md-9 col-lg-9 no-padding-left">
                <div class="sub-menu_">
                    <p>Welcome to khmer168, the biggest online market in Cambodia.</p>
                </div>
            </div>
        </div>
    </div>
</div>