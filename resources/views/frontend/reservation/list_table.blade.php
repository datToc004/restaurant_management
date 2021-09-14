@extends('frontend.master.master')
@section('title', 'Sản phẩm')
@section('content')
<!-- main -->
<div class="colorlib-shop">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="row row-pb-lg">
                    @foreach ($tables as $table)
                        <div class="col-md-4 text-center">
                            <div class="product-entry">
                                <div class="product-img">
                                    <img class="product-img" width="260" height="44"
                                        src="{{ asset('/storage/tables/' . $table->img) }}">
                                    <div class="cart">
                                        <p>
                                            <span class="addtocart"><a href="{{ route('cart.table.add') }}"><i
                                                        class="icon-shopping-cart"></i></a></span>
                                            <span><a href="{{ route('table.detail', $table->id) }}"><i
                                                        class="icon-eye"></i></a></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="desc">
                                    <h3><a href="{{ route('table.detail', $table->id) }}">{{ $table->name }}</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! $tables->links() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-md-pull-9">
                <div class="sidebar">
                    <div class="side">
                        <h2>{{ __('messages.price_range') }}</h2>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main -->
@endsection
