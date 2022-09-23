<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('page_title')</title>
    <!-- PACE LOAD BAR PLUGIN - This creates the subtle load bar effect at the top of the page. -->
    <link href="{{ asset('admin-asset/css/plugins/pace/pace.css') }}" rel="stylesheet">
    <script src="{{ asset('admin-asset/js/plugins/pace/pace.js') }}"></script>
    <!-- GLOBAL STYLES - Include these on every page. -->
    <link href="{{ asset('admin-asset/css/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel="stylesheet" type="text/css">
    <link href="{{ asset('admin-asset/icons/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- PAGE LEVEL PLUGIN STYLES -->
    <link href="{{ asset('admin-asset/css/plugins/datatables/datatables.css') }}" rel="stylesheet">

    <!-- THEME STYLES - Include these on every page. -->
    <link href="{{ asset('admin-asset/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-asset/css/plugins.css') }}" rel="stylesheet">

    <!-- THEME DEMO STYLES - Use these styles for reference if needed. Otherwise they can be deleted. -->
    <link href="{{ asset('admin-asset/css/demo.css') }}" rel="stylesheet">
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>

<body>

    <div id="wrapper">

        <!-- begin TOP NAVIGATION -->
        <nav class="navbar-top" role="navigation">

            <!-- begin BRAND HEADING -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".sidebar-collapse">
                    <i class="fa fa-bars"></i> Menu
                </button>
                <div class="navbar-brand">
                    <a href="{{ route('admin.dashboard') }}">
                        <img src="{{ asset('admin-asset/img/influencerhai-logo.png') }}" class="img-responsive" alt="">
                    </a>
                </div>
            </div>
            <!-- end BRAND HEADING -->

            <div class="nav-top">

                <!-- begin LEFT SIDE WIDGETS -->
                <ul class="nav navbar-left">
                    <li class="tooltip-sidebar-toggle">
                        <a href="#" id="sidebar-toggle" data-toggle="tooltip" data-placement="right" title="Sidebar Toggle">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                    <!-- You may add more widgets here using <li> -->
                </ul>
                <!-- end LEFT SIDE WIDGETS -->

                <!-- begin MESSAGES/ALERTS/TASKS/USER ACTIONS DROPDOWNS -->
                <ul class="nav navbar-right">

                    <!-- begin USER ACTIONS DROPDOWN -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <a href="#">
                                    <i class="fa fa-gear"></i> Settings
                                </a>
                            </li>
                            <li>
                                <a class="logout_open" href="#logout">
                                    <i class="fa fa-sign-out"></i> Logout
                                    <strong> {{auth::user()->name}}</strong>
                                </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-menu -->
                    </li>
                    <!-- /.dropdown -->
                    <!-- end USER ACTIONS DROPDOWN -->

                </ul>
                <!-- /.nav -->
                <!-- end MESSAGES/ALERTS/TASKS/USER ACTIONS DROPDOWNS -->

            </div>
            <!-- /.nav-top -->
        </nav>
        <!-- /.navbar-top -->
        <!-- end TOP NAVIGATION -->

        <!-- begin SIDE NAVIGATION -->
        <nav class="navbar-side" role="navigation">
            <div class="navbar-collapse sidebar-collapse collapse">
                <ul id="side" class="nav navbar-nav side-nav">
                    <!-- begin SIDE NAV USER PANEL -->
                    <li class="side-user hidden-xs">
                        <img class="img-circle" src="{{ asset('admin-asset/img/profile-pic.jpg') }}" alt="">
                        <p class="welcome">
                            <i class="fa fa-key"></i> Logged in as
                        </p>
                        <p class="name tooltip-sidebar-logout">
                            <span class="last-name">{{auth::user()->name}}</span> <a style="color: inherit" class="logout_open" href="#logout" data-toggle="tooltip" data-placement="top" title="Logout"><i class="fa fa-sign-out"></i></a>
                        </p>
                        <div class="clearfix"></div>
                    </li>
                    <!-- end SIDE NAV USER PANEL -->
                    <!-- begin SIDE NAV SEARCH -->
                    <!-- <li class="nav-search">
                        <form role="form">
                            <input type="search" class="form-control" placeholder="Search...">
                            <button class="btn">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </li> -->
                    <!-- end SIDE NAV SEARCH -->
                    <!-- begin DASHBOARD LINK -->
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-dashboard"></i> Dashboard
                        </a>
                    </li>
                    <!-- end DASHBOARD LINK -->

                    @canany(['roles.index','permissions.index','users.index'])
                     <!-- sub admin -->
                     <li class="panel">
                        <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#sub_admin">
                            <i class="fa fa-bar-chart-o"></i>Sub Admin <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="collapse nav @yield('sub_admin_right_in')" id="sub_admin">
                            @can('users.index')
                            <li>
                                <a href="{{ route('users.index') }}">
                                    <i class="fa fa-angle-double-right"></i> Users
                                </a>
                            </li>
                            @endcan
                            @can('roles.index')
                             <li>
                                <a href="{{ route('roles.index') }}">
                                    <i class="fa fa-angle-double-right"></i> Roles
                                </a>
                            </li>
                            @endcan
                            @can('permissions.index')
                            <li>
                                <a href="{{ route('permissions.index') }}">
                                    <i class="fa fa-angle-double-right"></i> Permissions
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    @canany(['influencer.platform.create','influencer.cat.index','influencer.create','influencer.index'])
                    <li class="panel">
                        <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#Influencer">
                            <i class="fa fa-bar-chart-o"></i>Influencers <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="collapse nav @yield('influencer_right_in')" id="Influencer">
                            @can('influencer.platform.create')
                            <li>
                                <a href="{{ route('influencer.platform.create') }}">
                                    <i class="fa fa-angle-double-right"></i> Add New  Platform
                                </a>
                            </li>
                            @endcan
                            @can('influencer.cat.index')
                             <li>
                                <a href="{{ route('influencer.cat.index') }}">
                                    <i class="fa fa-angle-double-right"></i> Add New  Category
                                </a>
                            </li>
                            @endcan
                            @can('influencer.create')
                            <li>
                                <a href="{{ route('influencer.create') }}">
                                    <i class="fa fa-angle-double-right"></i> Add New Influencer
                                </a>
                            </li>
                            @endcan
                            @can('influencer.index')
                            <li>
                                <a href="{{ route('influencer.index') }}">
                                    <i class="fa fa-angle-double-right"></i> Show All Influencers
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    @canany(['post.cat.create','post.create','post.index'])
                    <!-- begin CHARTS DROPDOWN -->
                    <li class="panel">
                        <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#post">
                            <i class="fa fa-bar-chart-o"></i>Blog Post <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="collapse nav @yield('post_right_in')" id="post">
                            @can('post.cat.create')
                        <li>
                            <a href="{{ route('post.cat.create') }}">
                                <i class="fa fa-angle-double-right"></i> Add New Post Category
                            </a>
                        </li>
                            @endcan
                            @can('post.create')
                            <li>
                                <a href="{{ route('post.create') }}">
                                    <i class="fa fa-angle-double-right"></i> Add New Post
                                </a>
                            </li>
                            @endcan
                            @can('post.index')
                            <li>
                                <a href="{{ route('post.index') }}">
                                    <i class="fa fa-angle-double-right"></i> Show All Post
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                     @endcan
                    @canany(['jobs.application.list','jobs.create','jobs.index'])
                    <!-- begin  Careers JOBS -->
                    <li class="panel">
                        <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#jobs">
                            <i class="fa fa-bar-chart-o"></i>Career Jobs <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="collapse nav @yield('job_right_in')" id="jobs">
                            
                            @can('jobs.create')
                            <li>
                                <a href="{{ route('jobs.create') }}">
                                    <i class="fa fa-angle-double-right"></i> Add New Jobs
                                </a>
                            </li>
                            @endcan
                            @can('jobs.index')
                            <li>
                                <a href="{{ route('jobs.index') }}">
                                    <i class="fa fa-angle-double-right"></i> Show All Jobs
                                </a>
                            </li>
                            @endcan
                            @can('jobs.application.list')
                            <li>
                                <a href="{{ route('jobs.application.list') }}">
                                    <i class="fa fa-angle-double-right"></i> Show All Applications
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                     @endcan
                    @canany(['query.contact.show','query.brands.show','query.influencers.show'])
                     <!-- Queries -->
                    <li class="panel">
                        <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#query">
                            <i class="fa fa-bar-chart-o"></i>Queries <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="collapse nav @yield('query_right_in')" id="query">
                            @can('query.contact.show')
                            <li>
                                <a href="{{ route('query.contact.show') }}">
                                    <i class="fa fa-angle-double-right"></i>  ContactUs
                                </a>
                            </li>
                            @endcan
                            @can('query.brands.show')
                            <li>
                                <a href="{{ route('query.brands.show') }}">
                                    <i class="fa fa-angle-double-right"></i>  Brands
                                </a>
                            </li>
                            @endcan
                            @can('query.influencers.show')
                            <li>
                                <a href="{{ route('query.influencers.show') }}">
                                    <i class="fa fa-angle-double-right"></i>  Influencers
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    @canany(['meta.create','meta.index'])
                    <!-- begin CHARTS DROPDOWN -->
                    <li class="panel">
                        <a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#meta">
                            <i class="fa fa-bar-chart-o"></i>Meta Details <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="collapse nav @yield('meta_right_in')" id="meta">
                            
                            @can('meta.create')
                            <li>
                                <a href="{{ route('meta.create') }}">
                                    <i class="fa fa-angle-double-right"></i> Add New meta Details
                                </a>
                            </li>
                            @endcan
                            @can('meta.index')
                            <li>
                                <a href="{{ route('meta.index') }}">
                                    <i class="fa fa-angle-double-right"></i> Show All Meta Pages
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>
                     @endcan
                </ul>
                <!-- /.side-nav -->
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <!-- /.navbar-side -->
        <!-- end SIDE NAVIGATION -->

        <!-- begin MAIN PAGE CONTENT -->
        <div id="page-wrapper">

            <div class="page-content">
            @section('container')
            @show
            </div>
            <!-- /.page-content -->

        </div>
        <!-- /#page-wrapper -->
        <!-- end MAIN PAGE CONTENT -->

    </div>
    <!-- /#wrapper -->

    <!-- GLOBAL SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="{{ asset('admin-asset/js/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin-asset/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('admin-asset/js/plugins/popupoverlay/jquery.popupoverlay.js') }}"></script>
    <script src="{{ asset('admin-asset/js/plugins/popupoverlay/defaults.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <!-- Logout Notification Box -->
    <div id="logout">
        <div class="logout-message">
            <img class="img-circle img-logout" src="{{ asset('admin-asset/img/profile-pic.jpg') }}" alt="">
            <h3>
                <i class="fa fa-sign-out text-green"></i> Ready to go?
            </h3>
            <p>Select "Logout" below if you are ready<br> to end your current session.</p>
            <ul class="list-inline">
                <li>
                     <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <input type="hidden" name="logout">
                        <input type="submit" name="logout" value="Logout" class="btn btn-primary">

                    </form>
                </li>
                <li>
                    <button class="logout_close btn btn-danger">Cancel</button>
                </li>
            </ul>
        </div>
    </div>
    <!-- /#logout -->
    <!-- Logout Notification jQuery -->
    <script src="{{ asset('admin-asset/js/plugins/popupoverlay/logout.js') }}"></script>
    <!-- HISRC Retina Images -->
    <script src="{{ asset('admin-asset/js/plugins/hisrc/hisrc.js') }}"></script>

    <!-- PAGE LEVEL PLUGIN SCRIPTS -->
    <script src="{{ asset('admin-asset/js/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin-asset/js/plugins/datatables/datatables-bs3.js') }}"></script>

    <!-- THEME SCRIPTS -->
    <script src="{{ asset('admin-asset/js/flex.js') }}"></script>
    <script src="{{ asset('admin-asset/js/demo/advanced-tables-demo.js') }}"></script>
    @section('script')
    @show
</body>
</html>
