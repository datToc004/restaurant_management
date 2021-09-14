@extends('frontend.master.master')
@section('title', 'Giỏ hàng')
@section('content')
<!-- main -->
<div class="colorlib-shop">
    <div class="container">
        <div class="row row-pb-md">
            <div class="col-md-10 col-md-offset-1">
                <div class="product-name">
                    <div class="one-forth text-center">
                        <span>{{ __('messages.detail_table') }}</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>{{ __('messages.max') }}({{ __('messages.person') }})</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>{{ __('messages.delete') }}</span>
                    </div>
                </div>
                @foreach ($cartTables as $table)
                    <div class="product-cart">
                        <div class="one-forth">
                            <div class="product-img">
                                <img class="img-thumbnail cart-img"
                                    src="{{ asset('/storage/tables/' . $table->options->img) }}">
                            </div>
                            <div class="detail-buy">
                                <h4>{{ __('messages.code') }} : {{ $table->options->code }}</h4>
                                <h5>{{ $table->name }}</h5>
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <span class="max">{{ $table->options->max }}</span>
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <a onclick="return del_cart('{{ $table->name }}')"
                                    href="{{ route('cart.table.remove', $table->rowId) }}" class="closed"></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row row-pb-md">
            <div class="col-md-10 col-md-offset-1">
                <div class="product-name">
                    <div class="one-forth text-center">
                        <span>{{ __('messages.detail_dish') }}</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>{{ __('messages.price') }}</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>{{ __('messages.quantity') }}</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>{{ __('messages.sum') }}</span>
                    </div>
                    <div class="one-eight text-center">
                        <span>{{ __('messages.delete') }}</span>
                    </div>
                </div>
                @foreach ($cartDishes as $dish)
                    <div class="product-cart">
                        <div class="one-forth">
                            <div class="product-img">
                                <img class="img-thumbnail cart-img"
                                    src="{{ asset('/storage/dishes/' . $dish->options->img) }}">
                            </div>
                            <div class="detail-buy">
                                <h4>{{ __('messages.code') }} : {{ $dish->options->code }}</h4>
                                <h5>{{ $dish->name }}</h5>
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <span class="price">{{ number_format($dish->price, 0, '', ',') }}VNĐ</span>
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <input onchange="update_qty('{{ $dish->rowId }}', this.value)" type="number"
                                    id="quantity" name="quantity" class="form-control input-number text-center"
                                    value="{{ $dish->qty }}">
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <span
                                    class="price">{{ number_format($dish->price * $dish->qty, 0, '', ',') }}VNĐ</span>
                            </div>
                        </div>
                        <div class="one-eight text-center">
                            <div class="display-tc">
                                <a onclick="return del_cart('{{ $dish->name }}')"
                                    href="{{ route('cart.dish.remove', $dish->rowId) }}" class="closed"></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="total-wrap">
                    <div class="row">
                        <div class="col-md-8">

                        </div>
                        <div class="col-md-3 col-md-push-1 text-center">
                            <div class="total">
                                <div class="sub">
                                    <p><span>{{ __('messages.total') }}:</span>
                                        <span>{{ number_format($total, 0, '', ',') }}VNĐ</span>
                                    </p>
                                </div>
                                <div class="grand-total">
                                    <p><span><strong>{{ __('messages.total') }}:</strong></span>
                                        <span>{{ number_format($total, 0, '', ',') }}VNĐ</span>
                                    </p>
                                    <a href="{{ route('checkout.get') }}"
                                        class="btn btn-primary">{{ __('messages.checkout') }} <i
                                            class="icon-arrow-right-circle"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end main -->

@endsection
@section('script_detail')
<script src="{{ asset('bower_components/start-bower123/js/script_detail.js') }}"></script>
@endsection
