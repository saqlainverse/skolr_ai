<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>Skolr AI - Learning Management System</title>

    <meta property="og:title" content="Skolr AI - Learning Management System" />
    <meta property="og:description" content="This is Skolr AI - Learning Management System" />
    <meta property="og:image" content="{{ static_asset('pak-dev/images/logo/red-logo.jpg') }}" />
    <meta property="og:url" content="https://skolr.ai/" />
    <meta property="og:type" content="website" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Skolr AI - Learning Management System" />
    <meta name="twitter:description" content="This is Skolr AI - Learning Management System" />
    <meta name="twitter:image" content="{{ static_asset('pak-dev/images/logo/red-logo.jpg') }}" />


    <meta name="paginate" content="{{ setting('paginate') }}"/>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" type="text/css" href="{{ static_asset('pak-dev/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ static_asset('pak-dev/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ static_asset('pak-dev/css/mmenu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ static_asset('pak-dev/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ static_asset('pak-dev/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ static_asset('pak-dev/css/nouislider.min.css') }}">
    <!-- Removed duplicate -->
    <link rel="stylesheet" type="text/css" href="{{ static_asset('pak-dev/css/styles.css') }}">

    <!-- Font -->
    <link rel="stylesheet" href="{{ static_asset('pak-dev/font/fonts.css') }}">

    <!-- Icon -->
    <link rel="stylesheet" type="text/css" href="{{ static_asset('pak-dev/icons/flat/flaticon_upskill.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ static_asset('pak-dev/icons/icomoon/style.css') }}">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{ static_asset('pak-dev/images/logo/red-logo.svg') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ static_asset('pak-dev/images/logo/red-logo.svg') }}">

    <link rel="stylesheet" href="{{ static_asset('frontend/fonts/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ static_asset('frontend/css/toastr.min.css') }}">
    @stack('css')
</head>
@php
    $pageClass = '';

    if (request()->is('login')) {
        $pageClass .= ' page-login';
    }
@endphp
<body class="counter-scroll">


    <div id="wrapper">
        <!-- preload -->
        <div class="preload preload-container">
            <div class="middle"></div>
        </div>
        <!-- /preload -->
        <!-- Top Bar -->
        {{-- <div class="tf-top-bar style-1 flex items-center justify-center">
            <p>Intro price. Get UpSkill for Big Sale -95% off.</p>
        </div> --}}
        <!-- /Top Bar -->

        <!-- header -->
        @include('pak-dev.layouts.header')
        <!-- /header -->

        <!-- page-title -->
        @yield('page-title')
        <!-- page-title -->

        <!-- main-content -->
        <div class="main-content{{ $pageClass }}">
            @yield('content')
            @include('pak-dev.layouts.footer')
        </div>
        <!-- footer -->
        <!-- /footer -->


        <!-- go top button -->
        <div class="progress-wrap active-progress">
            <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                    style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;">
                </path>
            </svg>
        </div>
        <!-- /go top button -->

        <!-- open-search -->

        <!-- /open-search -->

    </div>

    
    <!-- Javascript -->
    <script type="text/javascript" src="{{ static_asset('pak-dev/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ static_asset('pak-dev/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ static_asset('pak-dev/js/mmenu.js') }}"></script>
    <script type="text/javascript" src="{{ static_asset('pak-dev/js/magnific-popup.min.js') }}"></script>
    <script type="text/javascript" src="{{ static_asset('pak-dev/js/lazysize.min.js') }}"></script>
    <script type="text/javascript" src="{{ static_asset('pak-dev/js/swiper-bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ static_asset('pak-dev/js/countto.js') }}"></script>
    <script type="text/javascript" src="{{ static_asset('pak-dev/js/swiper.js') }}"></script>
    <script type="text/javascript" src="{{ static_asset('pak-dev/js/wow.min.js') }}"></script>
    <script type="text/javascript" src="{{ static_asset('pak-dev/js/main.js') }}"></script>


    <script src="{{ static_asset('frontend/js/app.js') }}?v={{ setting('current_version') }}"></script>
    <script src="{{ static_asset('frontend/js/toastr.min.js') }}"></script>

    {!! Toastr::message() !!}
    <script src="{{ static_asset('admin/js/sweetalert211.min.js') }}"></script>

    <script>
        new Mmenu(document.querySelector("#menu"));
    </script>
    @stack('js')

    <!-- /Javascript -->
</body>

</html>
