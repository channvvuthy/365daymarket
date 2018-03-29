@extends('khmer24.layouts.master')
@section('title')
    Khmer24
@stop
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="latest-ads">
                    <div class="tap-post col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <ul>
                            <li class="select_cate @if (empty($_GET['category'])) active @endif"><i>1</i> Select Category</li>
                            <li class="description_post @if (!empty($_GET['category'])) active @endif"><i>2</i> Description</li>
                            <li class="finish_post"><i>3</i> Finish</li>
                        </ul>
                        <span class="border_tappost"></span>
                        <span class="border_tappost"></span>
                        <div class="main_post_wrap post-form hidden">
                            <form action="{{ route('save.post') }}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                            <div class="choose_cate_title col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="postbox clear_padding col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                    <label class="col-md-3">Category:</label>
                                    <div class="col-md-9 bt_category">
                                        <p>Phone & Tabletes => Phone <span>Change</span></p>
                                    </div>
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
                                    {{-- <label class="col-md-3">Type:</label>
                                    <select name="variation_type" class="variationselect">
                                        <option value="Iphone">Iphone</option>
                                        <option value="Iphone">Iphone</option>
                                        <option value="Iphone">Iphone</option>
                                    </select> --}}
                                </div>
                                <div class="postbox clear_padding col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                    <label class="col-md-3">Price <span class="red">*</span>:</label>
                                    <input type="text" name="price" class="col-md-7" required>
                                </div>
                                <div class="postbox clear_padding col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                    <label class="col-md-3">Description <span class="red">*</span>:</label>
                                    <textarea name="description" cols="40" rows="5" class="clear_padding col-md-9" required></textarea>
                                </div>
                                <div class="postbox clear_padding col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                    <label class="col-md-3">Ad Photo <span class="red">*</span>:</label>
                                    <div class="photo_wrap col-md-9">
                                        <div class="col-md-12 clear_padding">
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
                                    <input type="submit" name="save" value="Save">
                                </div>
                                <div class="clearfix"></div>
                                <div class="posting_rule col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <h3>Posting rule</h3>
                                    <p>wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww</p>
                                    <p>wwwwwwwwwwwwwwwwwwww</p>
                                    <p>wwwwwwwwwwwwwwwwwwww</p>
                                    <p>wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww</p>
                                    <p>wwwwwwwwwwwwwwwwwwww</p>
                                    <p>wwwwwwwwwwwwwwwwwwww</p>
                                    <p>wwwwwwwwwwwwwwwwwwww</p>
                                    <p>wwwwwwwwwwwwwwwwwwww</p>
                                    <p>wwwwwwwwwwwwwwwwwwww</p>
                                </div>
                            </div>
                            </form>
                        </div>
                        {{-- form post --}}
                        <div class="main_post_wrap choosCate_post">
                            <div class="choose_cate_title col-xs-12 col-sm-2 col-md-2 col-lg-2">
                                <p><b>Choose category:</b></p>
                            </div>
                            <div class="list_cate_post col-xs-12 col-sm-4 col-md-4 col-lg-4">
                                <p><b><i>1</i>Select a category:</b></p>
                                <ul class="all_category">
                                    @foreach ($categoty as $Categories)
                                    <li>
                                        <img src="{{ $Categories->icon }}" alt="">
                                        <span>{{ $Categories->name }}</span>
                                        <div class="list_subcate_post" style="width: 500px;">
                                            <p class="titile_list"><b><i>2</i>Select a subcategory:</b></p>
                                            <ul>
                                                @php
                                                    $subcategory=App\Category::where('parent_id',$Categories->id)->get();
                                                @endphp
                                                @foreach ($subcategory as $subcat)
                                                <li>
                                                <a href="#" class="select_subcat" data-cat="{{ $Categories->name }}" data-name="{{ $subcat->name }}" data-id="{{ $subcat->id }}">{{ $subcat->name }}</a>
                                                </li>
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
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).on("click",".uploadphoto1",function(){
            $(this).prev().click();
            // $(this).find('div.hasImg_menu').removeClass('hidden');
        });
        $(function () {
            $("input.ph1").change(function () {
                // if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded1;
                    reader.readAsDataURL(this.files[0]);
                // }
            });
        });
        function imageIsLoaded1(e) {
            $('.uploadphoto1').attr('src', e.target.result);
        };
        // 
        $(document).on("click",".uploadphoto2",function(){
            $(this).prev().click();
            // $(this).find('div.hasImg_menu').removeClass('hidden');
        });
        $(function () {
            $("input.ph2").change(function () {
                // if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded2;
                    reader.readAsDataURL(this.files[0]);
                // }
            });
        });
        function imageIsLoaded2(e) {
            $('.uploadphoto2').attr('src', e.target.result);
        };
        // 
        $(document).on("click",".uploadphoto3",function(){
            $(this).prev().click();
            // $(this).find('div.hasImg_menu').removeClass('hidden');
        });
        $(function () {
            $("input.ph3").change(function () {
                // if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded3;
                    reader.readAsDataURL(this.files[0]);
                // }
            });
        });
        function imageIsLoaded3(e) {
            $('.uploadphoto3').attr('src', e.target.result);
        };
        // 
        $(document).on("click",".uploadphoto4",function(){
            $(this).prev().click();
            // $(this).find('div.hasImg_menu').removeClass('hidden');
        });
        $(function () {
            $("input.ph4").change(function () {
                // if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded4;
                    reader.readAsDataURL(this.files[0]);
                // }
            });
        });
        function imageIsLoaded4(e) {
            $('.uploadphoto4').attr('src', e.target.result);
        };
    </script>
@stop