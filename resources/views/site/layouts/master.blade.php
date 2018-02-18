<!DOCTYPE html>
<html>
<head>
    <!-- Meta Tags
    ========================== -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Site Title
    ========================== -->
    <title>{{ $settings->site_name }}</title>

    <!-- Favicon
    ===========================-->

    <!-- Base & Vendors
    ========================== -->
    <link href="{{ asset('assets/site/vendor/bootstrap/css/bootstrap-ar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/site/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/site/vendor/rs-plugin/css/settings.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/site/vendor/pace-1.0.2/themes/red/pace-theme-loading-bar.css') }}">
    <link href="{{ asset('assets/site/vendor/bootstrap/css/bootstrap-ar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/site/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/site/vendor/owl-carousel/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/site/vendor/owl-carousel/css/owl.theme.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/site/vendor/Magnific-Popup-master/dist/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/site/vendor/pace-1.0.2/themes/red/pace-theme-loading-bar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/site/vendor/Magnific-Popup-master/dist/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/site/vendor/prettyPhoto/css/prettyPhoto.css')}}">

    <!-- Site Style
    ========================== -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/style.css') }}">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="preloader"></div>
    <div class="wrapper">
        <div class="main">
            @include('site.layouts.header')

                @yield('content')

            @include('site.layouts.footer')
        </div><!-- End main -->
    </div><!-- End Wrapper -->

    <!-- JS Base & Vendors
    ========================== -->
    <script src="{{ asset('assets/site/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/site/vendor/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/site/vendor/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('assets/site/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('assets/site/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/site/vendor/jquery.mixitup.js') }}"></script>
    <script src="{{ asset('assets/site/vendor/pace-1.0.2/pace.min.js') }}"></script>
    <script src="{{ asset('assets/site/vendor/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/site/vendor/prettyPhoto/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('assets/site/js/ajax-validation.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/site/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/site/vendor/prettyPhoto/js/jquery.prettyPhoto.js')}} "></script>
    <script src="{{ asset('assets/site/vendor/Magnific-Popup-master/dist/jquery.magnific-popup.js')}}"></script>

    @if(Request::route()->getName() == 'site.contact' || Request::route()->getName() == 'site.home')
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyD59pAKea2EBvC9jXlvdJA9wOMFmYvHx7k"></script>
        <script src="{{ asset('assets/site/js/google.js') }}"></script>
    @endif
    <script src="{{asset('assets/site/vendor/prettyPhoto/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('assets/site/vendor/Magnific-Popup-master/dist/jquery.magnific-popup.js')}}"></script>

    <!-- Site JS
    ========================== -->
    <script src="{{ asset('assets/site/js/main.js')}}"></script>

    </body>
</html>