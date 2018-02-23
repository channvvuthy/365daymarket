<div class="header-middle">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                <div class="form-search">
                    <form action="">
                        <input type="hidden" name="_token" value="{{Session::token()}}">
                        <div class="input-group">
                            <div class="input-group-btn search-panel">
                                <button type="button" class="btn btn-default dropdown-toggle btn-category" data-toggle="dropdown">
                                    <span id="search_concept">All Categories</span> <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#contains">Computer</a></li>
                                    <li><a href="#its_equal">Phone & Tablet</a></li>
                                    <li><a href="#greather_than">Electronic</a></li>
                                </ul>
                            </div>
                            <div class="input-group-btn search-panel">
                                <button type="button" class="btn btn-default dropdown-toggle btn-location" data-toggle="dropdown">
                                    <span id="search_concept">All Locations</span> <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#contains">Phnom Penh</a></li>
                                    <li><a href="#its_equal">Takeo</a></li>
                                    <li><a href="#greather_than">Kandal</a></li>
                                </ul>
                            </div>
                            <input type="hidden" name="search_param" value="all" id="search_param">
                            <input type="text" class="form-control input-search" name="x" placeholder="What are you looking for...">
                            <span class="input-group-btn">
                    <button class="btn btn-default btn-search" type="button"><span
                                class="glyphicon glyphicon-search"></span> Search</button>
                </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
                <button class="btn btn-warning btn-post btn-block"><i class="glyphicon glyphicon-plus-sign"></i> POST PRODUCT</button>
            </div>
        </div>
    </div>
</div>