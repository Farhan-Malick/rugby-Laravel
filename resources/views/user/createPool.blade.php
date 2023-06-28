<!DOCTYPE html>
<html lang="en">

<head>
  {{-- <title>Rugby &mdash; </title> --}}
 @include('layouts.headLinks')
</head>

<body>

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    @include('layouts.header')

    <div class="hero overlay" style="background-image: url('{{asset('assets/images/banner2.jpg')}}'); ">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 ml-auto">
            <h2 class="text-white">START A NEW POOL</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, molestias repudiandae pariatur.</p>
            <div id="date-countdown"></div>
            <p>
              <a href="#" class="btn btn-primary py-3 px-4 mr-3">Start new pool</a>
              <a href="#" class="more light">Learn More</a>
            </p>
          </div>
        </div>
      </div>
    </div>


@include('layouts.footer')

  </div>
  <!-- .site-wrap -->

  @include('layouts.scriptingLinks')


</body>

</html>
