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
                            <form action="" method="post" accept-charset="utf-8">
                            <div class="choose_cate_title col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="postbox clear_padding col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                    <label class="col-md-3">Category:</label>
                                    <div class="col-md-9 bt_category">
                                        <p>Phone & Tabletes => Phone <span>Change</span></p>
                                    </div>
                                    <input type="hidden" name="catid" class="col-md-7 catid">
                                </div>
                                <div class="postbox clear_padding col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                    <label class="col-md-3">Name:</label>
                                    <input type="text" name="name" class="col-md-7">
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
                                    <label class="col-md-3">Price:</label>
                                    <input type="text" name="name" class="col-md-7">
                                </div>
                                <div class="postbox clear_padding col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                    <label class="col-md-3">Description:</label>
                                    <textarea name="description" cols="40" rows="5" class="clear_padding col-md-9"></textarea>
                                </div>
                                <div class="postbox clear_padding col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                    <label class="col-md-3">Ad Photo:</label>
                                    <div class="photo_wrap col-md-9">
                                        <div class="col-md-12 clear_padding">
                                            Please input your ads photo:
                                        </div>
                                        <div class="file_photo col-md-3" style="border: 1px solid #eee;">
                                            <img src="{{ asset('uploads/1024x1024.jpg') }}" alt="">
                                        </div>
                                        <div class="file_photo col-md-3" style="border: 1px solid #eee;">
                                            <img src="{{ asset('uploads/1024x1024.jpg') }}" alt="">
                                        </div>
                                        <div class="file_photo col-md-3" style="border: 1px solid #eee;">
                                            <img src="{{ asset('uploads/1024x1024.jpg') }}" alt="">
                                        </div>
                                        <div class="file_photo col-md-3" style="border: 1px solid #eee;">
                                            <img src="{{ asset('uploads/1024x1024.jpg') }}" alt="">
                                        </div>
                                        <div class="file_photo col-md-3" style="border: 1px solid #eee;">
                                            <img src="{{ asset('uploads/1024x1024.jpg') }}" alt="">
                                        </div>
                                        <div class="file_photo col-md-3" style="border: 1px solid #eee;">
                                            <img src="{{ asset('uploads/1024x1024.jpg') }}" alt="">
                                        </div>
                                        <div class="file_photo col-md-3" style="border: 1px solid #eee;">
                                            <img src="{{ asset('uploads/1024x1024.jpg') }}" alt="">
                                        </div>
                                        <div class="file_photo col-md-3" style="border: 1px solid #eee;">
                                            <img src="{{ asset('uploads/1024x1024.jpg') }}" alt="">
                                        </div>

                                    </div>
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
                                                <a href="#" class="select_subcat" data-name="{{ $subcat->name }}" data-id="{{ $subcat->id }}">{{ $subcat->name }}</a>
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
@stop