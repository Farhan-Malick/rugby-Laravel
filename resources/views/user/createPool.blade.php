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
    @include('layouts.header2')


   <div class="container">
    <h1 class="text-center text-light mt-5 mb-5">
        START A NEW POOL
    </h1>
    <p class="text-center">Select the sport and game type of the pool you want to run below.</p>

        <div class="row">
            @foreach ($Pools as $pool)
                <div class="col-md-5 ml-5 mr-2 border 1px p-4 mb-5" style="border-radius: 10px">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{asset('uploads/PoolFromAdmin/' . $pool->poolimage)}}" alt="" style="border-radius:10px" width="100%" height="60px">
                        </div>
                        <div class="col-md-7"><h4>{{$pool->poolname}}</h4><p>{{$pool->pool_category}}</p></div>
                        <div class="col-md-3"><a href="{{URL('set-pool/'.$pool->id)}}" class="btn btn-secondary">Select</a></div>
                    </div>
                </div>
            @endforeach
        </div>
   </div>
@include('layouts.footer')

  <!-- .site-wrap -->

  @include('layouts.scriptingLinks')


</body>

</html>
