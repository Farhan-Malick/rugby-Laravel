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
	<link href="{{asset('adminassets/css/google/app.min.css')}}" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->

	<!-- ================== BEGIN PAGE LEVEL CSS STYLE ================== -->
	<link href="{{asset('adminassets/plugins/jvectormap-next/jquery-jvectormap.css')}}" rel="stylesheet" />
	<link href="{{asset('adminassets/plugins/bootstrap-calendar/css/bootstrap_calendar.css')}}" rel="stylesheet" />
	<link href="{{asset('adminassets/plugins/gritter/css/jquery.gritter.css')}}" rel="stylesheet" />
	<link href="{{asset('adminassets/plugins/nvd3/build/nv.d3.css')}}" rel="stylesheet" />
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
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->

		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
				<li class="breadcrumb-item active">Dashboard v2</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Rugby Dashboard</h1>
			<!-- end page-header -->
			<!-- begin row -->
			<div class="row">
                @include('Admin.includes.misPoints')
			</div>

				<!-- end row -->
			<!-- begin row -->
			{{-- <div class="row">
				<!-- begin col-8 -->
				<div class="col-xl-8">
					<div class="widget-chart with-sidebar inverse-mode">
						<div class="widget-chart-content bg-blue">
							<h4 class="chart-title">
								Visitors Analytics
								<small class="text-white">Where do our visitors come from</small>
							</h4>
							<div id="visitors-line-chart" class="widget-chart-full-width nvd3-inverse-mode" style="height: 270px;"></div>
						</div>
						<div class="widget-chart-sidebar bg-blue-darker">
							<div class="chart-number">
								1,225,729
								<small class="text-white">Total visitors</small>
							</div>
							<div class="flex-grow-1 d-flex align-items-center">
								<div id="visitors-donut-chart" class="nvd3-inverse-mode" style="height: 180px"></div>
							</div>
							<ul class="chart-legend f-s-12">
								<li><i class="fa fa-circle fa-fw text-inverse-transparent-8 f-s-9 m-r-5 t-minus-1"></i> 34.0% <span class="text-white">New Visitors</span></li>
								<li><i class="fa fa-circle fa-fw text-inverse-transparent-5 f-s-9 m-r-5 t-minus-1"></i> 56.0% <span class="text-white">Return Visitors</span></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end col-8 -->
				<!-- begin col-4 -->
				<div class="col-xl-4">
					<div class="panel panel-primary" data-sortable-id="index-1">
						<div class="panel-heading bg-blue">
							<h4 class="panel-title">
								Visitors Origin
							</h4>
						</div>
						<div id="visitors-map" class="bg-blue" style="height: 179px;"></div>
						<div class="list-group">
							<a href="javascript:;" class="list-group-item list-group-item-action list-group-item-inverse bg-blue border-top-0 border-bottom-0 d-flex justify-content-between align-items-center text-ellipsis">
								1. United State
								<span class="badge bg-white text-blue f-s-12">20.95%</span>
							</a>
							<a href="javascript:;" class="list-group-item list-group-item-action list-group-item-inverse bg-blue border-top-0 border-bottom-0 d-flex justify-content-between align-items-center text-ellipsis">
								2. India
								<span class="badge bg-white text-blue f-s-12">16.12%</span>
							</a>
							<a href="javascript:;" class="list-group-item list-group-item-action list-group-item-inverse bg-blue border-top-0 border-bottom-0 d-flex justify-content-between align-items-center text-ellipsis">
								3. Mongolia
								<span class="badge bg-white text-blue f-s-12">14.99%</span>
							</a>
						</div>
					</div>
				</div>
				<!-- end col-4 -->
			</div> --}}
			<!-- end row -->
			<!-- begin row -->
			{{-- <div class="row">
			  <!-- begin col-4 -->
			  <div class="col-xl-4 col-lg-6">
					<!-- begin panel -->
					<div class="panel panel-primary" data-sortable-id="index-2">
						<div class="panel-heading">
							<h4 class="panel-title">Chat History</h4>
							<span class="label bg-white text-blue">4 message</span>
						</div>
						<div class="panel-body ">
							<div class="chats" data-scrollbar="true" data-height="225px">
								<div class="left">
									<span class="date-time">yesterday 11:23pm</span>
									<a href="javascript:;" class="name">Sowse Bawdy</a>
									<a href="javascript:;" class="image"><img alt="" src="{{asset('adminassets/img/user/user-12.jpg')}}" /></a>
									<div class="message">
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit volutpat. Praesent mattis interdum arcu eu feugiat.
									</div>
								</div>
								<div class="right">
									<span class="date-time">08:12am</span>
									<a href="javascript:;" class="name"><span class="label label-primary">ADMIN</span> Me</a>
									<a href="javascript:;" class="image"><img alt="" src="{{asset('adminassets/img/user/user-13.jpg')}}" /></a>
									<div class="message">
										Nullam posuere, nisl a varius rhoncus, risus tellus hendrerit neque.
									</div>
								</div>
								<div class="left">
									<span class="date-time">09:20am</span>
									<a href="javascript:;" class="name">Neck Jolly</a>
									<a href="javascript:;" class="image"><img alt="" src="{{asset('adminassets/img/user/user-10.jpg')}}" /></a>
									<div class="message">
										Euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
									</div>
								</div>
								<div class="left">
									<span class="date-time">11:15am</span>
									<a href="javascript:;" class="name">Shag Strap</a>
									<a href="javascript:;" class="image"><img alt="" src="{{asset('adminassets/img/user/user-14.jpg')}}" /></a>
									<div class="message">
										Nullam iaculis pharetra pharetra. Proin sodales tristique sapien mattis placerat.
									</div>
								</div>
							</div>
						</div>
						<div class="panel-footer">
							<form name="send_message_form" data-id="message-form">
								<div class="input-group">
									<input type="text" class="form-control" name="message" placeholder="Enter your message here.">
									<span class="input-group-append">
										<button class="btn btn-primary" type="button"><i class="fa fa-camera"></i></button>
										<button class="btn btn-primary" type="button"><i class="fa fa-link"></i></button>
									</span>
								</div>
							</form>
						</div>
					</div>
					<!-- end panel -->
				</div>
				<!-- end col-4 -->
				<!-- begin col-4 -->
				<div class="col-xl-4 col-lg-6">
					<!-- begin panel -->
					<div class="panel panel-primary" data-sortable-id="index-3">
						<div class="panel-heading">
							<h4 class="panel-title">Today's Schedule</h4>
						</div>
						<div id="schedule-calendar" class="bootstrap-calendar"></div>
						<div class="list-group">
							<a href="javascript:;" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center text-ellipsis bg-transparent">
								Sales Reporting
								<span class="badge bg-teal f-s-12">9:00 am</span>
							</a>
							<a href="javascript:;" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center text-ellipsis bg-transparent">
								Have a meeting with sales team
								<span class="badge bg-blue f-s-12">2:45 pm</span>
							</a>
						</div>
					</div>
					<!-- end panel -->
				</div>
				<!-- end col-4 -->
				<!-- begin col-4 -->
				<div class="col-xl-4 col-lg-6">
					<!-- begin panel -->
					<div class="panel panel-primary" data-sortable-id="index-4">
						<div class="panel-heading">
							<h4 class="panel-title">New Registered Users</h4>
							<span class="label bg-white text-blue">24 new users</span>
						</div>
						<ul class="registered-users-list">
							<li>
								<a href="javascript:;"><img src="{{asset('adminassets/img/user/user-5.jpg')}}" alt="" /></a>
								<h4 class="username text-ellipsis">
									Savory Posh
									<small>Algerian</small>
								</h4>
							</li>
							<li>
								<a href="javascript:;"><img src="{{asset('adminassets/img/user/user-3.jpg')}}" alt="" /></a>
								<h4 class="username text-ellipsis">
									Ancient Caviar
									<small>Korean</small>
								</h4>
							</li>
							<li>
								<a href="javascript:;"><img src="{{asset('adminassets/img/user/user-1.jpg')}}" alt="" /></a>
								<h4 class="username text-ellipsis">
									Marble Lungs
									<small>Indian</small>
								</h4>
							</li>
							<li>
								<a href="javascript:;"><img src="{{asset('adminassets/img/user/user-8.jpg')}}" alt="" /></a>
								<h4 class="username text-ellipsis">
									Blank Bloke
									<small>Japanese</small>
								</h4>
							</li>
							<li>
								<a href="javascript:;"><img src="{{asset('adminassets/img/user/user-2.jpg')}}" alt="" /></a>
								<h4 class="username text-ellipsis">
									Hip Sculling
									<small>Cuban</small>
								</h4>
							</li>
							<li>
								<a href="javascript:;"><img src="{{asset('adminassets/img/user/user-6.jpg')}}" alt="" /></a>
								<h4 class="username text-ellipsis">
									Flat Moon
									<small>Nepalese</small>
								</h4>
							</li>
							<li>
								<a href="javascript:;"><img src="{{asset('adminassets/img/user/user-4.jpg')}}" alt="" /></a>
								<h4 class="username text-ellipsis">
									Packed Puffs
									<small>Malaysian</small>
								</h4>
							</li>
							<li>
								<a href="javascript:;"><img src="{{asset('adminassets/img/user/user-9.jpg')}}" alt="" /></a>
								<h4 class="username text-ellipsis">
									Clay Hike
									<small>Swedish</small>
								</h4>
							</li>
						</ul>
						<div class="panel-footer text-center">
							<a href="javascript:;" class="text-inverse">View All</a>
						</div>
					</div>
					<!-- end panel -->
				</div>
				<!-- end col-4 -->
			</div> --}}

			<!-- end row -->
		</div>
		<!-- end #content -->

		<!-- begin theme-panel -->

		<!-- end theme-panel -->

		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
    <script src="{{asset('adminassets/js/app.min.js')}}"></script>
	<script src="{{asset('adminassets/js/theme/google.min.js')}}"></script>
	<!-- ================== END BASE JS ================== -->
	<script src="{{asset('adminassets/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('adminassets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('adminassets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{asset('adminassets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
	<script src="{{asset('adminassets/js/demo/table-manage-default.demo.js')}}"></script>
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{asset('adminassets/plugins/d3/d3.min.js')}}"></script>
	<script src="{{asset('adminassets/plugins/nvd3/build/nv.d3.min.js')}}"></script>
	<script src="{{asset('adminassets/plugins/jvectormap-next/jquery-jvectormap.min.js')}}"></script>
	<script src="{{asset('adminassets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js')}}"></script>
	<script src="{{asset('adminassets/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js')}}"></script>
	<script src="{{asset('adminassets/plugins/gritter/js/jquery.gritter.js')}}"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

    <script src="{{asset('adminassets/js/demo/dashboard-v2.js')}}"></script>
</body>
</html>
