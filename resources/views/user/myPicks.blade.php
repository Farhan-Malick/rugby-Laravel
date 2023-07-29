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
        Stats of your PICKS
    </h1>
    <p class="text-center">All the picks that you have made</p>
        <div class="row">
            <div class="col-lg-12">

                <div class="widget-next-match">
                  <table class="table custom-table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Team</th>
                        <th>Points</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($Picks as $pick)
                      <tr>
                        <td>{{$pick->id }}</td>
                        <td>{{$pick->name }}</td>
                        <td><strong class="text-white">{{$pick->teamname}}</strong></td>
                        <td>{{$pick->points }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>

              </div>
        </div>
   </div>
@include('layouts.footer')

  <!-- .site-wrap -->

  @include('layouts.scriptingLinks')


</body>

</html>
