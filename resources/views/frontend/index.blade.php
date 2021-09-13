@extends('frontend.master.master')
@section('title', 'Trang chủ')
@section('content')
<!-- main -->
<div id="colorlib-featured-product">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="shop.html" class="f-product-1 img1">
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
                        <a href="" class="f-product-2 img2">
                            <div class="desc">
                                <h2> <br>{{ __('messages.stuff') }} <br> {{ __('messages.new') }}</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="" class="f-product-2 img3">
                            <div class="desc">
                                <h2>{{ __('messages.sale') }} <br>20% <br></h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-12">
                        <a href="" class="f-product-2 img4">
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
                        <div class="product-img">
                            <img class="product-img" width="260" height="44"
                                src="{{ asset('/storage/dishes/' . $dish->img) }}">
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
