<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Rugby Portal</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="{{asset('adminassets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}"
        rel="stylesheet" />
    <link href="{{asset('adminassets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="{{ asset("adminassets/css/google/app.min.css") }}" rel="stylesheet" />

<!-- ================== END BASE CSS STYLE ================== -->

<!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
<link href="{{ asset("adminassets/plugins/jvectormap-next/jquery-jvectormap.css") }}" rel="stylesheet" />
<link href="{{ asset("adminassets/plugins/bootstrap-calendar/css/bootstrap_calendar.css") }}" rel="stylesheet" />
<link href="{{ asset("adminassets/plugins/gritter/css/jquery.gritter.css") }}" rel="stylesheet" />
<link href="{{ asset("adminassets/plugins/nvd3/build/nv.d3.css") }}" rel="stylesheet" />

</head>

<body>
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade show">
        <span class="spinner"></span>
    </div>
    <!-- end #page-loader -->

    <!-- begin #page-container -->
    <div id="page-container"
        class="fade page-sidebar-fixed page-header-fixed page-with-wide-sidebar page-with-light-sidebar">
        <!-- begin #header -->
        @include('Admin.includes.header')
        <!-- end #header -->

        <!-- begin #sidebar -->
        @include('Admin.includes.sidebar')
        <!-- end #sidebar -->

        <!-- begin #content -->
        <div id="content" class="content">
            <!-- begin breadcrumb -->

            <!-- end breadcrumb -->
            <!-- begin page-header -->
            {{-- <h1 class="page-header">Rugby Portal Dashboard </h1> --}}
            <!-- end page-header -->
            <!-- begin row -->
            <div class="row">
                <!-- begin col-3 -->
                {{-- @include('Admin.includes.misPoints') --}}
                <!-- end col-3 -->
            </div>
            <!-- end row -->
            <div id="content" class="">
                <!-- begin breadcrumb -->
                <ol class="breadcrumb float-xl-right">
                    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">Tables</a></li>
                    <li class="breadcrumb-item active">Managed Tables</li>
                </ol>
                <!-- end breadcrumb -->
                <!-- begin page-header -->
                <div class="row">
                    <div class="col-lg-12">
                        <h4>All Users Picks</h4>
                        @if (session('msg'))
                        <div class="col-sm-6 mx-auto alert alert-primary" style="text-align: center;  font-size:20px">
                            <b>{{ session('msg') }}</b>
                        </div>
                        @endif
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                    </div>
                </div>
                <!-- end page-header -->
                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <!-- begin panel-heading -->
                    <div class="panel-heading">
                        <h4 class="panel-title">Data Table - Default</h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                                data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                                data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                                data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                                data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <!-- end panel-heading -->

                    <!-- begin panel-body -->
                    <div class="panel-body">

                        <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Round 1</th>
                                    <th scope="col">Round 2</th>
                                    <th scope="col">Round 3</th>
                                    <th scope="col">Points 6</th>
                                    <th scope="col">Points 4</th>
                                    <th scope="col">Points 2</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key => $user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->first_name ?? 'Null' }}</td>
                        
                                    <!-- Columns for Round 1, Round 2, and Round 3 -->
                                    @php
                                        $round1Points = 0;
                                        $round2Points = 0;
                                        $round3Points = 0;
                                    @endphp
                                    @foreach(['round1', 'round2', 'round3'] as $round)
                                        <td>
                                            @php
                                                $teamname = null;
                                                $roundPoints = 0;
                                                foreach($user->picks as $pick) {
                                                    // printf($pick);
                                                    if ($pick->$round) {
                                                        $teamname = $pick->$round;
                                                        // Assign round points based on the current round
                                                        $round1Points = $pick->round1;
                                                        $round2Points = $pick->round2;
                                                        $round3Points = $pick->round3;
                                                        // Add to the total round points based on the current round
                                                        if ($round == 'round1') {
                                                            $round1Points = $round1Points;
                                                        } elseif ($round == 'round2') {
                                                            $round2Points = $round2Points;
                                                        } elseif ($round == 'round3') {
                                                            $round3Points = $round3Points;
                                                        }
                                                        // printf( $round3Points);
                                                        break;
                                                    }
                                                }
                                            @endphp
                                            <p>{{ $teamname ?? 'Null' }}</p>
                                        </td>
                                    @endforeach
                        
                                    <!-- Columns for Points 6, Point 4, and Point 2 -->
                                    @foreach([6, 4, 2] as $points)
                                        @php
                                            $pickedTeam = $user->picks->where('points', $points)->first()->teamname ?? 'Null';
                                            $pointsValue = $user->picks->where('points', $points)->first()->points ?? 0;
                                        @endphp
                                        <td style="{{ in_array($pickedTeam, $matches->pluck('winnerTeam')->toArray()) ? 'color: black;' : '' }}">
                                            <p>{{ $pickedTeam }} ({{ $pointsValue }})</p>
                                        </td>
                                    @endforeach
                        
                                    <!-- Column for Total -->
                                    <td>
                                        @php
                                            $totalPoints = 
                                                $user->picks->where('points', 6)->sum('points') +
                                                $user->picks->where('points', 4)->sum('points') +
                                                $user->picks->where('points', 2)->sum('points') +
                                                $round1Points +
                                                $round2Points +
                                                $round3Points;
                                        @endphp
                                        <p>{{ $totalPoints }}</p>
                                    </td>
                        
                                    <!-- Action Column -->
                                    <td>
                                        <a href="{{ route('score_chart_form', ['id' => $user->id]) }}">
                                            <button class="btn btn-primary">Edit</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                        
                        
                        
                        
                        

                    </div>
                    <!-- end panel-body -->
                </div>
                <!-- end panel -->
            </div>
            <!-- begin row -->

            <!-- end row -->
        </div>
        <!-- end #content -->

        <!-- begin scroll to top btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade"
            data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
        <!-- end scroll to top btn -->
    </div>
    <!-- end page container -->
    {{-- Modal For rejection --}}
    <div class="modal fade" id="rejectionModal" tabindex="-1" role="dialog" aria-labelledby="Rejection Modal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Rejection Reason</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/toggle-reject') }}" method="POST">
                    @csrf
                    <input type="hidden" name="ticket_id" id="ticket_id" value="">
                    <div class="modal-body">
                        <div class="form-row">
                            <textarea name="reason" class="form-control" placeholder="Please Enter reason for rejection"
                                required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Reject</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal for rejectio end --}}
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{ asset("adminassets/js/app.min.js") }}"></script>
<script src="{{ asset("adminassets/js/theme/google.min.js") }}"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{{ asset('adminassets/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminassets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminassets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminassets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminassets/js/demo/table-manage-default.demo.js') }}"></script>
<script src="{{ asset('adminassets/plugins/d3/d3.min.js') }}"></script>
<script src="{{ asset('adminassets/plugins/nvd3/build/nv.d3.min.js') }}"></script>
<script src="{{ asset('adminassets/plugins/jvectormap-next/jquery-jvectormap.min.js') }}"></script>
<script src="{{ asset('adminassets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js') }}"></script>
<script src="{{ asset('adminassets/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js') }}"></script>
<script src="{{ asset('adminassets/plugins/gritter/js/jquery.gritter.js') }}"></script>

    <script>
        COLOR_BLUE = COLOR_INDIGO = COLOR_RED = COLOR_ORANGE = COLOR_LIME = COLOR_TEAL = 'rgba(0,0,0,0.5)';
		COLOR_AQUA = COLOR_DARK_LIGHTER = COLOR_GREEN = 'rgba(0,0,0,0.75)';
    </script>

    <script src="{{asset(" adminassets/js/demo/dashboard-v2.js")}}"></script>
    <script>
        $('#rejectionModal').on('show.bs.modal', function (e) {
            $("#ticket_id").val($(e.relatedTarget).data('id'));
        });
    </script>
    <!-- ================== END PAGE LEVEL JS ================== -->
</body>

</html>
