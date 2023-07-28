<!DOCTYPE html>
<html lang="en">

<head>
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


    <div class="hero overlay" style="background-image: url('{{asset('assets/images/banner.jpg')}}');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 mx-auto text-center">
            <h1 class="text-white">Pools</h1>
            <p>Rugby Pools</p>
          </div>
        </div>
      </div>
    </div>

    
  
  

    
    <div class="site-section bg-dark">
      <div class="container">
        
       

        <div class="row">
            @if(!empty($setPools) && count($setPools) > 0)
            @foreach($setPools as $pool)
            <div class="col-md-6 mb-5">
                <div class="border p-3 "
                    style="border-radius: 10px; background-color: #f8f9fa;">
                <a href="{{url('join/Pool/Form/'.$pool->id)}}" style="text-decoration: none">
                    <div class="row">
                        <div class="col-md-4">
                            <p style="font-weight: bold; color: #343a40; display: inline;">{{
                                $pool->user->first_name }}</p>
                            <span style="display: inline; font-weight: bold; color: #343a40;">{{
                                $pool->user->last_name }}</span>
                        </div>
                        <div class="col-md-8">
                            <div class="text-right">
                                <span class="badge badge-dark">{{ $pool->pool_week }}</span>
                            </div>
                            <p class="text-dark">{{ $pool->pool_name }}</p>
                            <p>{{ $pool->pool_format }}</p>
                            <p>{{ $pool->pool_spread }}</p>
                            <div class="text-right">
                                <small class="text-black" style="margin-left: 100px">{{ $pool->created_at->diffForHumans() }}</small>

                            </div>
                           
                            
                            
                            
                        </div>
                    </div>
                </a>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-12 text-center mt-5">
                <h3>No Pool is Set</h3>
                <p class="text-white">Start creating your pools now!</p>
                <a href="{{ url('/create-pool') }}" class="btn btn-primary mb-5">Create Pool</a>
            </div>
            @endif
        </div>
      </div>
    </div> <!-- .site-section -->



   



    @include('layouts.footer')




  </div>
  <!-- .site-wrap -->
  @include('layouts.scriptingLinks')

</body>

</html>