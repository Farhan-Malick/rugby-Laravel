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

    <div class="hero overlay" style="background-image: url('{{asset('assets/images/banner2.jpg')}}');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 ml-auto">
            <h1 class="text-white">World Cup Event</h1>
            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta, molestias repudiandae pariatur.</p> --}}
            {{-- <div id="date-countdown"></div> --}}
            <p>
              <a href="{{URL('/create-pool')}}" class="btn btn-primary py-3 px-4 mr-3">Start New Pool</a>
              <a href="{{URL('All/Pools')}}" class="btn btn-primary py-3 px-4 mr-3">Join A Pool</a>

              {{-- <a href="#" class="more light">Learn More</a> --}}
            </p>
            
          </div>
        </div>
      </div>
    </div>

    <div class="container">


      <div class="row">
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
      </div>
    </div>
    <br><br>
    <div class="container">
      <div class="row">
        <div class="col-12 title-section">
          <h2 class="heading">Winners</h2>
        </div>
      </div>
      <div class="row mb-5">
        <div class="col-lg-12">

          <div class="widget-next-match">
            {{-- <table class="table custom-table">
              <thead>
                  <tr>
                      <th>#</th>
                      <th>Match</th>
                      <th>Team Winner</th>
                      <th>Team Lost</th>
                      <th>Team Winner </th>
                      <th>Team Lost </th>
                      <th>Team with Handicap </th>
                      <th>Total point with Handicap</th>
                      <th>THE WINNERS</th>
                  </tr>
              </thead>
              <tbody class="text-white">
                  @foreach($matches as $match)
                  <tr>
                      <td>{{ $match->id }}</td>
                     
                      <td>{{ $match->team1_name }} vs {{ $match->team2_name }}</td>
                      <td class="text-success"><b>{{ $match->winnerTeam }}</b></td>
                      <td class="text-danger"><b>{{ $match->looserTeam }}</b></td>
                      <td>{{ $match->winner }}</td>
                      <td>{{ $match->looser  }}</td>
                      <td>{{ $match->bonus_team }}</td>
                      <td>
                        @if ($match->bonus_points_team1 != 0)
                            {{  $match->winner + $match->bonus_points_team1 }}
                        @elseif ($match->bonus_points_team2 != 0)
                            {{ $match->looser + $match->bonus_points_team2 }}
                        @else
                            {{ $match->looser }}
                        @endif
                    </td>
                      <td>
                        <b>   @if($match->looser + $match->bonus_points_team1 + $match->bonus_points_team2 < $match->winner)
                           <span class="text-success">{{ $match->winnerTeam }}</span>
                       @else
                           <span class="text-success">{{ $match->looserTeam }}</span>
                       @endif</b>
                       </td>
                  </tr>
              @endforeach
              
              </tbody>
          </table> --}}

          <table class="table custom-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Match</th>
                    <th>Round</th>
                    <th>Winner</th>
                    <th>Looser</th>
                    <th>Bonus of Team1</th>
                    <th>Bonus of Team2</th>
                    <th>Winner Score</th>
                    <th>Looser Score</th>
                    <th>With Bonus</th>
                    <th>Actual Winner</th>
                </tr>
            </thead>
            <tbody class="text-light">
                @foreach($matches as $match)
                  @if( $match->winner &&  $match->looser != 0)
                  <tr>
                      <td>{{ $match->id }}</td>
                      <td>{{ $match->team1_name }} vs {{ $match->team2_name }}</td>
                      <td>{{ $match->rounds }}</td>
                      <td class="text-success">{{ $match->winnerTeam }}</td>
                      <td class="text-danger"><b>{{ $match->looserTeam }}</b></td>
                      <td>{{ $match->bonus_team1 }} <b>({{ $match->bonus_points_team1 }})</b></td>
                      <td>{{ $match->bonus_team2 }} <b>({{ $match->bonus_points_team2 }})</b></td>
                      <td>{{ $match->winner }}</td>
                      <td>{{ $match->looser }}</td>
                      <td>
                          @if ($match->bonus_points_team1 != 0)
                              {{ $match->winner + $match->bonus_points_team1 }}
                          @elseif ($match->bonus_points_team2 != 0)
                              {{ $match->looser + $match->bonus_points_team2 }}
                          @else
                              {{ $match->looser }}
                          @endif
                      </td>
                      <td>
                          @if($match->looser + $match->bonus_points_team1 + $match->bonus_points_team2 < $match->winner)
                              <span class="text-success"><b>{{ $match->winnerTeam }}</b></span>
                          @else
                              <span class="text-primary"><b>{{ $match->looserTeam }}</b></span>
                          @endif
                      </td>
                    
                  </tr>
                  @else
                  
                  @endif
                @endforeach
            </tbody>
        </table>

          </div>

        </div>
      </div>

    </div>
    {{-- <div class="latest-news">
      <div class="container">
        <div class="row">
          <div class="col-12 title-section">
            <h2 class="heading">Latest News</h2>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-md-4">
            <div class="post-entry">
              <a href="#">
                <img src="{{asset('assets/images/img_1.jpg')}}" alt="Image" class="img-fluid">
              </a>
              <div class="caption">
                <div class="caption-inner">
                  <h3 class="mb-3">Romolu to stay at Real Nadrid?</h3>
                  <div class="author d-flex align-items-center">
                    <div class="img mb-2 mr-3">
                      <img src="{{asset('assets/images/person_1.jpg')}}" alt="">
                    </div>
                    <div class="text">
                      <h4>Mellissa Allison</h4>
                      <span>May 19, 2020 &bullet; Sports</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="post-entry">
              <a href="#">
                <img src="{{asset('assets/images/img_3.jpg')}}" alt="Image" class="img-fluid">
              </a>
              <div class="caption">
                <div class="caption-inner">
                  <h3 class="mb-3">Kai Nets Double To Secure Comfortable Away Win</h3>
                  <div class="author d-flex align-items-center">
                    <div class="img mb-2 mr-3">
                      <img src="{{asset('assets/images/person_1.jpg')}}" alt="">
                    </div>
                    <div class="text">
                      <h4>Mellissa Allison</h4>
                      <span>May 19, 2020 &bullet; Sports</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="post-entry">
              <a href="#">
                <img src="{{asset('assets/images/img_2.jpg')}}" alt="Image" class="img-fluid">
              </a>
              <div class="caption">
                <div class="caption-inner">
                  <h3 class="mb-3">Dogba set for Juvendu return?</h3>
                  <div class="author d-flex align-items-center">
                    <div class="img mb-2 mr-3">
                      <img src="{{asset('assets/images/person_1.jpg')}}" alt="">
                    </div>
                    <div class="text">
                      <h4>Mellissa Allison</h4>
                      <span>May 19, 2020 &bullet; Sports</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div> --}}

   
    <!-- .site-section -->

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
              {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus deserunt saepe tempora dolorem.</p>
              <p><a href="#">Read more</a></p> --}}
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
