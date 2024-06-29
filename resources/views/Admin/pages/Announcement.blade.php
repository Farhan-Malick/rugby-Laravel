<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Rugby Admin | Dashboard V2</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />

	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
	<link href="{{asset("adminassets/css/google/app.min.css")}}" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->

	<!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
	<link href="{{asset("adminassets/plugins/jvectormap-next/jquery-jvectormap.css")}}" rel="stylesheet" />
            <link href="{{asset("adminassets/plugins/bootstrap-calendar/css/bootstrap_calendar.css")}}" rel="stylesheet" />
            <link href="{{asset("adminassets/plugins/gritter/css/jquery.gritter.css")}}"  rel="stylesheet" />
            <link href="{{asset("adminassets/plugins/nvd3/build/nv.d3.css")}}"  rel="stylesheet" />
            <link href="{{ asset('adminassets/plugins/smartwizard/dist/css/smart_wizard.css') }}" rel="stylesheet" />
            <link href="{{ asset('adminassets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css') }}"
                rel="stylesheet" />
            <link href="{{ asset('adminassets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css') }}"
                rel="stylesheet" />
            <link href="{{ asset('adminassets/plugins/ion-rangeslider/css/ion.rangeSlider.min.css') }}" rel="stylesheet" />
            <link href="{{ asset('adminassets/plugins/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}"
                rel="stylesheet" />
            <link href="{{ asset('adminassets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}"
                rel="stylesheet" />
            <link href="{{ asset('adminassets/plugins/@danielfarrell/bootstrap-combobox/css/bootstrap-combobox.css') }}"
                rel="stylesheet" />
            <link href="{{ asset('adminassets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css') }}"
                rel="stylesheet" />
            <link href="{{ asset('adminassets/plugins/tag-it/css/jquery.tagit.css') }}" rel="stylesheet" />
            <link href="{{ asset('adminassets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
            <link href="{{ asset('adminassets/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
            <link
                href="{{ asset('adminassets/plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}"
                rel="stylesheet" />
            <link href="{{ asset('adminassets/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css') }}"
                rel="stylesheet" />
            <link href="{{ asset('adminassets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.css') }}"
                rel="stylesheet" />
            <link href="{{ asset('adminassets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-fontawesome.css') }}"
                rel="stylesheet" />
    <link href="{{ asset('adminassets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-glyphicons.css') }}"
        rel="stylesheet" />
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show">
		<span class="spinner"></span>
	</div>
	<!-- end #page-loader -->

	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed page-with-wide-sidebar page-with-light-sidebar">
		<!-- begin #header -->
        @include('Admin.includes.header')
		<!-- end #header -->

		<!-- begin #sidebar -->
		@include('Admin.includes.sidebar')
		<!-- end #sidebar -->

		<!-- begin #content -->
        <style>
            .winner {
                border: 2px solid green;
            }
            .winner-announced {
                    /* Add any additional styles for the announced state */
                    background-color: red;
                    color: white;
                    /* You can customize this further based on your design preferences */
                }
        </style>
		        
                <div id="content" class="content">
                    <div id="team-selection-form">
                        <form action="{{ route('pick-teams') }}" method="post" id="team-selection-form">
                            @csrf
                            @foreach($scheduledMatches as $match)
                            <div class="container">
                                <div class="row mb-5">
                                    <!-- Team 1 -->
                                    <div class="col-md-5 border 1px p-3 team-box team-selection" data-team-id="{{ $match->team1_id }}" style="border-radius: 10px;">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img id="teamImage" src="{{ asset('uploads/Teams/thumbnail/'. $match->team1_image) }}" alt="image" style="border-radius: 10px; margin-left:50px" height="50px">
                                            </div>
                                            <div class="col-md-8">
                                                <h4 class="text-dark">{{ $match->team1_name }} (Round {{ $match->rounds }})</h4>
                                               
                                            </div>
                                        </div>
                                        <p class="text-center">
                                            <input type="radio" name="winner_team_id" value="{{ $match->team1_id }}" 
                                            @if(session()->has('winner_team_id_'. $match->id) && session('winner_team_id_'. $match->id) == $match->team1_id) 
                                            checked @endif required onclick="updateMatchId({{ $match->id }})">
                                            @foreach($matches as $announcement)
                                                @if($announcement->match_id == $match->id && $announcement->winning_team_id == $match->team1_id)
                                                   <b> <span class="text-success" style="font-size: 20px;">WINNER</span></b>
                                                @endif
                                            @endforeach
                                        </p>
                                    </div>
                        
                                    <div class="col-md-2 text-center">
                                        <span class="vs">VS</span>
                                    </div>
                        
                                    <!-- Team 2 -->
                                    <div class="col-md-5 border 1px p-3 team-box team-selection" data-team-id="{{ $match->team2_id }}" style="border-radius: 10px;">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="{{ asset('uploads/Teams/thumbnail/'. $match->team2_image) }}" alt="" style="border-radius: 10px; margin-left:50px" height="50px">
                                            </div>
                                            <div class="col-md-8">
                                                <h4 class="text-dark">{{ $match->team2_name }} (Round {{ $match->rounds }})</h4>
                                                
                                            </div>
                                        </div>
                                        <p class="text-center">
                                            <input type="radio" name="winner_team_id" value="{{ $match->team2_id }}" @if(session()->has('winner_team_id_'. $match->id) && session('winner_team_id_'. $match->id) == $match->team2_id) checked @endif required onclick="updateMatchId({{ $match->id }})">
                                                @foreach($matches as $announcement)
                                                        @if($announcement->match_id == $match->id && $announcement->winning_team_id == $match->team2_id)
                                                        <b> <span class="text-success" style="font-size: 20px;">WINNER</span></b>
                                                        @endif
                                                @endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                                <!-- Hidden input for dynamically updated match_id -->
                                <input type="hidden" name="match_id" id="match_id" value="">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-secondary select-team w-50">Submit</button>
                                </div>
                        </form>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            updateAnnouncedMatches();
                        });
                    
                        function announceWinner(matchId) {
                            const round = $(`div[data-team-id="${matchId}"]`).closest('.row').find('h4').text().split('(')[1].split(')')[0];
                    
                            $.ajax({
                                type: 'POST',
                                url: '{{ route('announce-winner') }}',
                                data: {
                                    match_id: matchId,
                                    winner_team_id: $(`input[name="winner_team_id"][value="${matchId}"]:checked`).val(),
                                    round: round,
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(response) {
                                    if (response.success) {
                                        alert('Winner announced successfully!');
                                        updateButtonAppearance(matchId);
                                        saveAnnouncedMatches(); // Update local storage
                                    } else {
                                        alert('Failed to announce winner.');
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.error(xhr.responseText);
                                }
                            });
                        }
                    
                        function updateButtonAppearance(matchId) {
                            $('.announce-winner[data-match-id="' + matchId + '"]').prop('disabled', true);
                            $('.announce-winner[data-match-id="' + matchId + '"]').addClass('winner-announced');
                            $('.announce-winner[data-match-id="' + matchId + '"]').removeClass('btn-primary').addClass('btn-success');
                        }
                    
                        function updateMatchId(matchId) {
                            document.getElementById('match_id').value = matchId;
                        }
                    
                        function saveAnnouncedMatches() {
                            const announcedMatches = [];
                            $('.winner-announced').each(function() {
                                announcedMatches.push($(this).data('match-id'));
                            });
                            localStorage.setItem('announcedMatches', JSON.stringify(announcedMatches));
                        }
                    
                        function updateAnnouncedMatches() {
                            const announcedMatches = JSON.parse(localStorage.getItem('announcedMatches')) || [];
                            announcedMatches.forEach(function(matchId) {
                                updateButtonAppearance(matchId);
                            });
                        }
                    </script>
                    
                    {{-- <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            updateAnnouncedMatches();
                        });
                
                        function announceWinner(matchId) {
                            const round = $(`div[data-team-id="${matchId}"]`).closest('.row').find('h4').text().split('(')[1].split(')')[0];

                            $.ajax({
                                type: 'POST',
                                url: '{{ route('announce-winner') }}',
                                data: {
                                match_id: matchId,
                                winner_team_id: $(`input[name="winner_team_id"][value="${matchId}"]`).val(),
                                round: round, // Add the round to the data
                                _token: '{{ csrf_token() }}'
                                },
                                success: function(response) {
                                if (response.success) {
                                    alert('Winner announced successfully!');
                                    updateButtonAppearance(matchId);
                                    saveAnnouncedMatches();
                                } else {
                                    alert('Failed to announce winner.');
                                }
                                },
                                error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                                }
                            });
                        }
                        function updateButtonAppearance(matchId) {
                            $('.announce-winner[data-match-id="' + matchId + '"]').prop('disabled', false);
                            $('.announce-winner[data-match-id="' + matchId + '"]').addClass('winner-announced');
                            $('.announce-winner[data-match-id="' + matchId + '"]').removeClass('btn-primary').addClass('btn-success');
                        }
                
                        function updateMatchId(matchId) {
                            document.getElementById('match_id').value = matchId;
                        }
                        function saveAnnouncedMatches() {
                            const announcedMatches = [];
                            $('.winner-announced').each(function() {
                                // Get the round from the HTML element
                                const round = $(this).closest('.row').find('h4').text().split('(')[1].split(')')[0];
                                announcedMatches.push({
                                match_id: $(this).data('match-id'), 
                                round: round 
                                });
                            });
                            localStorage.setItem('announcedMatches', JSON.stringify(announcedMatches));
                        }
                
                        function updateAnnouncedMatches() {
                            const announcedMatches = JSON.parse(localStorage.getItem('announcedMatches')) || [];
                            announcedMatches.forEach(function(matchId) {
                                updateButtonAppearance(matchId);
                            });
                        }
                    </script> --}}
                
                    <h1>Match Record</h1>
                    <div class="row mb-5">
                        <div class="col-lg-12">
                
                          <div class="widget-next-match">
                            {{-- <table class="table custom-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Match</th>
                                        <th>Winner</th>
                                        <th>Looser</th>
                                        <th>Bonus of Team1</th>
                                        <th>Bonus of Team2</th>
                                        <th>Winner Score</th>
                                        <th>Looser Score</th>
                                        <th>With Bonus</th>
                                        <th>Actual Winner</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-dark">
                                    @foreach($matches as $match)
                                    <tr>
                                        <td>{{ $match->id }}</td>
                                        <td>{{ $match->team1_name }} vs {{ $match->team2_name }}</td>
                                        <td class="text-success">{{ $match->winnerTeam }}</td>
                                        <td class="text-danger"><b>{{ $match->looserTeam }}</b></td>
                                        
                                        <td>{{ $match->bonus_team1 }}  <b>({{$match->bonus_points_team1}})</td>
                                        <td>{{ $match->bonus_team2 }}  <b>({{$match->bonus_points_team2}})</td>
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
                                        <td>
                                            <a href="{{ route('editTeamScores', $match->id) }}">
                                                <button class="btn btn-secondary">Update Scores</button>
                                            </a>
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-dark">
                                    @foreach($matches as $match)
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
                                        <td>
                                            <a href="{{ route('editTeamScores', $match->id) }}">
                                                <button class="btn btn-secondary">Update Scores</button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                            
                            
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                









               
                <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
                <!-- end scroll to top btn -->
        </div>
	<!-- end page container -->
 
     
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{asset("adminassets/js/app.min.js")}}"></script>
	<script src="{{asset("adminassets/js/theme/google.min.js")}}"></script>
	<!-- ================== END BASE JS ================== -->

	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{asset("adminassets/plugins/d3/d3.min.js")}}"></script>
            <script src="{{asset("adminassets/plugins/nvd3/build/nv.d3.min.js")}}"></script>
            <script src="{{asset("adminassets/plugins/jvectormap-next/jquery-jvectormap.min.js")}}"></script>
            <script src="{{asset("adminassets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js")}}"></script>
            <script src="{{asset("adminassets/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js")}}"></script>
            <script src="{{asset("adminassets/plugins/gritter/js/jquery.gritter.js")}}"></script>
            <script src="{{ asset('adminassets/plugins/parsleyjs/dist/parsley.js') }}"></script>
            <script src="{{ asset('adminassets/plugins/smartwizard/dist/js/jquery.smartWizard.js') }}"></script>
            <script src="{{ asset('adminassets/js/demo/form-wizards-validation.demo.js') }}"></script>
            <script src="{{ asset('adminassets/plugins/jquery-migrate/dist/jquery-migrate.min.js') }}"></script>
            <script src="{{ asset('adminassets/plugins/moment/min/moment.min.js') }}"></script>
            <script src="{{ asset('adminassets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}"></script>
            <script src="{{ asset('adminassets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
            <script src="{{ asset('adminassets/plugins/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
            <script src="{{ asset('adminassets/plugins/jquery.maskedinput/src/jquery.maskedinput.js') }}"></script>
            <script src="{{ asset('adminassets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
            <script src="{{ asset('adminassets/plugins/pwstrength-bootstrap/dist/pwstrength-bootstrap.min.js') }}"></script>
            <script src="{{ asset('adminassets/plugins/@danielfarrell/bootstrap-combobox/js/bootstrap-combobox.js') }}"></script>
            <script src="{{ asset('adminassets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
            <script src="{{ asset('adminassets/plugins/tag-it/js/tag-it.min.js') }}"></script>
            <script src="{{ asset('adminassets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
            <script src="{{ asset('adminassets/plugins/select2/dist/js/select2.min.js') }}"></script>
            <script
                src="{{ asset('adminassets/plugins/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}">
            </script>
            <script src="{{ asset('adminassets/plugins/bootstrap-show-password/dist/bootstrap-show-password.js') }}"></script>
            <script src="{{ asset('adminassets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js') }}"></script>
            <script src="{{ asset('adminassets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.js') }}"></script>
            <script src="{{ asset('adminassets/plugins/clipboard/dist/clipboard.min.js') }}"></script>
            <script src="{{ asset('adminassets/js/demo/form-plugins.demo.js') }}"></script>

            <script src="{{ asset('adminassets/plugins/ckeditor/ckeditor.js') }}"></script>
            <script src="{{ asset('adminassets/plugins/bootstrap3-wysihtml5-bower/dist/bootstrap3-wysihtml5.all.min.js') }}">
            </script>
            <script src="{{ asset('adminassets/js/demo/form-wysiwyg.demo.js') }}"></script>
            <script>
                COLOR_BLUE = COLOR_INDIGO = COLOR_RED = COLOR_ORANGE = COLOR_LIME = COLOR_TEAL = 'rgba(0,0,0,0.5)';
                COLOR_AQUA = COLOR_DARK_LIGHTER = COLOR_GREEN = 'rgba(0,0,0,0.75)';
            </script>

	<script src="{{asset("adminassets/js/demo/dashboard-v2.js")}}"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
</body>
</html>

