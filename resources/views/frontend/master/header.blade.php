<!--header -->
<div class="colorlib-loader"></div>
<div id="page">
    <nav class="colorlib-nav" role="navigation">
        <div class="top-menu">
            <div class="container">
                <div class="row">
                    <div class="col-xs-2">
                        <div id="colorlib-logo"><a href="/home">{{ __('messages.restaurant') }}</a></div>
                    </div>
                    <div class="col-xs-10 text-right menu-1">
                        <ul>
                            <li class="active"><a href="{{ route('home') }}">{{ __('messages.home') }}</a></li>
                            <li class="has-dropdown">
                                <a href="{{ route('dishes') }}">{{ __('messages.restaurant') }}</a>
                                <ul class="dropdown">
                                    <li><a href="{{ route('cart.get') }}">{{ __('messages.cart') }}</a></li>
                                    <li><a href="{{ route('time.get') }}">{{ __('messages.booking_table') }}</a>
                                    </li>
                                    <li><a href="{{ route('tables.get') }}">{{ __('messages.table') }}</a></li>
                                </ul>
                            </li>
                            <li class="has-dropdown">
                                <a href="#">{{ __('messages.language') }}</a>
                                <ul class="dropdown">
                                    <li><a href="{{ route('change-language', 'vi') }}">vi</a></li>
                                    <li><a href="{{ route('change-language', 'en') }}">en</a></li>

                                </ul>
                            </li>
                            <li><a href="#">{{ __('messages.about') }}</a></li>
                            <li><a href="#">{{ __('messages.contact') }}</a></li>
                            <li><a href="{{ route('cart.get') }}"><i class="icon-shopping-cart"></i>
                                    {{ __('messages.cart') }}</a></li>
                            @if (isset(Auth::user()->name))
                                <li class="has-dropdown">
                                    <a href="#">{{ Auth::user()->name }}</a>
                                    <ul class="dropdown">
                                        <li><a
                                                href="{{ route('profile') }}">{{ __('messages.update_profile') }}</a>
                                        </li>
                                        <li><a href="{{ route('categories.index') }}">{{ __('messages.manager') }}</a></li>
                                        <li><a href="{{ route('logout') }}">{{ __('messages.logout') }}</a></li>
                                    </ul>
                                </li>
                            @else
                                <li class="has-dropdown">
                                    <a href="{{ route('login') }}">{{ __('messages.login') }}</a>
                                    <ul class="dropdown">
                                        <li><a href="{{ route('register') }}">{{ __('messages.register') }}</a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <aside id="colorlib-hero">
        <div class="flexslider">
            <ul class="slides">
                <li style="background-image: url(/bower_components/start-bower123/images/slider-01.jpg);">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc">
                                        <h1 class="head-1">{{ __('messages.sale') }}</h1>
                                        <h2 class="head-3">45%</h2>
                                        <p class="category"><span>{{ __('messages.sale_discription') }}</span></p>
                                        <p><a href="#" class="btn btn-primary">{{ __('messages.connect_res') }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url(/bower_components/start-bower123/images/slider-01.jpg);">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc">
                                        <h1 class="head-1">{{ __('messages.sale') }}</h1>
                                        <h2 class="head-3">45%</h2>
                                        <p class="category"><span>{{ __('messages.sale_discription') }}</span></p>
                                        <p><a href="#" class="btn btn-primary">{{ __('messages.connect_res') }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url(/bower_components/start-bower123/images/slider-01.jpg);">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc">
                                        <h1 class="head-1">{{ __('messages.sale') }}</h1>
                                        <h2 class="head-3">45%</h2>
                                        <p class="category"><span>{{ __('messages.sale_discription') }}</span></p>
                                        <p><a href="#" class="btn btn-primary">{{ __('messages.connect_res') }}</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </aside>
</div>
<!-- End header -->
