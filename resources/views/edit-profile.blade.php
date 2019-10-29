@extends('khmer24.layouts.master')
@section('title')
    365daymarket.com
@stop
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="latest-ads">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 span-manage">
                        <div class="col-md-5" style="padding-left: 0;">
                            <form action="{{ route('change.profile') }}" method="post" class="change-profile" accept-charset="utf-8" enctype="multipart/form-data">
                            <div class="user-img-photo">
                                <input type="file" class="hidden profile" name="profile">
                                @if (!empty(Auth::user()->image))
                                    <img src="{{ Auth::user()->image }}" class="profile-photo" title="Change Profile">
                                @else
                                    <img src="{{ asset('uploads/profile-defult.png') }}" class="profile-photo" title="Change Profile">
                                @endif
                            </div>
                            <input type="text" class="hidden" value="{{ asset('') }}" name="url">
                            <input type="hidden" name="_token" value="{{Session::token()}}">
                            </form>
                            <div class="user-article">
                                <h4><a href="#">Change Info <span class="change"><i class="glyphicon glyphicon-edit"></i></span> </a></h4>
                                <p>User Name : {{ Auth::user()->name }}</p>
                                <p>Store URL : <a href="https://www.khmer24.com/fb-moeundjtv" title="">https://365daymarket.com/fb-moeundjtv</a></p>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-4  col-lg-4">
                            <h4 style="color:transparent;">Info</h4>
                            <p>Register Phone : 070 766 458</p>
                            <p>Email : 070 766 458</p>
                        </div>
                        <div class="col-md-3 col-xs-12 col-sm-3 col-lg-3 upgrade-business">
                            <a href="#">Upgrade To Business Account</a>
                        </div>
                        {{--  --}}
                        <div class="clearfix"></div>
                        <ul class="nav-tap">
                            <li><a href="#" class="active"><i class="glyphicon glyphicon-folder-open"></i> My Ads</a></li>
                            <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Setting</a></li>
                        </ul>
                        <div class="clearfix"></div>
                        <div class="user-adsitem">
                            <div class="adsitem">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">Ads Photo</th>
                                      <th scope="col">Name</th>
                                      <th scope="col">Price</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach (Auth::user()->hasPosts as $adspost)
                                    @php
                                        $imgArr=json_decode($adspost->images,true);
                                    @endphp
                                    <tr>
                                        <th class="img-userads">
                                          <img src="{{ $imgArr[0] }}" alt="">
                                        </th>
                                        <td>{{ $adspost->name }}</td>
                                        <td>{{ $adspost->price }}</td>
                                        <td>Disable</td>
                                        <td class="action-adspost">
                                            <a href="#" title="Edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                             | 
                                            <a href="#" title="Edit"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    {{-- <tr>
                                      <th class="img-userads">
                                          <img src="{{ asset('uploads/profile-defult.png') }}" alt="">
                                      </th>
                                      <td>Mark</td>
                                      <td>Otto</td>
                                      <td>@mdo</td>
                                    </tr> --}}
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- body --}}
    <div class="container-fluid user-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 user-article">
                    <div class="user-adsitem">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function(){
        $('.navigation').addClass('hidden');
    });
    $(document).on("click",".profile-photo",function(){
        $(this).prev().click();
        // $(this).find('div.hasImg_menu').removeClass('hidden');
    });
    $(function () {
        $("input.profile").change(function () {
            // if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = imageIsLoaded1;
                reader.readAsDataURL(this.files[0]);
            // }
        });
    });
    function imageIsLoaded1(e) {
        $('.change-profile').submit();
        $('.profile-photo').attr('src', e.target.result);
    };
    </script>
    <style type="text/css" media="screen">
        .user-img-photo {position: relative;}
        .user-img-photo:hover:after{
            position: absolute;
            content: '';
            left: 0;
            top: 0;
            width: 40px;
            height: 40px;
            background: url({{ asset('uploads/grap-change.png') }}) no-repeat;
            z-index: 9;
            background-size: contain;
        }
    </style>
@stop