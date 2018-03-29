<div class="navigation">
    <div class="container">
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
                                <li class="list-group-item">
                                    <i><img src="{{ $Categories->icon }}" alt=""></i>
                                    <a href="#"> {{ $Categories->name }}</a>
                                </li>
                                @endforeach

                                {{-- <li class="list-group-item"><i class="icon-phone"></i><a href="http://fb.com/moinakbarali"> Phone & Tablets</a></li>

                                <li class="list-group-item"><i class="icon-laptop"></i><a href="http://fb.com/moinakbarali"> Computer & Accessories</a></li>

                                <li class="list-group-item"><i class="icon-monitor"></i><a href="http://fb.com/moinakbarali"> Electronic & Appliances</a></li>

                                <li class="list-group-item"> <i class="icon-car"></i><a href="http://fb.com/moinakbarali"> Car & Vehicle</a></li>
                                <li class="list-group-item"> <i class="icon-home"></i><a href="http://fb.com/moinakbarali"> House & Land</a></li>
                                <li class="list-group-item"> <i class="icon-briefcase"></i><a href="http://fb.com/moinakbarali"> Jobs</a></li>
                                <li class="list-group-item"> <i class="icon-key"></i><a href="http://fb.com/moinakbarali"> Services</a></li>
                                <li class="list-group-item"> <i class="icon-tshirt"></i><a href="http://fb.com/moinakbarali"> Fashion & Beauty</a></li> --}}

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav_cate_sub col-xs-12 col-sm-9 col-md-9 col-lg-9 no-padding-left hidden">
                <div class="sub-menu">
                    <div class="pop-cat">
                        <ul class="list-inline">
                            <li class="li">
                                <a href="">
                                    <div class="icon">
                                        <span class="icon-sell"></span>
                                    </div>
                                    <p class="title">House for Sale</p>
                                </a>
                            </li>
                            <li class="li">
                                <a href="">
                                    <div class="icon">
                                        <span class="landed-properties-for-sale"></span>
                                    </div>
                                    <p class="title">Land for Sale</p>
                                </a>
                            </li>
                            <li class="li">
                                <a href="">
                                    <div class="icon">
                                        <span class="icon-sell"></span>
                                    </div>
                                    <p class="title">Cars for Sale</p>
                                </a>
                            </li>
                            <li class="li">
                                <a href="">
                                    <div class="icon">
                                        <span class="icon-sell"></span>
                                    </div>
                                    <p class="title">Motorcycles for Sale</p>
                                </a>
                            </li>
                            <li class="li">
                                <a href="">
                                    <div class="icon">
                                        <span class="icon-sell"></span>
                                    </div>
                                    <p class="title">Phones, Tablets</p>
                                </a>
                            </li>
                            <li class="li">
                                <a href="">
                                    <div class="icon">
                                        <span class="icon-sell"></span>
                                    </div>
                                    <p class="title">Phone Accessories</p>
                                </a>
                            </li>
                            <li class="li">
                                <a href="">
                                    <div class="icon">
                                        <span class="icon-sell"></span>
                                    </div>
                                    <p class="title">House for Sale</p>
                                </a>
                            </li>
                            <li class="li">
                                <a href="">
                                    <div class="icon">
                                        <span class="landed-properties-for-sale"></span>
                                    </div>
                                    <p class="title">Land for Sale</p>
                                </a>
                            </li>
                            <li class="li">
                                <a href="">
                                    <div class="icon">
                                        <span class="icon-sell"></span>
                                    </div>
                                    <p class="title">Cars for Sale</p>
                                </a>
                            </li>
                            <li class="li">
                                <a href="">
                                    <div class="icon">
                                        <span class="icon-sell"></span>
                                    </div>
                                    <p class="title">Motorcycles for Sale</p>
                                </a>
                            </li>
                            <li class="li">
                                <a href="">
                                    <div class="icon">
                                        <span class="icon-sell"></span>
                                    </div>
                                    <p class="title">Phones, Tablets</p>
                                </a>
                            </li>
                            <li class="li">
                                <a href="">
                                    <div class="icon">
                                        <span class="icon-sell"></span>
                                    </div>
                                    <p class="title">Phone Accessories</p>
                                </a>
                            </li>
                            <li class="li">
                                <a href="">
                                    <div class="icon">
                                        <span class="icon-sell"></span>
                                    </div>
                                    <p class="title">House for Sale</p>
                                </a>
                            </li>
                            <li class="li">
                                <a href="">
                                    <div class="icon">
                                        <span class="landed-properties-for-sale"></span>
                                    </div>
                                    <p class="title">Land for Sale</p>
                                </a>
                            </li>
                            <li class="li">
                                <a href="">
                                    <div class="icon">
                                        <span class="icon-sell"></span>
                                    </div>
                                    <p class="title">Cars for Sale</p>
                                </a>
                            </li>
                            <li class="li">
                                <a href="">
                                    <div class="icon">
                                        <span class="icon-sell"></span>
                                    </div>
                                    <p class="title">Motorcycles for Sale</p>
                                </a>
                            </li>
                            <li class="li">
                                <a href="">
                                    <div class="icon">
                                        <span class="icon-sell"></span>
                                    </div>
                                    <p class="title">Phones, Tablets</p>
                                </a>
                            </li>
                            <li class="li">
                                <a href="">
                                    <div class="icon">
                                        <span class="icon-sell"></span>
                                    </div>
                                    <p class="title">Phone Accessories</p>
                                </a>
                            </li>

                        </ul>
                    </div>
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