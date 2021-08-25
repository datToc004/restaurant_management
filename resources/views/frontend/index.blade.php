@extends('frontend.master.master')
@section('title', 'Trang chủ')
@section('content')
<!-- main -->
<div id="colorlib-featured-product">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="shop.html" class="f-product-1"
                    style="background-image: url(bower_components/start-bower123/images/img-01.jpg);">
                    <div class="desc">
                        <h2>{{ __('messages.water') }} <br>{{ __('messages.passion') }}
                            <br>{{ __('messages.fruit') }}
                        </h2>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <a href="" class="f-product-2"
                            style="background-image: url(bower_components/start-bower123/images/img-02.jpg);">
                            <div class="desc">
                                <h2> <br>{{ __('messages.stuff') }} <br> {{ __('messages.new') }}</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="" class="f-product-2"
                            style="background-image: url(bower_components/start-bower123/images/img-03.jpg);">
                            <div class="desc">
                                <h2>{{ __('messages.sale') }} <br>20% <br></h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-12">
                        <a href="" class="f-product-2"
                            style="background-image: url(bower_components/start-bower123/images/img-04.jpg);">
                            <div class="desc">
                                <h2>{{ __('messages.cake') }} <br>{{ __('messages.loss') }}
                                    <br>{{ __('messages.weight') }}
                                </h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="colorlib-intro" class="colorlib-intro" style="background-image: url(images/cover-img-1.jpg);"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="intro-desc">
                    <div class="text-salebox">
                        <div class="text-lefts">
                            <div class="sale-box">
                                <div class="sale-box-top">
                                    <h2 class="number">45</h2>
                                    <span class="sup-1">%</span>
                                </div>
                                <h2 class="text-sale">{{ __('messages.sale') }}</h2>
                            </div>
                        </div>
                        <div class="text-rights">
                            <div class="row">
                                <div class="col-md-8 ml-auto mr-auto text-center">
                                    <p class="lead ">
                                        " {{ __('messages.description_home') }} "
                                    </p>
                                    <span class="lead">Michael Strahan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="colorlib-shop">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
                <h2><span>{{ __('messages.dish') }}</span></h2>
                <p>{{ __('messages.dish_description') }}</p>
            </div>
        </div>
        <div class="row">
            @foreach ($dishes as $dish)
                <div class="col-md-3 text-center">
                    <div class="product-entry">
                        <div class="product-img" style="background-image: url(/storage/{{ $dish->img }});">
                            <p class="tag"><span class="new">{{ __('messages.new') }}</span></p>
                            <div class="cart">
                                <p>
                                    <span class="addtocart"><a href="#"><i class="icon-shopping-cart"></i></a></span>
                                    <span><a href="{{ route('dish.detail', $dish->id) }}"><i
                                                class="icon-eye"></i></a></span>
                                </p>
                            </div>
                        </div>
                        <div class="desc">
                            <h3><a href="{{ route('dish.detail', $dish->id) }}">{{ $dish->name }}</a></h3>
                            <p class="price"><span>{{ number_format($dish->price, 0, '', ',') }} VNĐ</span></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end main -->
@endsection
