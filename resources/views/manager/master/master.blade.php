<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- css -->
    <base href="{{ asset('manager') }}/">
    <link href="{{ asset('bower_components/start-bower123/backend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/start-bower123/backend/css/datepicker3.css') }}" rel="stylesheet">

    <!--Icons-->

    <script src="js/lumino.glyphs.js"></script>
    <link rel="stylesheet" href="{{ asset('bower_components/start-bower123/all/index.css') }}"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="{{ asset('bower_components/start-bower123/backend/css/styles.css') }}" rel="stylesheet">
</head>

<body>
    <!-- header -->
    @include('manager.master.header')
    <!-- header -->
    <!-- sidebar left-->
    @include('manager.master.sidebar')
    <!--/. end sidebar left-->

    <!--main-->
    @yield('content')
    <!--end main-->

    <!-- javascript -->
    <script src="{{ asset('bower_components/start-bower123/backend/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('bower_components/start-bower123/backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bower_components/start-bower123/backend/js/chart.min.js') }}"></script>
    <script src="{{ asset('bower_components/start-bower123/backend/js/easypiechart.js') }}"></script>
    <script src="{{ asset('bower_components/start-bower123/backend/js/bootstrap-datepicker.js') }}"></script>
    @yield('script_add_order')
</body>

</html>
