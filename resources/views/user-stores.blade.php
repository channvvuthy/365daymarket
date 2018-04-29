<!DOCTYPE html>
<html lang="en">
  <head>
    <title>365daymarket.com</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
  </head>
  <style>
      @font-face {
          font-family: logofong;
          src: url("{{asset('fonts/enfont/Bevan.ttf')}}");
      }
      @font-face {
            font-family: myFirstFont;
            src: url("{{asset('fonts/Pasajero.otf')}}");
        }
        @font-face {
            font-family: Arimo-Bold;
            src: url("{{asset('fonts/\enfont/Arimo-Bold.ttf')}}");
        }
        @font-face {
            font-family: khmer-365day;
            src: url("{{asset('fonts/\enfont/SithiManuss.ttf')}}");
        }
  </style>
  <body style="font-family: 'Arimo-Bold','khmer-365day';">

    <!-- Navigation -->
    <nav class="navbar fixed-top">
      <div class="container">
        <a href="{{ asset('') }}" title="">365daymarket.com</a>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8 storeAll-items">
            @php
              $userstore=App\Store::where('user_id',$id)->first();
              $getuser=App\User::where('id',$id)->first();
            @endphp
          <div class="store-profile">
            <img src="{{ $getuser->image }}" alt="" class="col-md-4">
            <h1>{{ $userstore->name }}</h1>
          </div>
          <!-- Blog Post -->
          <h2 class="all-ads">All Products</h2>
          @foreach ($post as $adsItems)
          <div class="card mb-4 store-item">
            @php
              $imgPhoto=json_decode($adsItems->images,true);
            @endphp
            <div class="col-md-5 no-padding-left img-wrap">
              <a href="{{ route('view.ads') }}?key={{ bcrypt($adsItems->name) }}&id={{ $adsItems->id }}" title="">
              <img class="store-itemphoto" src="{{ $imgPhoto[0] }}" alt="">
              </a>
            </div>
            <div class="ads-body">
              <h2 class="card-title"><a href="{{ route('view.ads') }}?key={{ bcrypt($adsItems->name) }}&id={{ $adsItems->id }}">{{ $adsItems->name }}</a></h2>
              <p class="card-text">{{ str_limit($adsItems->description, 200) }}</p>
              <p class="card-text store-itemprice">{{ $adsItems->price }}</p>
            </div>
          </div>
          @endforeach
          {!! $post->render() !!}
        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
          <!-- Side Widget -->
          <div class="card my-4">
            <h2 class="card-header">Contact</h2>
            <div class="card-body">
              <p><i class="glyphicon glyphicon-phone"></i> {{ $userstore->phone }}</p>
              <p><i class="glyphicon glyphicon-briefcase"></i> {{ $userstore->address }}</p>
            </div>
            @if (!empty($userstore->maplon))
            <h2 class="map-location"><i class="glyphicon glyphicon-map-marker"></i> Location :</h2>
            <div class="__google__map">
                <div id="map" style="height:300px;">
                    <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0"
                            marginwidth="0"
                            src="https://maps.google.com/maps?q={{$userstore->maplat}},{{$userstore->maplon}}&hl=es;z=17.5&amp;output=embed"></iframe>
                </div>
                <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB301j39-PCrbDTVZhn95hif4AB7JG5K_Q&callback=initMap"></script>
            </div>
            @endif
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
    <!-- Footer -->
    <footer class="footer-wrapper">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; <span class="web">365daymarket</span> 2018</p>
      </div>
      <!-- /.container -->
    </footer>
  </body>

</html>
