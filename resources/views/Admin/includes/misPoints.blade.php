	<div class="col-xl-3 col-md-6">
					<div class="widget widget-stats bg-blue">
						<div class="stats-icon stats-icon-lg"><i class="fa fa-globe fa-fw"></i></div>
						<div class="stats-content">
							<div class="stats-title">TOTAL USERS</div>
							{{-- <div class="stats-number">{{$userCount}}</div> --}}
							<div class="stats-number">{{$users->count()}}</div>
							{{-- <div class="stats-progress progress">
								<div class="progress-bar" style="width: 70.1%;"></div>
							</div>
							<div class="stats-desc">Better than last week (70.1%)</div> --}}
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-xl-3 col-md-6">
					<div class="widget widget-stats bg-blue">
						<div class="stats-icon stats-icon-lg"><i class="fa fa-archive fa-fw"></i></div>
						<div class="stats-content">
							<div class="stats-title">Total POOLS</div>
							<div class="stats-number">{{$pools->count()}}</div>
							{{-- <div class="stats-number">{{$total_no_sold_tickets}}</div> --}}

							{{-- <div class="stats-progress progress">
								<div class="progress-bar" style="width: 76.3%;"></div>
							</div>
							<div class="stats-desc">Better than last week (76.3%)</div> --}}
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="widget widget-stats bg-blue">
						<div class="stats-icon stats-icon-lg"><i class="fa fa-dollar-sign fa-fw"></i></div>
						<div class="stats-content">
							<div class="stats-title">TOTAL CREATED POOLS</div>
							{{-- <div class="stats-number">${{$totalCompanyProfit}}</div> --}}
							<div class="stats-number">{{$created_pools->count()}}</div>
							{{-- <div class="stats-progress progress">
								<div class="progress-bar" style="width: 40.5%;"></div>
							</div>
							<div class="stats-desc">Better than last week (40.5%)</div> --}}
						</div>
					</div>
				</div>
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<!-- end col-3 -->
				<!-- begin col-3 -->
				<div class="col-xl-3 col-md-6">
					<div class="widget widget-stats bg-blue">
						<div class="stats-icon stats-icon-lg"><i class="fa fa-comment-alt fa-fw"></i></div>
						<div class="stats-content">
							<div class="stats-title">Total JOINED POOLS</div>
							{{-- <div class="stats-number">${{$price}}</div> --}}
							<div class="stats-number">{{$joined_pools->count()}}</div>
							{{-- <div class="stats-progress progress">
								<div class="progress-bar" style="width: 54.9%;"></div>
							</div>
							<div class="stats-desc">Better than last week (54.9%)</div> --}}
						</div>
					</div>
				</div>
