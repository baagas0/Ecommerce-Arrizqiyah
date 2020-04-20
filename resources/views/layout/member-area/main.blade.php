<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Member Area</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('site/'.$site->vaficon) }}">

        <!-- datepicker -->
        <link href="{{ asset('xoric/libs/air-datepicker/css/datepicker.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- jvectormap -->
        <link href="{{ asset('xoric/libs/jqvmap/jqvmap.min.css') }}" rel="stylesheet" />

        <!-- Bootstrap Css -->
        <link href="{{ asset('xoric/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('xoric/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('xoric/css/app.min.css') }}" rel="stylesheet" type="text/css" />

        @stack('css')

    </head>

    <body data-topbar="colored" data-layout="horizontal" data-layout-size="boxed">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar" style="background-color:#cff0cc !important">
                <div class="navbar-header">
                    <div class="container-fluid">
                        <div class="float-right">

                            <div class="dropdown d-inline-block">
                                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" style="background-color:#cff0cc !important" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if (((Auth::User()->profile) && Auth::user()->profile->avatar_status == 0))
                                        <img src="{{ Auth::user()->profile->avatar }}" alt="{{ Auth::user()->name }}" class="rounded-circle header-profile-user">

                                    @endif
                                    <span class="d-none d-sm-inline-block ml-1 text-body">{{ Auth::user()->first_name }}</span>
                                    <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <!-- item-->
                                    <a class="dropdown-item" href="{{ url('/profile/'.Auth::user()->name.'/edit') }}"><i class="mdi mdi-face-profile font-size-16 align-middle mr-1"></i> Profile</a>

                                    <a class="dropdown-item swap-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="mdi mdi-logout font-size-16 align-middle mr-1"></i> Logout</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </div>

                        </div>

                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="{{ url('member-area') }}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('site/'.$site->vaficon) }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('site/'.$site->logo) }}" alt="" height="20">
                                </span>
                            </a>

                            <a href="{{ url('member-area') }}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('site/'.$site->vaficon) }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('site/'.$site->logo) }}" alt="" height="20">
                                </span>
                            </a>
                        </div>
                        

                        <button type="button" class="btn btn-sm mr-2 font-size-16 d-lg-none header-item waves-effect waves-light" data-toggle="collapse" data-target="#topnav-menu-content">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                        <div class="topnav">
                            <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                                <div class="collapse navbar-collapse" id="topnav-menu-content">
                                    <ul class="navbar-nav">

                                        <li class="nav-item">
                                            <a class="nav-link text-body" href="{{ url('member-area') }}">
                                                Dashboard
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link text-body" href="{{ url('member-area/profile/'.Auth::user()->name.'/edit') }}">
                                                Account
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>

    
            </header>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    
                    <!-- Page-Title -->
                    <div class="page-title-box" style="background-color:#cff0cc !important">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="page-title mb-1 text-body">Member Area</h4>
                                    <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active text-body">{{ 'Welcome To '.$site->site_name.' Member Area' }}</li>
                                    </ol>
                                </div>
                               
                            </div>

                        </div>
                    </div>
                    <!-- end page title end breadcrumb -->

                    <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="card">
                                        <div class="card-body">
                                        <div class="row">
                                                <div class="col-6">
                                                    <h5>Welcome Back !</h5>
                                                    <p class="text-muted">{{ Auth::user()->name }}</p>

                                                    <div class="mt-4">
                                                        <input type="text" class="btn btn-sm btn-primary" value="{{ 'Last Ip : '.request()->getClientIp() }}" name="">
                                                    </div>
                                                </div>

                                                <div class="col-5 ml-auto">
                                                    <div>
                                                        <img src="{{ asset('xoric/images/widget-img.png') }}" alt="" class="img-fluid">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="header-title">Owner Contact</h5>
                                            <hr class="divider divider-fade">
                                            <div class="media">
                                                <div class="media-body" style="text-align: center;">
                                                    <i class="fas fa-phone-volume" style="color: blue;font-size: 20px"></i>

                                                    <p>{{ $contact->phone }}</p>
                                                </div>
                                                <div class="media-body" style="text-align: center;">
                                                    <i class="fab fa-telegram-plane" style="color: blue;font-size: 20px"></i>

                                                    <p>{{ $contact->telegram }}</p>
                                                </div>
                                            </div>

                                            <div class="media">
                                                <div class="media-body" style="text-align: center;">
                                                    <i class="mdi mdi-email" style="color: blue;font-size: 20px"></i>

                                                    <p>{{ $contact->email }}</p>
                                                </div>
                                                <div class="media-body" style="text-align: center;">
                                                    <i class="mdi mdi-google-maps" style="color: blue;font-size: 20px"></i>
                                                    <br>
                                                    <a href="{{ $contact->location }}"> Maps</a>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                @yield('content')
        
                            </div>
                            <!-- end row -->

                        </div> <!-- container-fluid -->
                    </div>
                    <!-- end page-content-wrapper -->
                </div>
                <!-- End Page-content -->

                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                2020 © {{ $site->site_name }}
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-right d-none d-sm-block">
                                    Made With <i class="mdi mdi-heart text-danger"></i> by <a href="https://dityastore.tech">Ditya Store</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('xoric/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('xoric/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('xoric/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('xoric/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('xoric/libs/node-waves/waves.min.js') }}"></script>

        <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js') }}"></script>

        <!-- datepicker -->
        <script src="{{ asset('xoric/libs/air-datepicker/js/datepicker.min.js') }}"></script>
        <script src="{{ asset('xoric/libs/air-datepicker/js/i18n/datepicker.en.js') }}"></script>

        <!-- apexcharts -->
        <script src="{{ asset('xoric/libs/apexcharts/apexcharts.min.js') }}"></script>

        <script src="{{ asset('xoric/libs/jquery-knob/jquery.knob.min.js') }}"></script> 

        <!-- Jq vector map -->
        <script src="{{ asset('xoric/libs/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('xoric/libs/jqvmap/maps/jquery.vmap.usa.js') }}"></script>

        <script src="{{ asset('xoric/js/pages/dashboard.init.js') }}"></script>

        <script src="{{ asset('xoric/js/app.js') }}"></script>

    </body>
</html>

@yield('footer_scripts')
@stack('js')
