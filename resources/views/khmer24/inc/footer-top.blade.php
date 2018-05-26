<?php $footerInfo = DB::select("SELECT * FROM abouts WHERE status =1"); ?>
<div class="container-fluid f-top">
    <div class="container">
        <div class="footer-top">
            <div class="col-md-4 col-lg-4 col-sm-12">
                <h3>Follow Us</h3>
                <ul class="list-unstyled">
                    @foreach($footerInfo as $info)
                        @if($info->location==1)
                            <li><a href="{{$info->url}}"><i class="{{$info->icon}}"></i>{{$info->name}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <h3>Customer Service</h3>
                <ul class="list-unstyled">
                    @foreach($footerInfo as $info)
                        @if($info->location==2)
                            <li><a href="{{$info->url}}"><i class="{{$info->icon}}"></i>{{$info->name}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <h3>Usefull Information</h3>
                <ul class="list-unstyled">
                    @foreach($footerInfo as $info)
                        @if($info->location==3)
                            <li><a href="{{$info->url}}"><i class="{{$info->icon}}"></i>{{$info->name}}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid footer copyright">
    <div class="container">
        <div class="clear_padding col-md-12">
            <p class="m-0 text-center text-white">Copyright &copy; 2018 <span class="web">365daymarket</span> .All
                rights reserved</p>
        </div>
    </div>
</div>
