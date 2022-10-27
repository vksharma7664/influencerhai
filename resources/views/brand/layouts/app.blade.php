@php
$current_url = Route::currentRouteName();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Brand Dashboard &mdash; {{ env('APP_NAME') }}</title>
  @section('css')
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/bootstrap/css/bootstrap.min.css' }}">
  <link rel="stylesheet" href="{{ asset('brand-assets/modules/fontawesome/css/all.min.css') }}">
  <!-- <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/fontawesome/css/all.min.css' }}"> -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/css/style.css' }}">
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/css/components.css' }}">
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/izitoast/css/iziToast.min.css' }}">
  
           
  @show

</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      @section('header')
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
          <!-- <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
              <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
              <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
            </ul>
            <div class="search-element">
              <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
              <button class="btn" type="submit"><i class="fas fa-search"></i></button>
              <div class="search-backdrop"></div>
              <div class="search-result">
                <div class="search-header">
                  Histories
                </div>
                <div class="search-item">
                  <a href="#">How to hack NASA using CSS</a>
                  <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                </div>
                <div class="search-item">
                  <a href="#">Kodinger.com</a>
                  <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                </div>
                <div class="search-item">
                  <a href="#">#Stisla</a>
                  <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                </div>
                <div class="search-header">
                  Result
                </div>
                <div class="search-item">
                  <a href="#">
                    <img class="mr-3 rounded" width="30" src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/img/products/product-3-50.png' }}" alt="product">
                    oPhone S9 Limited Edition
                  </a>
                </div>
                <div class="search-item">
                  <a href="#">
                    <img class="mr-3 rounded" width="30" src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/img/products/product-2-50.png' }}" alt="product">
                    Drone X2 New Gen-7
                  </a>
                </div>
                <div class="search-item">
                  <a href="#">
                    <img class="mr-3 rounded" width="30" src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/img/products/product-1-50.png' }}" alt="product">
                    Headphone Blitz
                  </a>
                </div>
                <div class="search-header">
                  Projects
                </div>
                <div class="search-item">
                  <a href="#">
                    <div class="search-icon bg-danger text-white mr-3">
                      <i class="fas fa-code"></i>
                    </div>
                    Stisla Admin Template
                  </a>
                </div>
                <div class="search-item">
                  <a href="#">
                    <div class="search-icon bg-primary text-white mr-3">
                      <i class="fas fa-laptop"></i>
                    </div>
                    Create a new Homepage Design
                  </a>
                </div>
              </div>
            </div>
          </form> -->
          <ul class="navbar-nav navbar-right ">
            
            <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
              <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Notifications
                  <div class="float-right">
                    <a href="#">Mark All As Read</a>
                  </div>
                </div>
                <!-- <div class="dropdown-list-content dropdown-list-icons">
                  <a href="#" class="dropdown-item dropdown-item-unread">
                    <div class="dropdown-item-icon bg-primary text-white">
                      <i class="fas fa-code"></i>
                    </div>
                    <div class="dropdown-item-desc">
                      Template update is available now!
                      <div class="time text-primary">2 Min Ago</div>
                    </div>
                  </a>
                  <a href="#" class="dropdown-item">
                    <div class="dropdown-item-icon bg-info text-white">
                      <i class="far fa-user"></i>
                    </div>
                    <div class="dropdown-item-desc">
                      <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                      <div class="time">10 Hours Ago</div>
                    </div>
                  </a>
                  <a href="#" class="dropdown-item">
                    <div class="dropdown-item-icon bg-success text-white">
                      <i class="fas fa-check"></i>
                    </div>
                    <div class="dropdown-item-desc">
                      <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                      <div class="time">12 Hours Ago</div>
                    </div>
                  </a>
                  <a href="#" class="dropdown-item">
                    <div class="dropdown-item-icon bg-danger text-white">
                      <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="dropdown-item-desc">
                      Low disk space. Let's clean it!
                      <div class="time">17 Hours Ago</div>
                    </div>
                  </a>
                  <a href="#" class="dropdown-item">
                    <div class="dropdown-item-icon bg-info text-white">
                      <i class="fas fa-bell"></i>
                    </div>
                    <div class="dropdown-item-desc">
                      Welcome to Stisla template!
                      <div class="time">Yesterday</div>
                    </div>
                  </a>
                </div>
                <div class="dropdown-footer text-center">
                  <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div> -->
              </div>
            </li>
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/img/avatar/avatar-1.png' }}" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block">Hi, {{auth::user()->name}}</div></a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>
                <!-- <a href="features-profile.html" class="dropdown-item has-icon">
                  <i class="far fa-user"></i> Profile
                </a>
                <a href="features-activities.html" class="dropdown-item has-icon">
                  <i class="fas fa-bolt"></i> Activities
                </a>
                <a href="features-settings.html" class="dropdown-item has-icon">
                  <i class="fas fa-cog"></i> Settings
                </a> -->
                <div class="dropdown-divider"></div>
                <a href="#" onclick="document.getElementById('logout-form').submit()" class="dropdown-item has-icon text-danger">
                  <i class="fas fa-sign-out-alt"></i> Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <form method="POST" id="logout-form" action="{{ route('logout') }}">
            @csrf
            <input type="hidden" name="logout">
            <!-- <input type="submit" name="logout" value="Logout" class="btn btn-primary"> -->

        </form>
      @show

      @section('sidebar')
        <div class="main-sidebar sidebar-style-2">
          <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
              <a href="index.html">
                <img src="{{ asset('admin-asset/img/influencerhai-logo.png') }}" height="40" width="150" class="responsive">
              </a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
              <a href="{{ asset('admin-asset/img/influencerhai-logo.png') }}">IH</a>
            </div>
            <ul class="sidebar-menu">
              <li class="menu-header">Navigation</li>
              <li class="dropdown {{ $current_url == 'brand.dashboard' ? 'active' : '' }}">
                <a href="{{ route('brand.dashboard')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <!-- <ul class="dropdown-menu">
                  <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                  <li class=active><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                </ul> -->
              </li>
              <!-- <li class="menu-header">Campaign</li> -->
              <li class="dropdown {{ $current_url == 'brand.campaign.create' || $current_url == 'brand.campaign.list' || $current_url == 'brand.campaign.show' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span> Campaign</span></a>
                <ul class="dropdown-menu">
                  <li class="{{ $current_url == 'brand.campaign.create' ? 'active' : '' }}"><a class="nav-link " href="{{ route('brand.campaign.create') }}">Create</a></li>
                  <li class="{{ $current_url == 'brand.campaign.list' || $current_url == 'brand.campaign.show' ? 'active' : '' }}"><a class="nav-link " href="{{ route('brand.campaign.list') }}">My Campaign</a></li>
                  <!-- <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                  <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li> -->
                </ul>
              </li>
              
            </ul>
<!-- 
            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
              </a>
            </div>        </aside> -->
        </div>
      @show

      <!-- <div class="container"> -->
      @yield('content')
      <!-- </div> -->

      @section('footer')
        <footer class="main-footer">
          <div class="footer-left">
            Copyright &copy; 2022 <div class="bullet"></div> Design By <a href="https://influencerhai.com/">InfluencerHai.com</a>
          </div>
          <div class="footer-right">
            
          </div>
        </footer>
      @show
    </div>
  </div>

  @section('scripts')
    <!-- General JS Scripts -->
    <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/jquery.min.js' }}"></script>
    <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/popper.js' }}"></script>
    <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/tooltip.js' }}"></script>
    <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/bootstrap/js/bootstrap.min.js' }}"></script>
    <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/nicescroll/jquery.nicescroll.min.js' }}"></script>
    <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/moment.min.js' }}"></script>
    <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/js/stisla.js' }}"></script>
    
   
      <!-- JS Libraies -->
    <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/izitoast/js/iziToast.min.js' }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/js/page/modules-toastr.js' }}"></script>
    
    <!-- Template JS File -->
    <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/js/scripts.js' }}"></script>
    <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/js/custom.js' }}"></script>
  @show
  <script>
    $(document).ready(function() {
        
        @if (Session::has('error'))
            iziToast.show({
              title: 'Error, ',
              message: '{{ Session::get('error') }}',
              position: 'bottomCenter' 
            });
        @elseif(Session::has('success'))
            iziToast.show({
              title: 'Hello, ',
              message: '{{ Session::get('success') }}',
              position: 'bottomCenter' 
            });
        @endif
    });

  </script>

</body>
</html>

