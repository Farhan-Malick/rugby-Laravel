<!DOCTYPE html>
<html lang="en">

<head>
  {{-- <title>Rugby &mdash; </title> --}}
  @include('layouts.headLinks')
    <style>
        .main-body {
            padding: 15px;
        }
        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }
        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }
        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }
        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }
        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }
        .bg-gray-300 {
            background-color: #e2e8f0;
        }
        .h-100 {
            height: 100% !important;
        }
        .shadow-none {
            box-shadow: none !important;
        }
    </style>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    <div class="container">


     
    </div>
    <br><br>
    <div class="container">
      
      <ul class="nav nav-tabs" id="myTab" style="margin-top: 100px" role="tablist">
        <li class="nav-item mr-3 mb-2" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Team Selection</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link mr-3 mb-2" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Round Picks Score Chart</button>
        </li>
        <li class="nav-item " role="presentation">
          <button class="nav-link mr-3 mb-2" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Picks Stats</button>
        </li>
        <li class="nav-item " role="presentation">
            <button class="nav-link mr-3 mb-2" id="PoepleWhoJoined-tab" data-bs-toggle="tab" data-bs-target="#PoepleWhoJoined-tab-pane" type="button" role="tab" aria-controls="PoepleWhoJoined-tab-pane" aria-selected="false">Pool Users</button>
        </li>
        {{-- <li class="nav-item" role="presentation">
          <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" disabled>Disabled</button>
        </li> --}}
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
          <div class="row mt-5">
            <div class="col-md-12">
                <div class="row gutters-sm">
                    <div class="col-sm-12 mb-3">
                        <div style="" class=" h-100">
                            <div class="card-body">
                                <h1 class="">Team Selection Form</h1>
                                <hr class="bg-white">
                                <style>
                                    .team-box.selected {
                                        outline: 3px solid yellow;
                                    }
                                </style>

                            <form action="{{ route('submit-picks') }}" method="post" id="team-selection-form">
                                @csrf
                                <div id="team-selection-form">
                                    @foreach($matchesByRoundPicks as $round => $matches)
                                        <div class="text-center mb-5">
                                          <h2>Round {{ $round }}</h2>
                                        </div>
                                        @foreach($matches as $match)
                                            <div class="container mb-5">
                                                <div class="row">
                                                    <div class="col-md-5 border 1px p-3 team-box team-selection" data-team-id="{{ $match->team1_id }}" style="border-radius: 10px">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <img id="teamImage" src="{{ asset('uploads/Teams/thumbnail/' . $match->team1_image) }}" alt="image" style="border-radius: 10px" height="60px">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <h4 class="text-light">{{ $match->team1_name }}</h4>
                                                                <span>Round - </span><strong class="text-light">{{ $match->rounds }}</strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 text-center">
                                                        <span class="vs">VS</span>
                                                    </div>
                                                    <div class="col-md-5 border 1px p-3 team-box team-selection" data-team-id="{{ $match->team2_id }}" style="border-radius: 10px">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <img src="{{ asset('uploads/Teams/thumbnail/' . $match->team2_image) }}" alt="" style="border-radius: 10px" height="60px">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <h4 class="text-light">{{ $match->team2_name }}</h4>
                                                                <span>Round - </span><strong class="text-light">{{ $match->rounds }}</strong>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-success select-team w-100 p-3" style="font-size: 20px">Submit</button>
                                </div>
                            </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
          <div class="row mt-5">
            <div class="col-12 title-section">
              <h2 class="heading">All Picks</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">

                <div class="">
                    @php
                        // Initialize array to store cumulative totals
                        $cumulativeTotals = [];
                    @endphp
                
                    @foreach($matchesByRound as $round => $roundMatches)
                        <h2>Round {{ $round }}</h2>
                        
                        <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">6 Pickup Points</th>
                                    <th scope="col">4 Pickup Points</th>
                                    <th scope="col">2 Pickup Points</th>
                                    @for ($i = 1; $i <= $round; $i++)
                                        <th scope="col">Round {{ $i }}</th>
                                    @endfor
                                    {{-- <th scope="col">Total</th> --}}
                                    @if ($round > 1)
                                        <th scope="col">Total of Round 1 to {{ $round }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key => $user)
                                    @php
                                        // Filter the picks for the current round
                                        $userPicksForCurrentRound = $user->picks->where('rnd', $round);
                
                                        // Initialize variables for current round totals
                                        $currentRoundTotal = 0;
                                        $cumulativeTotal = 0;
                
                                        // Calculate current round total points
                                        foreach ($userPicksForCurrentRound as $pick) {
                                            if ($roundMatches->where('winnerTeam', $pick->teamname)->isNotEmpty()) {
                                                $currentRoundTotal += $pick->points;
                                            }
                                        }
                
                                        // Calculate cumulative totals up to the current round
                                        if ($round > 1) {
                                            $cumulativeTotal = $cumulativeTotals[$key][$round - 1] + $currentRoundTotal;
                                        } else {
                                            $cumulativeTotal = $currentRoundTotal;
                                        }
                
                                        // Store cumulative total for this user and round
                                        $cumulativeTotals[$key][$round] = $cumulativeTotal;
                                    @endphp
                
                                    @if($userPicksForCurrentRound->isNotEmpty())
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $user->first_name ?? 'Null' }}</td>
                
                                            {{-- Pickup Points Columns --}}
                                            @foreach([6, 4, 2] as $points)
                                                <td>
                                                    @php
                                                        $filteredPicks = $userPicksForCurrentRound->where('points', $points);
                                                    @endphp
                                                    @if ($filteredPicks->isEmpty())
                                                        <p>Null</p>
                                                    @else
                                                        @foreach ($filteredPicks as $pick)
                                                            <p>{{ $pick->teamname }} ({{ $pick->points }})</p>
                                                        @endforeach
                                                    @endif
                                                </td>
                                            @endforeach
                
                                            {{-- Round Totals --}}
                                            @for ($i = 1; $i <= $round; $i++)
                                                <td>
                                                    @php
                                                        // Calculate total for each round
                                                        $roundTotal = 0;
                                                        $userPicksForRound = $user->picks->where('rnd', $i);
                                                        
                                                        foreach ($userPicksForRound as $pick) {
                                                            if ($matchesByRound[$i]->where('winnerTeam', $pick->teamname)->isNotEmpty()) {
                                                                $roundTotal += $pick->points;
                                                            }
                                                        }
                                                        
                                                        echo $roundTotal;
                                                    @endphp
                                                </td>
                                            @endfor
                
                                            {{-- Total of Round 1 to Current Round --}}
                                            @if ($round > 1)
                                                <td>
                                                    <p>{{ $cumulativeTotal }}</p>
                                                </td>
                                            @endif
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    @endforeach
                </div>
                
                
  
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
            <div class="row mt-5">
                <div class="col-lg-12 ">
    
                    <div class="widget-next-match p-4">
                        <table id="basic-datatables" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>Pool ID</th>
                                    <th>Rounds</th>
                                    <th>Name</th>
                                    <th>Team</th>
                                    <th>Points</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($AllPicks as $pick)
                                    <tr>
                                        <td>{{ $pick->created_pool_id }}</td>
                                        <td>{{ $pick->rnd }}</td>
                                        <td>{{ $pick->name }}</td>
                                        <td><strong class="text-white">{{ $pick->teamname }}</strong></td>
                                        <td>{{ $pick->points }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        
                    </div>
                  
                  </div>
            </div>
        </div>
        <div class="tab-pane fade" id="PoepleWhoJoined-tab-pane" role="tabpanel" aria-labelledby="PoepleWhoJoined-tab" tabindex="0">
            <h1 class="mt-5">Pool Users</h1>
            <div class="row">
                <div class="col-md-12">
                    <table id="poolUsersTable" class="custom-table table table-striped table-bordered table-td-valign-middle">
                        <thead class="thead-info">
                            <tr>
                                {{-- <th scope="col">Pool ID</th> --}}
                                <th scope="col">User Name</th>
                                <th scope="col">Pool Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($joinedUsers as $joinedUser)
                            <tr>
                                {{-- <td>{{ $poolDetails->id }}</td> --}}
                                <td>{{ $joinedUser->first_name }} {{ $joinedUser->last_name }}</td>
                                <td>{{ $poolDetails->pool_name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        {{-- <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">...</div> --}}
      </div>
       
    </div>
 
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

  <script src="{{asset('assets/js/plugin/datatables/datatables.min.js')}}"></script>

 
{{-- <script>$(document).ready(function() {
    var created_pool_id = '{{ $created_pool_id }}'; // Ensure this is correctly assigned from your PHP variable

    $('.team-box').click(function() {
        var round = $(this).find('strong').text().trim();
        var teamCreatedPoolId = $(this).data('created-pool-id'); // Ensure this matches how you set 'data-created-pool-id' in your HTML

        console.log(teamCreatedPoolId);

        var selectedTeamsInRound = $('.team-box.selected').filter(function() {
            return $(this).find('strong').text().trim() === round &&
                   $(this).data('created-pool-id') === teamCreatedPoolId;
        }).length;

        if (selectedTeamsInRound >= 3 && !$(this).hasClass('selected')) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'You can only select three teams per round.',
            });
            return;
        }

        $(this).toggleClass('selected');
    });

    $('#team-selection-form').submit(function(event) {
        event.preventDefault();

        var selectedTeams = [];
        var totalSelectedByRound = {};

        $('.team-box.selected').each(function(index) {
            var teamId = $(this).data('team-id');
            var teamName = $(this).find('h4').text().trim();
            var rnd = $(this).find('strong').text().trim();
            var created_pool_id = $(this).data('created-pool-id');

            if (!totalSelectedByRound[rnd]) {
                totalSelectedByRound[rnd] = 0;
            }
            totalSelectedByRound[rnd]++;
            selectedTeams.push({ id: teamId, name: teamName, rounds: rnd, created_pool_id: created_pool_id, priority: index + 1 });
        });

        for (var rnd in totalSelectedByRound) {
            var roundTeams = selectedTeams.filter(function(team) {
                return team.rounds === rnd;
            });
            var roundPoolTeams = roundTeams.filter(function(team) {
                return team.created_pool_id === created_pool_id;
            });

            if (roundPoolTeams.length > 3) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'You can only select three teams per round and pool.',
                    showConfirmButton: false,
                    timer: 2000
                });
                return;
            }
        }

        var points = [6, 4, 2]; // Points array as per your requirement

        $.ajax({
            url: "{{ route('submit-picks') }}",
            method: 'POST',
            data: {
                teams: selectedTeams,
                points: points,
                created_pool_id: created_pool_id, // Ensure 'created_pool_id' is included in the AJAX request
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log(response);
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Picks submitted successfully',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                    window.location.href = '{{ route("myPicks") }}';
                });
            },
            error: function(xhr) {
                console.error(xhr);
                var errorMessage = xhr.responseJSON && xhr.responseJSON.error ? xhr.responseJSON.error : 'An unexpected error occurred while submitting picks.';
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: errorMessage,
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        });
    });
});
</script> --}}
    
<script>
    $(document).ready(function() {
        var created_pool_id = '{{ $created_pool_id }}'; // Ensure this is correctly assigned from your PHP variable
    
        $('.team-box').click(function() {
            var round = $(this).find('strong').text().trim();
            var teamCreatedPoolId = $(this).data('created-pool-id'); // Ensure this matches how you set 'data-created-pool-id' in your HTML
            var teamId = $(this).data('team-id');
    
            console.log(teamCreatedPoolId);
    
            var selectedTeamsInRound = $('.team-box.selected').filter(function() {
                return $(this).find('strong').text().trim() === round &&
                       $(this).data('created-pool-id') === teamCreatedPoolId;
            }).length;
    
            var isDuplicateTeam = $('.team-box.selected').filter(function() {
                return $(this).find('strong').text().trim() === round &&
                       $(this).data('team-id') === teamId;
            }).length > 0;
    
            if (isDuplicateTeam && !$(this).hasClass('selected')) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You have already picked this team in round ' + round + '.',
                });
                return;
            }
    
            if (selectedTeamsInRound >= 3 && !$(this).hasClass('selected')) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You can only select three teams per round.',
                });
                return;
            }
    
            $(this).toggleClass('selected');
        });
    
        $('#team-selection-form').submit(function(event) {
            event.preventDefault();
    
            var selectedTeams = [];
            var totalSelectedByRound = {};
    
            $('.team-box.selected').each(function(index) {
                var teamId = $(this).data('team-id');
                var teamName = $(this).find('h4').text().trim();
                var rnd = $(this).find('strong').text().trim();
                var created_pool_id = $(this).data('created-pool-id');
    
                if (!totalSelectedByRound[rnd]) {
                    totalSelectedByRound[rnd] = 0;
                }
                totalSelectedByRound[rnd]++;
                selectedTeams.push({ id: teamId, name: teamName, rounds: rnd, created_pool_id: created_pool_id, priority: index + 1 });
            });
    
            for (var rnd in totalSelectedByRound) {
                var roundTeams = selectedTeams.filter(function(team) {
                    return team.rounds === rnd;
                });
                var roundPoolTeams = roundTeams.filter(function(team) {
                    return team.created_pool_id === created_pool_id;
                });
    
                if (roundPoolTeams.length > 3) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'You can only select three teams per round and pool.',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    return;
                }
            }
    
            var points = [6, 4, 2]; // Points array as per your requirement
    
            $.ajax({
                url: "{{ route('submit-picks') }}",
                method: 'POST',
                data: {
                    teams: selectedTeams,
                    points: points,
                    created_pool_id: created_pool_id, // Ensure 'created_pool_id' is included in the AJAX request
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response);
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Picks submitted successfully',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function() {
                        window.location.href = '{{ route("myPicks") }}';
                    });
                },
                error: function(xhr) {
                    console.error(xhr);
                    var errorMessage = xhr.responseJSON && xhr.responseJSON.error ? xhr.responseJSON.error : 'An unexpected error occurred while submitting picks.';
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: errorMessage,
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            });
        });
    });
    </script>
    


<script>
    $(document).ready(function () {
      $("#basic-datatables").DataTable({});

      $("#multi-filter-select").DataTable({
        pageLength: 5,
        initComplete: function () {
          this.api()
            .columns()
            .every(function () {
              var column = this;
              var select = $(
                '<select class="form-select"><option value=""></option></select>'
              )
                .appendTo($(column.footer()).empty())
                .on("change", function () {
                  var val = $.fn.dataTable.util.escapeRegex($(this).val());

                  column
                    .search(val ? "^" + val + "$" : "", true, false)
                    .draw();
                });

              column
                .data()
                .unique()
                .sort()
                .each(function (d, j) {
                  select.append(
                    '<option value="' + d + '">' + d + "</option>"
                  );
                });
            });
        },
      });

      // Add Row
      $("#add-row").DataTable({
        pageLength: 5,
      });

      var action =
        '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

      $("#addRowButton").click(function () {
        $("#add-row")
          .dataTable()
          .fnAddData([
            $("#addName").val(),
            $("#addPosition").val(),
            $("#addOffice").val(),
            action,
          ]);
        $("#addRowModal").modal("hide");
      });
    });
</script>
</body>

</html>
