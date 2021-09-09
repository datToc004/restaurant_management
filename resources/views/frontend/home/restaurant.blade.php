@extends('frontend.master.master')
@section('title', 'Sản phẩm')
@section('content')
<!-- main -->
<div class="colorlib-shop">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="row row-pb-lg">
                    @foreach ($dishes as $dish)
                        <div class="col-md-4 text-center">
                            <div class="product-entry">
                                <div class="product-img">
                                    <img class="product-img" width="260" height="44"
                                        src="{{ asset('storage/dishes/' . $dish->img) }}">
                                    <div class="cart">
                                        <p>
                                            <span class="addtocart"><a href="#"><i
                                                        class="icon-shopping-cart"></i></a></span>
                                            <span><a href="{{ route('dish.detail', $dish->id) }}"><i
                                                        class="icon-eye"></i></a></span>


                                        </p>
                                    </div>
                                </div>
                                <div class="desc">
                                    <h3><a href="{{ route('dish.detail', $dish->id) }}">{{ $dish->name }}</a></h3>
                                    <p class="price"><span>{{ number_format($dish->price, 0, '', ',') }} VNĐ</span>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! $dishes->links() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-md-pull-9">
                <div class="sidebar">
                    <div class="side">
                        <h2>{{ __('messages.price_range') }}</h2>
                        <form method="post" class="colorlib-form-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="guests">{{ __('messages.from') }}:</label>
                                        <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="guests">{{ __('messages.to') }}:</label>
                                        <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                            <select name="end" id="people" class="form-control">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit"
                                style="width: 100%;border: none;height: 40px;">{{ __('messages.search') }}</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main -->
@endsection
