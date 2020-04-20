<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Free minimal portfolio web site template,minmal portfolio,porfolio,bootstrap template,html template,photography " />
    <link rel="shortcut icon" href="{{ asset('site/'.$site->vaficon) }}">
    <title>{{ $site->site_name }} - Digital marketplace template.</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,400,600,700,800,900&display=swap" rel="stylesheet">
    
    <!-- build:css -->
    <link rel="stylesheet" href="{{ asset('frontend/vendor/css/line-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-custom.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/theme.css') }}">
    <link href="{{ asset('admin/css/icons.css') }}" rel="stylesheet" type="text/css" />

    <!-- endbuild -->
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/rtl.css') }}">

    <!-- This Page -->
    @stack('css')
</head>

<body>

    @include('layout.frontend.topbar')
    <main role="main">

        <div class="warpper">
            
            <div class="container pt-3" >
                <div class="container">
                    <div class="card">
                        <div class="card-body" style="background-color: #f0fcfa">
                            
                    <p>{{ trans('auth.regThanks') }}</p>
                    <p>{{ trans('auth.anEmailWasSent',['email' => $email, 'date' => $date ] ) }}</p>
                    <p>{{ trans('auth.clickInEmail') }}</p>
                    <p><a href='/activation' class="btn btn-primary">{{ trans('auth.clickHereResend') }}</a></p>
                        </div>
                    </div>
                </div>
                @include('layout.frontend.banner')
                @include('layout.frontend.bestitems')
                @include('layout.frontend.newproduct')
                @include('layout.frontend.feature')
                @include('layout.frontend.blog')
            </div>

        </div>
        
    </main>
    @include('layout.frontend.footer')


</body>

</html>
    <!-- This Page -->
    @stack('js')

    <!-- build:js -->
    <script src="{{ asset('frontend/vendor/js/jquery.js') }}"></script>
    <script src="{{ asset('frontend/vendor/js/popper.js') }}"></script>
    <script src="{{ asset('frontend/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('frontend/vendor/js/swiper.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/js/prism.min.js') }}"></script>

    <script src="{{ asset('frontend/js/custom.js') }}"></script>

    <!-- endbuild -->