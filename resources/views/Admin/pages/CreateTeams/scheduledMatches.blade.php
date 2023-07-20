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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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

                        <table id="data-table-"
    class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Team 1</th>
            <th scope="col"></th>
            <th scope="col">Team 2</th>
            <th scope="col">Action</th>

        </tr>
    </thead>
    <tbody>
    @foreach($scheduledMatches as $match)
    <tr>
        <td>{{ $match->id }}</td>
        <td><b>{{ $match->team1_name }}</b></td>
        <td><b class="text-danger">VS</b></td>
        <td><b>{{ $match->team2_name }}</b></td>
        <td>
    <form action="{{ route('matches.destroy', $match->id) }}" method="post" id="deleteForm_{{ $match->id }}">
        @csrf
        @method('DELETE')
        <button type="button" class="btn btn-danger deleteBtn" data-id="{{ $match->id }}"><i class="fa-sharp fa-solid fa-trash" style="color: #f5f9ff;"></i></button>
    </form>
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



<script>
    // Function to handle the delete action
    function handleDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this match!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById(`deleteForm_${id}`);
                form.submit();
            }
        });
    }

    // Add event listeners to the delete buttons
    const deleteButtons = document.querySelectorAll('.deleteBtn');
    deleteButtons.forEach((button) => {
        button.addEventListener('click', function() {
            const matchId = this.getAttribute('data-id');
            handleDelete(matchId);
        });
    });

    // Show success message if available
    @if (session('success'))
        Swal.fire({
            title: 'Success!',
            text: '{{ session("success") }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    @endif
</script>
    <!-- ================== END PAGE LEVEL JS ================== -->
</body>

</html>
