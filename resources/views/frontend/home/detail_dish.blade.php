@extends('frontend.master.master')
@section('title', 'Detail Dish')
@section('content')
<!-- main -->
<div class="colorlib-shop">
    <div class="container">
        <div class="row row-pb-lg">
            <div class="col-md-10 col-md-offset-1">
                <div class="product-detail-wrap">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="product-entry">
                                <div class="product-img">
                                    <img src="{{ asset('storage/' . $dish->img) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <form action="{{ route('cart.dish.add') }}" method="get">

                                <div class="desc">
                                    <h3>{{ __('messages.name') }}: {{ $dish->name }}</h3>
                                    <p class="price">
                                        <span>{{ number_format($dish->price, 0, '', ',') }} VNĐ</span>
                                    </p>
                                    <p>{{ __('messages.type') }} : {{ $dish->type }}</p>
                                    <h4>{{ __('messages.select') }}</h4>
                                    <div class="row row-pb-sm">
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-left-minus btn"
                                                        data-type="minus" data-field="">
                                                        <i class="icon-minus2"></i>
                                                    </button>
                                                </span>
                                                <input type="text" id="quantity" name="quantity"
                                                    class="form-control input-number" value="1" min="1" max="100">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-right-plus btn"
                                                        data-type="plus" data-field="">
                                                        <i class="icon-plus2"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_dish" value="{{ $dish->id }}">
                                    <p><button class="btn btn-primary btn-addtocart" type="submit">
                                            {{ __('messages.add_to_cart') }}</button></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-md-12 tabulation">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab"
                                    href="#description">{{ __('messages.description') }}</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="description" class="tab-pane fade in active">
                                {{ $dish->description }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-md-7">
                <h4>{{ __('messages.comment') }}</h4>
                <form method="post" action="{{ route('dish.comment') }}">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" name="note" />
                        {!! showError($errors, 'note') !!}
                        <input type="hidden" name="dish_id" value="{{ $dish->id }}" />
                        @if (isset(Auth::user()->id))
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Add Comment" />
                    </div>
                </form>
            </div>
            <div class="col-md-5">
                <div class="cart-detail">
                    @foreach ($dish->comments as $comment)
                        <h3>{{ $comment->user->name }}</h3>
                        <div>{{ $comment->note }}</div>
                    @endforeach
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
