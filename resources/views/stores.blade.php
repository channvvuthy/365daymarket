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
                                <h4><a href="{{ route('user.profile') }}?_keys={{ bcrypt(Auth::user()->id) }}&user-option=Info&_token={{ bcrypt(Auth::user()->id) }}">Change Info <span class="change"><i class="glyphicon glyphicon-edit"></i></span> </a></h4>
                                <p>User Name : {{ Auth::user()->name }}</p>
                                <p>Store URL : <a href="https://www.khmer24.com/fb-moeundjtv" title="">https://365daymarket.com/fb-moeundjtv</a></p>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-4  col-lg-4">
                            <h4 style="color:transparent;">Info</h4>
                            <p>Phone Number : {{ Auth::user()->phone }}</p>
                            <p>Email : {{ Auth::user()->email }}</p>
                        </div>
                        <div class="col-md-3 col-xs-12 col-sm-3 col-lg-3 upgrade-business">
                            <a href="#">Upgrade To Business Account</a>
                        </div>
                        {{--  --}}
                        <div class="clearfix"></div>
                        {{--  --}}
                        @if (!empty($_GET['user-option']))
                            @if ($_GET['user-option'] == 'Info')
                                <div class="clearfix"></div>
                                <div class="user-adsitem edit-info">
                                    <div class="adsitem">
                                    <form action="{{ route('edit.profile') }}" method="get" accept-charset="utf-8" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                        <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6 left-edit">
                                            <input type="hidden" name="id" value="{{ Auth::user()->hasStore->id }}" placeholder="">
                                            <div class="wrap-input">
                                                <label class="col-md-3 col-xs-12 col-sm-3 col-lg-3">User Name <span style="color: red;">*</span> : </label>
                                                <input type="text" name="name" value="{{ Auth::user()->name }}" placeholder="" class="col-md-8 col-xs-12 col-sm-9 col-lg-9" required>
                                            </div>
                                            <div class="wrap-input">
                                                <label class="col-md-3 col-xs-12 col-sm-3 col-lg-3">Email <span style="color: red;">*</span> : </label>
                                                <input type="text" name="email" value="{{ Auth::user()->email }}" placeholder="" class="col-md-8 col-xs-12 col-sm-9 col-lg-9" required>
                                            </div>
                                            <div class="wrap-input">
                                                <label class="col-md-3 col-xs-12 col-sm-3 col-lg-3">Phone <span style="color: red;">*</span> : </label>
                                                <input type="text" name="phone" value="{{ Auth::user()->phone }}" placeholder="" class="col-md-8 col-xs-12 col-sm-9 col-lg-9" required>
                                            </div>
                                            <div class="wrap-input">
                                                @php
                                                    $location=App\Location::where('status','Publish')->get();
                                                @endphp
                                                <label class="col-md-3 col-xs-12 col-sm-3 col-lg-3">City/Province <span style="color: red;">*</span> : </label>
                                                <select name="location" class="col-md-8 col-xs-12 col-sm-9 col-lg-9 location-edit" required>
                                                    @foreach ($location as $locations)
                                                    <option value="{{ $locations->name }}">{{ $locations->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6 right-edit">
                                            <label class="col-md-3 col-xs-12 col-sm-3 col-lg-3">Address <span style="color: red;">*</span> : </label>
                                            <textarea name="address" rows="7" value="{{ Auth::user()->hasStore->address }}" class="col-md-9 col-xs-12 col-sm-9 col-lg-9" style="text-align: left;" required>{{ Auth::user()->hasStore->address }}</textarea>
                                        </div>
                                        <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 map-edit">
                                            <label class="col-md-12 col-xs-12 col-sm-12 col-lg-12" style="text-align: left;padding: 0;">Google Map : </label>
                                            {{--  --}}
                                            <div class="form-group">
                                                <div class="col-sm-12 col-md-12 no-padding-right no-padding-left">
                                                   {{-- <input type="text" class="validate_map" value="" required="required"> --}}
                                                   </head>
                                                   <body>
                                                      <input id="searchInput" class="controls google-search" type="text" placeholder="Enter a location">
                                                      <div id="map"></div>
                                                      <ul id="geoData">
                                                         <input type="hidden" id="location" name="maplocation" >
                                                         <input type="hidden" id="postal_code" name="mappostal_code">
                                                         <input type="hidden" id="country" name="mapcountry">
                                                         <input type="hidden" id="lat" class="lat" name="maplat" value="{{ Auth::user()->hasStore->maplat }}">
                                                         <input type="hidden" id="lon" class="lon" name="maplon" value="{{ Auth::user()->hasStore->maplon }}">
                                                      </ul>
                                                      @if (!empty(Auth::user()->hasStore->maplat))
                                                      <script>
                                                         function initMap() {
                                                             var map = new google.maps.Map(document.getElementById('map'), {
                                                               center: { lat: {{ Auth::user()->hasStore->maplat }} , lng: {{ Auth::user()->hasStore->maplon }} },
                                                               zoom: 19
                                                             });
                                                             var input = document.getElementById('searchInput');
                                                             map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                                                             var autocomplete = new google.maps.places.Autocomplete(input);
                                                             autocomplete.bindTo('bounds', map);

                                                             var infowindow = new google.maps.InfoWindow();
                                                             var marker = new google.maps.Marker({
                                                                 map: map,
                                                                 position:{lat: {{ Auth::user()->hasStore->maplat }} , lng: {{ Auth::user()->hasStore->maplon }} },
                                                                 anchorPoint: new google.maps.Point(0, -29)
                                                             });

                                                             autocomplete.addListener('place_changed', function() {
                                                                 infowindow.close();
                                                                 marker.setVisible(false);
                                                                 var place = autocomplete.getPlace();
                                                                 if (!place.geometry) {
                                                                     window.alert("Autocomplete's returned place contains no geometry");
                                                                     return;
                                                                 }

                                                                 // If the place has a geometry, then present it on a map.
                                                                 if (place.geometry.viewport) {
                                                                     map.fitBounds(place.geometry.viewport);
                                                                 } else {
                                                                     map.setCenter(place.geometry.location);
                                                                     map.setZoom(17);
                                                                 }
                                                                 marker.setIcon(({
                                                                     url: place.icon,
                                                                     size: new google.maps.Size(71, 71),
                                                                     origin: new google.maps.Point(0, 0),
                                                                     anchor: new google.maps.Point(17, 34),
                                                                     scaledSize: new google.maps.Size(35, 35)
                                                                 }));
                                                                 marker.setPosition(place.geometry.location);
                                                                 marker.setVisible(true);

                                                                 var address = '';
                                                                 if (place.address_components) {
                                                                     address = [
                                                                       (place.address_components[0] && place.address_components[0].short_name || ''),
                                                                       (place.address_components[1] && place.address_components[1].short_name || ''),
                                                                       (place.address_components[2] && place.address_components[2].short_name || '')
                                                                     ].join(' ');
                                                                 }

                                                                 infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
                                                                 infowindow.open(map, marker);

                                                                 //Location details
                                                                 for (var i = 0; i < place.address_components.length; i++) {
                                                                     if(place.address_components[i].types[0] == 'postal_code'){
                                                                         document.getElementById('postal_code').value = place.address_components[i].long_name;
                                                                     }
                                                                     if(place.address_components[i].types[0] == 'country'){
                                                                         document.getElementById('country').value = place.address_components[i].long_name;
                                                                     }
                                                                 }
                                                                 document.getElementById('location').value = place.formatted_address;
                                                                 document.getElementById('lat').value = place.geometry.location.lat();
                                                                 document.getElementById('lon').value = place.geometry.location.lng();
                                                             });
                                                             google.maps.event.addListener(map, 'click', function (e) {

                                                                 document.getElementById('lat').value = e.latLng.lat();
                                                                 document.getElementById('lon').value = e.latLng.lng();
                                                                 var marker = new google.maps.Marker({
                                                                   map: map,
                                                                   draggable: true,
                                                                   animation: google.maps.Animation.DROP,
                                                                   position:{lat:e.latLng.lat(), lng: e.latLng.lng() },
                                                                   anchorPoint: new google.maps.Point(0, -29)
                                                                 });
                                                            });
                                                         }
                                                      </script>
                                                      @else
                                                      <script>
                                                         function initMap() {
                                                             var map = new google.maps.Map(document.getElementById('map'), {
                                                               center: { lat: 11.544873, lng: 104.892167 },
                                                               zoom: 19
                                                             });
                                                             var input = document.getElementById('searchInput');
                                                             map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                                                             var autocomplete = new google.maps.places.Autocomplete(input);
                                                             autocomplete.bindTo('bounds', map);

                                                             var infowindow = new google.maps.InfoWindow();
                                                             var marker = new google.maps.Marker({
                                                                 map: map,
                                                                 position:{lat: 11.544873, lng: 104.892167 },
                                                                 anchorPoint: new google.maps.Point(0, -29)
                                                             });

                                                             autocomplete.addListener('place_changed', function() {
                                                                 infowindow.close();
                                                                 marker.setVisible(false);
                                                                 var place = autocomplete.getPlace();
                                                                 if (!place.geometry) {
                                                                     window.alert("Autocomplete's returned place contains no geometry");
                                                                     return;
                                                                 }

                                                                 // If the place has a geometry, then present it on a map.
                                                                 if (place.geometry.viewport) {
                                                                     map.fitBounds(place.geometry.viewport);
                                                                 } else {
                                                                     map.setCenter(place.geometry.location);
                                                                     map.setZoom(17);
                                                                 }
                                                                 marker.setIcon(({
                                                                     url: place.icon,
                                                                     size: new google.maps.Size(71, 71),
                                                                     origin: new google.maps.Point(0, 0),
                                                                     anchor: new google.maps.Point(17, 34),
                                                                     scaledSize: new google.maps.Size(35, 35)
                                                                 }));
                                                                 marker.setPosition(place.geometry.location);
                                                                 marker.setVisible(true);

                                                                 var address = '';
                                                                 if (place.address_components) {
                                                                     address = [
                                                                       (place.address_components[0] && place.address_components[0].short_name || ''),
                                                                       (place.address_components[1] && place.address_components[1].short_name || ''),
                                                                       (place.address_components[2] && place.address_components[2].short_name || '')
                                                                     ].join(' ');
                                                                 }

                                                                 infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
                                                                 infowindow.open(map, marker);

                                                                 //Location details
                                                                 for (var i = 0; i < place.address_components.length; i++) {
                                                                     if(place.address_components[i].types[0] == 'postal_code'){
                                                                         document.getElementById('postal_code').value = place.address_components[i].long_name;
                                                                     }
                                                                     if(place.address_components[i].types[0] == 'country'){
                                                                         document.getElementById('country').value = place.address_components[i].long_name;
                                                                     }
                                                                 }
                                                                 document.getElementById('location').value = place.formatted_address;
                                                                 document.getElementById('lat').value = place.geometry.location.lat();
                                                                 document.getElementById('lon').value = place.geometry.location.lng();
                                                             });
                                                             google.maps.event.addListener(map, 'click', function (e) {

                                                                 document.getElementById('lat').value = e.latLng.lat();
                                                                 document.getElementById('lon').value = e.latLng.lng();
                                                                 var marker = new google.maps.Marker({
                                                                   map: map,
                                                                   draggable: true,
                                                                   animation: google.maps.Animation.DROP,
                                                                   position:{lat:e.latLng.lat(), lng: e.latLng.lng() },
                                                                   anchorPoint: new google.maps.Point(0, -29)
                                                                 });
                                                            });
                                                         }
                                                      </script>
                                                      @endif
                                                      <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDre1VDn9vLz8GPlSODwfPNGeYKoRpCpbw&callback=initMap" async defer></script>
                                                   </body>
                                                </div>
                                             </div> 
                                             <style type="text/css" media="screen">
                                                 #map {width: 100%;height: 300px;}
                                             </style>
                                            {{--  --}}
                                        </div>
                                        <div class="bt_update">
                                            <input type="submit" name="" value="Update" placeholder="">
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            @endif
                            @if ($_GET['user-option'] == 'edit-ads')
                                <div class="user-adsitem edit-info">
                                    <div class="adsitem">
                                    <form action="{{ route('save.post') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                        <div class="choose_cate_title col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <div class="postbox clear_padding col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                                <input type="hidden" name="catid" class="col-md-7 catid">
                                                <input type="hidden" name="_token" value="{{Session::token()}}">
                                                <input type="hidden" name="categoryname" class="col-md-7 catname">
                                                <input type="hidden" name="subcategoryname" class="col-md-7 subcatname">
                                                <input type="hidden" name="url" class="col-md-7" value="{{ asset('') }}">
                                            </div>
                                            <div class="postbox clear_padding col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                                <label class="col-md-3">Title <span class="red">*</span>:</label>
                                                <input type="text" name="name" class="col-md-7" required>
                                            </div>
                                            <div class="brandlist postbox clear_padding col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                            </div>
                                            <div class="postbox clear_padding col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                                <label class="col-md-3">Price <span class="red">*</span>:</label>
                                                <input type="text" name="price" class="col-md-7" required>
                                            </div>
                                            <div class="postbox clear_padding col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                                <label class="col-md-3">Description <span class="red">*</span>:</label>
                                                <textarea name="description" cols="40" rows="5" class="clear_padding col-md-9 description_post" required></textarea>
                                            </div>
                                            <div class="postbox clear_padding col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                                <label class="col-md-3">Ad Photo <span class="red">*</span>:</label>
                                                <div class="photo_wrap col-md-9">
                                                    <div class="col-md-12 clear_padding">
                                                        <input type="text" name="" class="checkfilephoto" value="" required>
                                                        Please input your ads photo:
                                                    </div>
                                                    <div class="file_photo col-md-3" style="border: 1px solid #eee;">
                                                        <input type="file" class="hidden ph1" name="photo[]">
                                                        <img src="{{ asset('uploads/upload-photo.jpg') }}" alt="" class="uploadphoto1">
                                                    </div>
                                                    <div class="file_photo col-md-3" style="border: 1px solid #eee;">
                                                        <input type="file" class="hidden ph2" name="photo[]">
                                                        <img src="{{ asset('uploads/upload-photo.jpg') }}" alt="" class="uploadphoto2">
                                                    </div>
                                                    <div class="file_photo col-md-3" style="border: 1px solid #eee;">
                                                        <input type="file" class="hidden ph3" name="photo[]">
                                                        <img src="{{ asset('uploads/upload-photo.jpg') }}" alt="" class="uploadphoto3">
                                                    </div>
                                                    <div class="file_photo col-md-3" style="border: 1px solid #eee;">
                                                        <input type="file" class="hidden ph4" name="photo[]">
                                                        <img src="{{ asset('uploads/upload-photo.jpg') }}" alt="" class="uploadphoto4">
                                                    </div>
                                                    <div class="file_photo col-md-3" style="border: 1px solid #eee;">
                                                        <input type="file" class="hidden ph5" name="photo[]">
                                                        <img src="{{ asset('uploads/upload-photo.jpg') }}" alt="" class="uploadphoto5">
                                                    </div>
                                                    <div class="file_photo col-md-3" style="border: 1px solid #eee;">
                                                        <input type="file" class="hidden ph6" name="photo[]">
                                                        <img src="{{ asset('uploads/upload-photo.jpg') }}" alt="" class="uploadphoto6">
                                                    </div>
                                                    <div class="file_photo col-md-3" style="border: 1px solid #eee;">
                                                        <input type="file" class="hidden ph7" name="photo[]">
                                                        <img src="{{ asset('uploads/upload-photo.jpg') }}" alt="" class="uploadphoto7">
                                                    </div>
                                                    <div class="file_photo col-md-3" style="border: 1px solid #eee;">
                                                        <input type="file" class="hidden ph8" name="photo[]">
                                                        <img src="{{ asset('uploads/upload-photo.jpg') }}" alt="" class="uploadphoto8">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="postbox clear_padding col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                                <label class="col-md-3">Name <span class="red">*</span>:</label>
                                                <input type="text" name="username" class="col-md-7" required>
                                            </div>
                                            <div class="postbox clear_padding col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                                <label class="col-md-3">Phone <span class="red">*</span>:</label>
                                                <input type="text" name="phone" class="col-md-7" required>
                                            </div>
                                            <div class="postbox clear_padding col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                                <label class="col-md-3">Email <span class="red">*</span>:</label>
                                                <input type="text" name="email" class="col-md-7" required>
                                            </div>
                                            <div class="postbox clear_padding col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                                <label class="col-md-3">City/Province <span class="red">*</span>:</label>
                                                <select name="location" class="locations_" required>
                                                    @foreach ($location as $locationList)
                                                    <option value="{{ $locationList->name }}">{{ $locationList->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                            <div class="save-wrap clear_padding col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                                <label class="col-md-3"></label>
                                                <input type="submit" name="save" value="Save" class="savepost">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            @endif
                        @else
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
                                                <a href="{{ route('user.profile') }}?_keys={{ bcrypt(Auth::user()->id) }}&user-option=edit-ads&_token={{ bcrypt(Auth::user()->id) }}&adsID={{ $adspost->id }}" title="Edit"><i class="glyphicon glyphicon-edit"></i> Edit</a>
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
                        @endif
                        {{--  --}}
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