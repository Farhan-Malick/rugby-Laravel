{{-- @php
	$headerClass = (!empty($headerInverse)) ? 'navbar-inverse ' : 'navbar-default ';
	$headerMenu = (!empty($headerMenu)) ? $headerMenu : '';
	$headerMegaMenu = (!empty($headerMegaMenu)) ? $headerMegaMenu : ''; 
	$headerTopMenu = (!empty($headerTopMenu)) ? $headerTopMenu : '';
@endphp --}}
<!-- begin #header -->
<div id="header" class="header navbar-default">
	<!-- begin navbar-header -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed navbar-toggle-left" data-click="sidebar-minify">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a href="{{URL('/Admin-Panel')}}" class="navbar-brand">
			<b class="mr-1">Rugby Portal</b> 
		</a>
		<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<!-- end navbar-header --><!-- begin header-nav -->
	<ul class="navbar-nav d-flex flex-grow-1">
		<li class="navbar-form flex-grow-1">
			<form action="" method="POST" name="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder='Try searching "Users Today"' />
					<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
				</div>
			</form>
		</li>
		<li class="dropdown">
			<a href="#" data-toggle="dropdown" class="dropdown-toggle">
				<i class="fa fa-bell"></i>
				<!--<span class="label label-primary">5</span>-->
			</a>
			<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="{{ route('logout') }}"
				   onclick="event.preventDefault();
								 document.getElementById('logout-form').submit();">
					{{ __('Logout') }}
				</a>

				<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
					@csrf
				</form>
			</div>
		</li>
		@if (Session::get('email'))
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<img src="{{asset("AdminAssets/img/user/user-13.jpg")}}" alt="" /> 
			<span class="d-none d-md-inline">Welcome | {{ Session::get('email') }}</span> <b class="caret"></b>
		</a>
		<div class="dropdown-menu dropdown-menu-right">
			<a href="javascript:;" class="dropdown-item">Edit Profile</a>
			<a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right">2</span>
				Inbox</a>
			<a href="javascript:;" class="dropdown-item">Calendar</a>
			<a href="javascript:;" class="dropdown-item">Setting</a>
			<div class="dropdown-divider"></div>
			<a href="{{ URL('/admin/logout') }}" class="dropdown-item">Log Out</a>
		</div>
</li>
@endif
	</ul>
	<!-- end header-nav -->
</div>
<!-- end #header -->
