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
            <h1 class="text-white">Matches</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, molestias repudiandae pariatur.</p>
          </div>
        </div>
      </div>
    </div>

    
    
    <div class="container">
      

      {{-- <div class="row">
        <div class="col-lg-12">
          
          <div class="d-flex team-vs">
            <span class="score">4-1</span>
            <div class="team-1 w-50">
              <div class="team-details w-100 text-center">
                <img src="{{asset('assets/images/logo_4.png')}}" alt="Image" class="img-fluid">
                <h3>LA LEGA <span>(win)</span></h3>
                <ul class="list-unstyled">
                  <li>Anja Landry (7)</li>
                  <li>Eadie Salinas (12)</li>
                  <li>Ashton Allen (10)</li>
                  <li>Baxter Metcalfe (5)</li>
                </ul>
              </div>
            </div>
            <div class="team-2 w-50">
              <div class="team-details w-100 text-center">
                <img src="{{asset('assets/images/logo_4.png')}}" alt="Image" class="img-fluid">
                <h3>JUVENDU <span>(loss)</span></h3>
                <ul class="list-unstyled">
                  <li>Macauly Green (3)</li>
                  <li>Arham Stark (8)</li>
                  <li>Stephan Murillo (9)</li>
                  <li>Ned Ritter (5)</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
    </div>
  

    
    <div class="site-section bg-dark">
      <div class="container">


        <div class="row">
          @foreach($groupedMatches as $round => $matches)
            <div class="col-12">
              <div class="title-section">
                <h2 class="heading"><b>Round {{ $round }}</b></h2>
              </div>
            </div>
            @foreach($matches as $match)
              <div class="col-lg-12 mb-4">
                <div class="bg-light p-4 rounded">
                  <div class="widget-body">
                    <div class="widget-vs">
                      <div class="d-flex align-items-center justify-content-around justify-content-between w-100">
                        <div class="team-1 text-center">
                          <img id="teamImage" src="{{ asset('uploads/Teams/thumbnail/' . $match->team1_image) }}" alt="image" style="border-radius: 10px" height="130px">
                          <br><br>
                          <h3>{{ $match->team1_name }}</h3>
                        </div>
                        <div>
                          <span class="vs"><span>VS</span></span>
                        </div>
                        <div class="team-2 text-center">
                          <img id="teamImage" src="{{ asset('uploads/Teams/thumbnail/' . $match->team2_image) }}" alt="image" style="border-radius: 10px" height="130px">
                          <br><br>
                          <h3>{{ $match->team2_name }}</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="text-center widget-vs-contents mb-4">
                    <h4>World Cup League</h4>
                    <p class="mb-5">
                      <span class="d-block">{{ Carbon\Carbon::parse($match->date)->format('F jS, Y') }}</span>
                      {{-- <span class="d-block">9:30 AM GMT+0</span> --}}
                      <strong class="text-primary">{{ $match->team1_venue }}</strong>
                    </p>
                  </div>
                </div>
              </div>
            @endforeach
          @endforeach
        </div>
        
    </div> <!-- .site-section -->



    <div class="container site-section">
      <div class="row">
        <div class="col-6 title-section">
          <h2 class="heading">Our Blog</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="custom-media d-flex">
            <div class="img mr-4">
              <img src="{{asset('assets/images/img_1.jpg')}}" alt="Image" class="img-fluid">
            </div>
            <div class="text">
              <span class="meta">May 20, 2020</span>
              <h3 class="mb-4"><a href="#">Romolu to stay at Real Nadrid?</a></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus deserunt saepe tempora dolorem.</p>
              <p><a href="#">Read more</a></p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="custom-media d-flex">
            <div class="img mr-4">
              <img src="{{asset('assets/images/img_3.jpg')}}" alt="Image" class="img-fluid">
            </div>
            <div class="text">
              <span class="meta">May 20, 2020</span>
              <h3 class="mb-4"><a href="#">Romolu to stay at Real Nadrid?</a></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus deserunt saepe tempora dolorem.</p>
              <p><a href="#">Read more</a></p>
            </div>
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