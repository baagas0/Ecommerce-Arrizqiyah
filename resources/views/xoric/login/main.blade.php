<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Login {{ $site->site_name }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('site/'.$site->vaficon) }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('xoric/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('xoric/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('xoric/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body class=" bg-pattern" style="background-color:#cff0cc !important">


        <div class="account-pages ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5 pt-5">
                            <span>
                                <a href="/" class="logo"><img src="{{ asset('site/'.$site->vaficon) }}" height="40" alt="logo"></a>

                                <a href="/" class="logo"><img src="{{ asset('site/'.$site->logo) }}" height="40" alt="logo"></a>
                                
                            </span>
                            <!-- <h5 class="font-size-16 text-white-50 mb-4">{{ $site->site_name }}</h5> -->
                        </div>
                    </div>
                </div>
                <!-- end row -->
                @yield('content')

                </div>
        </div>
        <!-- end Account pages -->

        <!-- JAVASCRIPT -->
        <script src="{{ asset('xoric/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('xoric/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('xoric/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('xoric/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('xoric/libs/node-waves/waves.min.js') }}"></script>

        <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js') }}"></script>

        <script src="{{ asset('xoric/js/app.js') }}"></script>

    </body>
</html>
