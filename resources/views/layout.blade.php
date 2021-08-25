<!DOCTYPE html>
<html>

<head>
    <title>Laravel</title>
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap.min/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="#">Laravel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('messages.login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('messages.register') }}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">{{ __('messages.logout') }}</a>
                        </li>
                    @endguest
                </ul>

            </div>
        </div>
    </nav>

    @yield('content')

</body>

</html>
