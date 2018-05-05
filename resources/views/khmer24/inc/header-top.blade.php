<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <!-- <img src="{{asset('images/logo.png')}}" alt=""> -->
                        365daymarket
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                <div class="menus pull-right">
                    <ul class="list-inline">
                        @if (!empty(Auth::user()))
                            <li class="profileuser"><a href="{{ route('user.profile') }}"> 
                                @if (!empty(Auth::user()->image))
                                    <img src="{{ Auth::user()->image }}" alt="">
                                @else
                                    <img src="{{ asset('uploads/profile-defult.png') }}" alt="">
                                @endif
                            {{ Auth::user()->name }}</a></li>
                            <li><a href="{{ route('logout.user') }}"><i class="icon-lock"></i> logout</a></li>
                        @else
                            <li><a href="#" onclick="login__form();"><i class="icon-lock"></i> Login</a></li>
                            <li><a href="#" class="registeraccount"><i class="icon-user"></i> Register</a></li>
                        @endif
                        <li><a href="{{ route('how-to-use') }}"><i class="icon-key"></i> How To Use</a></li>
                        {{-- <li>
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle language" type="button" data-toggle="dropdown">
                                   <i class="glyphicon glyphicon-transfer"></i> Language
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="English">English</a></li>
                                    <li><a href="Khmer">Khmer</a></li>

                                </ul>
                            </div>
                        </li> --}}
                    </ul>
                </div>
                <div class="topheader-advertice">
                    {{-- <img src="{{ asset('uploads/banner-center.jpg') }}" alt=""> --}}
                </div>
            </div>
        </div>
    </div>
</div>
