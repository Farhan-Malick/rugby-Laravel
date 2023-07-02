<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Last-Chance-Ticket Admin | Dashboard V2</title>
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
		<div id="content" class="content">
               <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item active">Add Pool Listing</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Add Pool Listing</h1>
    <!-- end page-header -->
    <div class="row">
        <!-- begin col-6 -->
        <div class="col-xl-12">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="form-validation-1">
                <!-- begin panel-body -->
                <div class="panel-body">
                    <div class="card shadow-sm mb-3">
                        <div class="card-body">

                            <h5
                                class="card-title fw-600 text-center"
                            >
                                Create Pool Here
                            </h5>
                            @if (session('msg'))
                                <div class="col-sm-6 mx-auto " style="text-align: center;  font-size:20px">
                                    {{ session('msg') }}</div>
                            @endif
                            <form method="post" action="{{URL('/Admin/CreatePool')}}"  enctype="multipart/form-data" >
                                @csrf
                                <div class="form-row">
                                    <div
                                        class="form-group col-md-6"
                                    >
                                        <label
                                            for="inputTitle4"
                                            >Pool Listing Name</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Enter pool Listing Name here"
                                            name="poolname"
                                        />
                                    </div>

                                </div>
                                {{-- <div class="form-row">
                                    <div
                                        class="form-group col-md-6"
                                    >
                                        <label
                                            for="inputTitle4"
                                            >Pool Date</label
                                        >
                                        <input
                                            type="date"
                                            class="form-control"
                                            placeholder="Pool Date"
                                            name="Pool_date"
                                        />
                                    </div>
                                </div> --}}


                                {{-- <div class="form-row">
                                    <div
                                        class="form-group col-md-6"
                                    >
                                        <label
                                            for="inputTitle4"
                                            >Location</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Location"
                                            name="location"
                                        />
                                    </div>

                                </div> --}}
                                <div class="form-row">
                                    <div
                                        class="form-group col-md-6"
                                    >
                                        <label
                                            for="inputTitle4"
                                            >Pool Category</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Pool Category"
                                            name="pool_category"
                                        />
                                    </div>

                                </div>
                                {{-- <div class="form-row">
                                    <div
                                        class="form-group col-md-4"
                                    >
                                        <label
                                            for="inputTitle4"
                                            >Start Time</label
                                        >
                                        <input
                                            type="time"
                                            class="form-control"
                                            placeholder="Start Time"
                                            name="start_time"
                                        />
                                    </div>
                                    <div
                                        class="form-group col-md-4"
                                    >
                                        <label
                                            for="inputTitle4"
                                            >End Time</label
                                        >
                                        <input
                                            type="time"
                                            class="form-control"
                                            placeholder="End Time"
                                            name="end_time"
                                        />
                                    </div>
                                </div> --}}
                                <div class="form-row">

                                    <div
                                        class="form-group col-md-4 mb-3"
                                    >
                                        <label
                                            for="inputState"
                                            >Status</label
                                        >
                                        <select
                                            id="inputState"
                                            class="form-control"
                                            name="status"
                                        >
                                            <option
                                                selected
                                            >
                                                Select
                                                Status
                                            </option>
                                            <option
                                                value="1"
                                            >
                                                1
                                            </option>
                                            <option
                                                value="0"
                                            >
                                                0
                                            </option>
                                        </select>
                                    </div>
                                </div>

                               <div class="form-row">
                                <div class="form-group row m-b-10">
                                    <label class="col-lg-3 text-lg-right col-form-label">Image<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        {{-- <img class=""
                                        src="{{ asset('uploads/PoolListing/'.$venues->image) }}"
                                        width="100%" alt="" height="400px"> --}}
                                    <div class="custom-file">
                                        <input type="file" name="poolimage" class="custom-file-input"
                                            id="exampleInputFile">
                                        <label class="custom-file-label"
                                            for="exampleInputFile">Choose file</label>
                                    </div>
                                    </div>
                                </div>
                               </div>
                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                >
                                    Add Pool Listing
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end panel-body -->
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-6 -->
    </div>
		</div>
		<!-- end #content -->

		<!-- begin scroll to top btn -->
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

