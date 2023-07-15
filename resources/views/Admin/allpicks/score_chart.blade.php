<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Rugby Portal</title>

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
            <ol class="breadcrumb float-xl-right">
                <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                <li class="breadcrumb-item active">Create Score Chart</li>
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Create Score Chart</h1>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($errors && count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- end page-header -->
            <!-- begin wizard-form -->
            <form action="{{ route('save_score_chart', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data" class="form-control-with-bg">

                @csrf
                <!-- begin wizard -->
                <div id="wizard">
                    <!-- begin wizard-step -->
                    <ul>
                        <li>
                            <a href="#step-1">
                                <span class="number">1</span>
                                <span class="info">
                                    Details
                                    <small>Score Chart</small>
                                </span>
                            </a>
                        </li>

                    </ul>
                    <!-- end wizard-step -->
                    <!-- begin wizard-content -->
                    <div>
                        <!-- begin step-1 -->
                        <div id="step-1">
                            <!-- begin fieldset -->
                            <fieldset>
                                <!-- begin row -->
                                <div class="row">
                                    <!-- begin col-8 -->
                                    <div class="col-xl-8 offset-xl-2">
                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Set Scores</legend>
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">Round 1<span class="text-danger"></span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input type="number" name="round1" placeholder="Set Round 1" data-parsley-group="step-1" data-parsley-required="true" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">Round 2</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input type="number" name="round2" placeholder="Set Round 2" data-parsley-group="step-1" data-parsley-required="true" class="form-control" />
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <!-- <div class="form-group row m-b-10">
                                            <label class="col-lg-3 text-lg-right col-form-label">Total</label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input type="number" name="total" placeholder="Total" data-parsley-group="step-1" data-parsley-required="true" class="form-control" />
                                            </div>
                                        </div> -->


                                        <div class="d-flex justify-content-center">
                                            <button class="btn btn-primary">Submit</button>
                                        </div>

                                        <!-- end form-group -->
                                    </div>
                                    <!-- end col-8 -->
                                </div>
                                <!-- end row -->
                            </fieldset>
                            <!-- end fieldset -->
                        </div>
                        <!-- end step-1 -->

                        <!-- end step-4 -->
                    </div>

                    <!-- end wizard-content -->
                </div>
                <!-- end wizard -->
            </form>
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

