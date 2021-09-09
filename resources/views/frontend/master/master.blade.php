<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('bower_components/start-bower123/css/animate.css') }}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('bower_components/start-bower123/css/icomoon.css') }}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ asset('bower_components/start-bower123/css/bootstrap.css') }}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('bower_components/start-bower123/css/magnific-popup.css') }}">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="{{ asset('bower_components/start-bower123/css/flexslider.css') }}">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('bower_components/start-bower123/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/start-bower123/css/owl.theme.default.min.css') }}">

    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('bower_components/start-bower123/css/bootstrap-datepicker.css') }}">
    <!-- Flaticons  -->
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{ asset('bower_components/start-bower123/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/start-bower123/css/custome.css') }}">

    <!-- Modernizr JS -->
    <script src="{{ asset('bower_components/start-bower123/js/modernizr-2.6.2.min.js') }}"></script>
    @yield('css_detail')

</head>

<body>
    @include('frontend.master.header')
    @yield('content')
    @include('frontend.master.footer')

    <!-- jQuery -->
    <script src="{{ asset('bower_components/start-bower123/js/jquery.min.js') }}"></script>
    <!-- jQuery Easing -->
    <script src="{{ asset('bower_components/start-bower123/js/jquery.easing.1.3.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('bower_components/start-bower123/js/bootstrap.min.js') }}"></script>
    <!-- Waypoints -->
    <script src="{{ asset('bower_components/start-bower123/js/jquery.waypoints.min.js') }}"></script>
    <!-- Flexslider -->
    <script src="{{ asset('bower_components/start-bower123/js/jquery.flexslider-min.js') }}"></script>
    <!-- Owl carousel -->
    <script src="{{ asset('bower_components/start-bower123/js/owl.carousel.min.js') }}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('bower_components/start-bower123/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('bower_components/start-bower123/js/magnific-popup-options.js') }}"></script>
    <!-- Date Picker -->
    <script src="{{ asset('bower_components/start-bower123/js/bootstrap-datepicker.js') }}"></script>
    <!-- Stellar Parallax -->
    <script src="{{ asset('bower_components/start-bower123/js/jquery.stellar.min.js') }}"></script>
    <!-- Main -->
    <script src="{{ asset('bower_components/start-bower123/js/main.js') }}"></script>

    @yield('script_detail')
    @yield('script_cart')

</body>

</html>
