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
                    <div class="col-md-12 col-xs-12 col-sm-12 col-lg-12 how_to_use_wrapper business-upgrade_wrapper">
                        <div class="user-adsitem how_to_use">
                            @foreach ($business as $getUse)
                                <h2 id="{{ str_replace(' ','-',$getUse->name) }}">
                                @if (!empty($getUse->icon))
                                    <img src="{{ $getUse->icon }}" alt="">
                                @endif
                                {{ $getUse->name }}
                                </h2>
                                <hr>
                                {!! $getUse->description !!}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop