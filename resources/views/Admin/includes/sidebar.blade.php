<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <a href="javascript:;" data-toggle="nav-profile">
                    <div class="cover with-shadow"></div>
                    <div class="image">
                        <img src="{{asset('/adminassets/img/user/user-13.jpg')}}" alt="" />
                    </div>
                    <div class="info">
                        <b class="caret pull-right"></b>Rugby Panel
                        <small>Developed by Rugby Portal</small>
                    </div>
                </a>
            </li>
            <li>
                <ul class="nav nav-profile">
                    <li><a href="javascript:;"><i class="fa fa-cog"></i> Settings</a></li>
                    <li><a href="javascript:;"><i class="fa fa-pencil-alt"></i> Send Feedback</a></li>
                    <li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li>
                </ul>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">
            <li class="nav-header">Navigation</li>
            <li class="has-sub active">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-th-large"></i>
                    <span>Dashboard</span>
                </a>
                <ul class="sub-menu">
                    <li class="active"><a href="{{URL('/admin')}}">Dashboard v1</a></li>
                    {{-- <li><a href="index_v2.html">Dashboard v2</a></li>
                    <li><a href="index_v3.html">Dashboard v3</a></li> --}}
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <span class="badge pull-right">10</span>
                    <i class="fa fa-hdd"></i>
                    <span>Create Team</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{URL('/Admin/Teams')}}">All Teams</a></li>
                    <li><a href="{{URL('/Admin/add-Teams')}}">Add Teams</a></li>
                    {{-- <li><a href="email_detail.html">Detail</a></li> --}}
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <span class="badge pull-right">10</span>
                    <i class="fa fa-hdd"></i>
                    <span>Create Pool</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{URL('/Admin/Pool-Form')}}">Add Pool For Client Site</a></li>
					<li><a href="{{URL('/Admin/Pool-Listing')}}">All Pools For Client Site</a></li>
				</ul>
			</li>


            <li class="has-sub">
				<a href="javascript:;">
					<span class="badge pull-right">10</span>
					<i class="fa fa-hdd"></i>
					<span>Set-up Team Matches</span>
				</a>
				<ul class="sub-menu">
					<li><a href="{{URL('/Admin/Set-up-Teams')}}">Set-up Teams</a></li>
				</ul>
			</li>

			<li class="has-sub">
				<a href="javascript:;">
					<span class="badge pull-right">10</span>
					<i class="fa fa-hdd"></i>
					<span>Email</span>
				</a>
				<ul class="sub-menu">
					<li><a href="email_inbox.html">Inbox</a></li>
					<li><a href="email_compose.html">Compose</a></li>
					<li><a href="email_detail.html">Detail</a></li>
				</ul>
			</li>
			{{-- <li>
				<a href="widget.html">
					<i class="fab fa-simplybuilt"></i>
					<span>Widgets <span class="label label-theme">NEW</span></span>
				</a>
			</li>
			<li class="has-sub">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-gem"></i>
					<span>UI Elements <span class="label label-theme">NEW</span></span>
				</a>
				<ul class="sub-menu">
					<li><a href="ui_general.html">General <i class="fa fa-paper-plane text-theme"></i></a></li>
					<li><a href="ui_typography.html">Typography</a></li>
					<li><a href="ui_tabs_accordions.html">Tabs & Accordions</a></li>
					<li><a href="ui_unlimited_tabs.html">Unlimited Nav Tabs</a></li>
					<li><a href="ui_modal_notification.html">Modal & Notification <i class="fa fa-paper-plane text-theme"></i></a></li>
					<li><a href="ui_widget_boxes.html">Widget Boxes</a></li>
					<li><a href="ui_media_object.html">Media Object</a></li>
					<li><a href="ui_buttons.html">Buttons <i class="fa fa-paper-plane text-theme"></i></a></li>
					<li><a href="ui_icons.html">Icons</a></li>
					<li><a href="ui_simple_line_icons.html">Simple Line Icons</a></li>
					<li><a href="ui_ionicons.html">Ionicons</a></li>
					<li><a href="ui_tree.html">Tree View</a></li>
					<li><a href="ui_language_bar_icon.html">Language Bar & Icon</a></li>
					<li><a href="ui_social_buttons.html">Social Buttons</a></li>
					<li><a href="ui_tour.html">Intro JS</a></li>
				</ul>
			</li>
			<li>
				<a href="bootstrap_4.html">
					<div class="icon-img">
						<img src="{{asset('/adminassets/img/logo/logo-bs4.png')}}" alt="" />
					</div>
					<span>Bootstrap 4 <span class="label label-theme">NEW</span></span>
				</a>
			</li>
			<li class="has-sub">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-list-ol"></i>
					<span>Form Stuff <span class="label label-theme">NEW</span></span>
				</a>
				<ul class="sub-menu">
					<li><a href="form_elements.html">Form Elements <i class="fa fa-paper-plane text-theme"></i></a></li>
					<li><a href="form_plugins.html">Form Plugins <i class="fa fa-paper-plane text-theme"></i></a></li>
					<li><a href="form_slider_switcher.html">Form Slider + Switcher</a></li>
					<li><a href="form_validation.html">Form Validation</a></li>
					<li><a href="form_wizards.html">Wizards</a></li>
					<li><a href="form_wizards_validation.html">Wizards + Validation</a></li>
					<li><a href="form_wysiwyg.html">WYSIWYG</a></li>
					<li><a href="form_editable.html">X-Editable</a></li>
					<li><a href="form_multiple_upload.html">Multiple File Upload</a></li>
					<li><a href="form_summernote.html">Summernote</a></li>
					<li><a href="form_dropzone.html">Dropzone</a></li>
				</ul>
			</li>
			<li class="has-sub">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-table"></i>
					<span>Tables</span>
				</a>
				<ul class="sub-menu">
					<li><a href="table_basic.html">Basic Tables</a></li>
					<li class="has-sub">
						<a href="javascript:;"><b class="caret"></b> Managed Tables</a>
						<ul class="sub-menu">
							<li><a href="table_manage.html">Default</a></li>
							<li><a href="table_manage_autofill.html">Autofill</a></li>
							<li><a href="table_manage_buttons.html">Buttons</a></li>
							<li><a href="table_manage_colreorder.html">ColReorder</a></li>
							<li><a href="table_manage_fixed_columns.html">Fixed Column</a></li>
							<li><a href="table_manage_fixed_header.html">Fixed Header</a></li>
							<li><a href="table_manage_keytable.html">KeyTable</a></li>
							<li><a href="table_manage_responsive.html">Responsive</a></li>
							<li><a href="table_manage_rowreorder.html">RowReorder</a></li>
							<li><a href="table_manage_scroller.html">Scroller</a></li>
							<li><a href="table_manage_select.html">Select</a></li>
							<li><a href="table_manage_combine.html">Extension Combination</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li class="has-sub">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-star"></i>
					<span>Front End</span>
				</a>
				<ul class="sub-menu">
					<li><a href="../../../frontend/template/template_one_page_parallax/index.html" target="_blank">One Page Parallax</a></li>
					<li><a href="../../../frontend/template/template_blog/index.html" target="_blank">Blog</a></li>
					<li><a href="../../../frontend/template/template_forum/index.html" target="_blank">Forum</a></li>
					<li><a href="../../../frontend/template/template_e_commerce/index.html" target="_blank">E-Commerce</a></li>
				</ul>
			</li>
			<li class="has-sub">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-envelope"></i>
					<span>Email Template</span>
				</a>
				<ul class="sub-menu">
					<li><a href="email_system.html">System Template</a></li>
					<li><a href="email_newsletter.html">Newsletter Template</a></li>
				</ul>
			</li>
			<li class="has-sub">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-chart-pie"></i>
					<span>Chart <span class="label label-theme">NEW</span></span>
				</a>
				<ul class="sub-menu">
					<li><a href="chart-flot.html">Flot Chart</a></li>
					<li><a href="chart-morris.html">Morris Chart</a></li>
					<li><a href="chart-js.html">Chart JS</a></li>
					<li><a href="chart-d3.html">d3 Chart</a></li>
					<li><a href="chart-apex.html">Apex Chart <i class="fa fa-paper-plane text-theme"></i></a></li>
				</ul>
			</li>
			<li>
				<a href="calendar.html">
					<i class="fa fa-calendar"></i>
					<span>Calendar</span>
				</a>
			</li>
			<li class="has-sub">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-map"></i>
					<span>Map</span>
				</a>
				<ul class="sub-menu">
					<li><a href="map_vector.html">Vector Map</a></li>
					<li><a href="map_google.html">Google Map</a></li>
				</ul>
			</li>
			<li class="has-sub">
				<a href="javascript:;">
					<b class="caret"></b>
					<i class="fa fa-image"></i>
					<span>Gallery</span>
				</a>
				<ul class="sub-menu">
					<li><a href="gallery.html">Gallery v1</a></li>
					<li><a href="gallery_v2.html">Gallery v2</a></li>
				</ul>
			</li> --}}





            <li class="has-sub">
                <a href="javascript:;">
                    <!-- <span class="badge pull-right">10</span> -->
                    <i class="fa fa-hdd"></i>
                    <span>Users Picks</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('users_picks')}}">All Users Picks</a></li>
                    <!-- <li><a href="email_detail.html">Detail</a></li> -->
                </ul>
            </li>
            {{-- <li>
                <a href="widget.html">
                    <i class="fab fa-simplybuilt"></i>
                    <span>Widgets <span class="label label-theme">NEW</span></span>
                </a>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-gem"></i>
                    <span>UI Elements <span class="label label-theme">NEW</span></span>
                </a>
                <ul class="sub-menu">
                    <li><a href="ui_general.html">General <i class="fa fa-paper-plane text-theme"></i></a></li>
                    <li><a href="ui_typography.html">Typography</a></li>
                    <li><a href="ui_tabs_accordions.html">Tabs & Accordions</a></li>
                    <li><a href="ui_unlimited_tabs.html">Unlimited Nav Tabs</a></li>
                    <li><a href="ui_modal_notification.html">Modal & Notification <i
                                class="fa fa-paper-plane text-theme"></i></a></li>
                    <li><a href="ui_widget_boxes.html">Widget Boxes</a></li>
                    <li><a href="ui_media_object.html">Media Object</a></li>
                    <li><a href="ui_buttons.html">Buttons <i class="fa fa-paper-plane text-theme"></i></a></li>
                    <li><a href="ui_icons.html">Icons</a></li>
                    <li><a href="ui_simple_line_icons.html">Simple Line Icons</a></li>
                    <li><a href="ui_ionicons.html">Ionicons</a></li>
                    <li><a href="ui_tree.html">Tree View</a></li>
                    <li><a href="ui_language_bar_icon.html">Language Bar & Icon</a></li>
                    <li><a href="ui_social_buttons.html">Social Buttons</a></li>
                    <li><a href="ui_tour.html">Intro JS</a></li>
                </ul>
            </li>
            <li>
                <a href="bootstrap_4.html">
                    <div class="icon-img">
                        <img src="{{asset('/adminassets/img/logo/logo-bs4.png')}}" alt="" />
                    </div>
                    <span>Bootstrap 4 <span class="label label-theme">NEW</span></span>
                </a>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-list-ol"></i>
                    <span>Form Stuff <span class="label label-theme">NEW</span></span>
                </a>
                <ul class="sub-menu">
                    <li><a href="form_elements.html">Form Elements <i class="fa fa-paper-plane text-theme"></i></a></li>
                    <li><a href="form_plugins.html">Form Plugins <i class="fa fa-paper-plane text-theme"></i></a></li>
                    <li><a href="form_slider_switcher.html">Form Slider + Switcher</a></li>
                    <li><a href="form_validation.html">Form Validation</a></li>
                    <li><a href="form_wizards.html">Wizards</a></li>
                    <li><a href="form_wizards_validation.html">Wizards + Validation</a></li>
                    <li><a href="form_wysiwyg.html">WYSIWYG</a></li>
                    <li><a href="form_editable.html">X-Editable</a></li>
                    <li><a href="form_multiple_upload.html">Multiple File Upload</a></li>
                    <li><a href="form_summernote.html">Summernote</a></li>
                    <li><a href="form_dropzone.html">Dropzone</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-table"></i>
                    <span>Tables</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="table_basic.html">Basic Tables</a></li>
                    <li class="has-sub">
                        <a href="javascript:;"><b class="caret"></b> Managed Tables</a>
                        <ul class="sub-menu">
                            <li><a href="table_manage.html">Default</a></li>
                            <li><a href="table_manage_autofill.html">Autofill</a></li>
                            <li><a href="table_manage_buttons.html">Buttons</a></li>
                            <li><a href="table_manage_colreorder.html">ColReorder</a></li>
                            <li><a href="table_manage_fixed_columns.html">Fixed Column</a></li>
                            <li><a href="table_manage_fixed_header.html">Fixed Header</a></li>
                            <li><a href="table_manage_keytable.html">KeyTable</a></li>
                            <li><a href="table_manage_responsive.html">Responsive</a></li>
                            <li><a href="table_manage_rowreorder.html">RowReorder</a></li>
                            <li><a href="table_manage_scroller.html">Scroller</a></li>
                            <li><a href="table_manage_select.html">Select</a></li>
                            <li><a href="table_manage_combine.html">Extension Combination</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-star"></i>
                    <span>Front End</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="../../../frontend/template/template_one_page_parallax/index.html" target="_blank">One
                            Page Parallax</a></li>
                    <li><a href="../../../frontend/template/template_blog/index.html" target="_blank">Blog</a></li>
                    <li><a href="../../../frontend/template/template_forum/index.html" target="_blank">Forum</a></li>
                    <li><a href="../../../frontend/template/template_e_commerce/index.html"
                            target="_blank">E-Commerce</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-envelope"></i>
                    <span>Email Template</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="email_system.html">System Template</a></li>
                    <li><a href="email_newsletter.html">Newsletter Template</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-chart-pie"></i>
                    <span>Chart <span class="label label-theme">NEW</span></span>
                </a>
                <ul class="sub-menu">
                    <li><a href="chart-flot.html">Flot Chart</a></li>
                    <li><a href="chart-morris.html">Morris Chart</a></li>
                    <li><a href="chart-js.html">Chart JS</a></li>
                    <li><a href="chart-d3.html">d3 Chart</a></li>
                    <li><a href="chart-apex.html">Apex Chart <i class="fa fa-paper-plane text-theme"></i></a></li>
                </ul>
            </li>
            <li>
                <a href="calendar.html">
                    <i class="fa fa-calendar"></i>
                    <span>Calendar</span>
                </a>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-map"></i>
                    <span>Map</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="map_vector.html">Vector Map</a></li>
                    <li><a href="map_google.html">Google Map</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-image"></i>
                    <span>Gallery</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="gallery.html">Gallery v1</a></li>
                    <li><a href="gallery_v2.html">Gallery v2</a></li>
                </ul>
            </li> --}}

            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i
                        class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
