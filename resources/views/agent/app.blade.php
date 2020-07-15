<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="PIXINVENT">
  <title>Hang Your Clothes</title>
  <link rel="shortcut icon" type="image/x-icon" href="/images/fav_icon.png">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">

  @yield('extra-css')
  <!-- BEGIN VENDOR CSS-->

  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/vendors.css')}}">

  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/meteocons/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/toastr.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.css')}}">
  <!-- BEGIN MODERN CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/app.css')}}">
  <!-- END MODERN CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/fonts/simple-line-icons/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css')}}">

  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  {{--  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">  --}}
  <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
  <!-- fixed-top-->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item mr-auto">
            <a class="navbar-brand" href="/">
              <img class="brand-logo" alt="Msupply" src="{{ asset('image/logo-png.png')}}">
              <p class="brand-text"> Hang Your Clothes</p>
            </a>
          </li>
          <li class="nav-item d-none d-md-block float-right"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>
          <li class="nav-item d-md-none">
            <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
          </li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">

          </ul>
          <ul class="nav navbar-nav float-right">
            <li class="dropdown dropdown-user nav-item">
              <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">Hello,
                  <span class="user-name text-bold-700">{{ Auth::user()->name }}</span>
                </span>
                {{--  <span class="avatar avatar-online">
                  <img src="{{ asset('app-assets/images/portrait/small/avatar-s-19.png')}}" alt="avatar"><i></i></span>  --}}
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  {{-- <a class="dropdown-item" href="#"><i class="ft-user"></i> Edit Profile</a> --}}



              <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"><i class="ft-power"></i> Logout</a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </div>
              </li>
          
            <li class="dropdown dropdown-notification nav-item">
              <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i>
                <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow"></span>
              </a>
           
            </li>

          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="dashboard nav-item"><a href="/dashboard"><i class="la la-support"></i><span class="menu-title">Dashboard</span></a></li>
            @if($role_get->services_read == 'on')
            <li class="nav-item"><a href="/categories"><i class="la la-la la-archive"></i><span class="menu-title">Services</span></a></li>
            @endif
            @if($role_get->customer_read == 'on')
            <li class="nav-item"><a href="/customer"><i class="la la-la la-user"></i><span class="menu-title">Customer</span></a></li>
            @endif
            @if($role_get->agent_read == 'on')
            <li class="nav-item"><a href="/agent"><i class="la la-la la-user"></i><span class="menu-title">Agent</span></a></li>
            @endif
            @if($role_get->coupon_read == 'on')
            <li class="nav-item"><a href="/coupon"><i class="la la-la la-shopping-cart"></i><span class="menu-title">Coupon</span></a></li>
            @endif
            @if($role_get->order_read == 'on')
            <li class="nav-item"><a href="/order"><i class="la la-la la-shopping-cart"></i><span class="menu-title">Orders</span></a></li>
            @endif
            <li class=" nav-item"><a href="#"><i class="la la-gear"></i><span class="menu-title">Settings</span></a>
              <ul class="menu-content">
                @if($role_get->slider_read == 'on')
                <li class="nav-item"><a href="/homeSlider"><span class="menu-title">Home Slider</span></a></li>
                @endif
                @if($role_get->user_read == 'on')
                <li class="nav-item"><a href="/user"><span class="menu-title">User</span></a></li>
                @endif
                @if($role_get->role_read == 'on')
                <li class="nav-item"><a href="/role"><span class="menu-title">Roles</span></a></li>
                @endif
              </ul>
            </li>
            @if($role_get->order_report == 'on')
            <li class="nav-item"><a href="/order-report"><i class="la la-la la-bar-chart"></i><span class="menu-title">Reports</span></a></li>
            @endif
      </ul>
    </div>
  </div>
  <div class="app-content content">
   @yield('section')
  </div>

  <footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">
        Copyright &copy; 20<?=date('y')?> <a class="text-bold-800 grey darken-2" href="http://lrbtech.com">LRB TECH </a>, All rights reserved.
     </span>
    </p>
  </footer>
  <!-- BEGIN VENDOR JS-->
  <script src="{{ asset('app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <!-- BEGIN VENDOR JS-->

  <!-- BEGIN MODERN JS-->
  <script src="{{ asset('app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/core/app.js')}}" type="text/javascript"></script>
  <script src="{{ asset('app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
  <!-- END MODERN JS-->
<script>
  $('#add-contact').click(function(e){
    e.preventDefault();
    window.location.href = "/admin/add-contact";
  });
//   $('form input').on('keypress', function(e) {
//     return e.which !== 13;
// });
</script>
<script src="{{ asset('app-assets/js/scripts/extensions/toastr.js')}}" type="text/javascript"></script>
<script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js')}}" type="text/javascript"></script>
  @yield('extra-js')
</body>
</html>

