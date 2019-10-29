@extends('khmer24.layouts.master')
@section('title')
    365daymarket.com
@stop
@section('content')
    {{-- body --}}
    <div class="container-fluid user-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 user-article body-howtouse">
                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 how_to_use_wrapper">
                        <div class="user-adsitem how_to_use">
                            <div class="col-md-4 col-xs-12 col-sm-4 col-lg-4 side-howtouse">
                            <h2><i class="glyphicon glyphicon-info-sign"></i> How to use :</h2>
                            @foreach ($howtouse as $getUse)
                                <h3><i class="glyphicon glyphicon-chevron-right"></i> <a href="#{{ str_replace(' ','-',$getUse->name) }}" title="">{{ $getUse->name }}</a></h3>
                            @endforeach
                            </div>
                            <div class="col-md-8 col-xs-12 col-sm-8 col-lg-8 article-howtouse">
                            @foreach ($howtouse as $getUse)
                                <h3 id="{{ str_replace(' ','-',$getUse->name) }}">
                                @if (!empty($getUse->icon))
                                    <img src="{{ $getUse->icon }}" alt="">
                                @endif
                                {{ $getUse->name }}
                                </h3>
                                <hr>
                                {!! $getUse->description !!}
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop