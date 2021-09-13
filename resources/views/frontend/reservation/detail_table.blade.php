@extends('frontend.master.master')
@section('title', 'Detail Table')
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
                                <div class="product-img"
                                    style="background-image: url({{ asset('storage/' . $table->img) }});">

                                </div>

                            </div>
                        </div>
                        <div class="col-md-7">
                            <form action="{{ route('cart.table.add') }}" method="get">

                                <div class="desc">
                                    <h3>{{ __('messages.name') }}: {{ $table->name }}</h3>
                                    <p>{{ __('messages.code') }} : {{ $table->code }}</p>
                                    <p>{{ __('messages.max') }} : {{ $table->max }}</p>
                                    <p>{{ __('messages.category_table') }} : {{ $table->category->name }}</p>
                                    <input type="hidden" name="id_table" value="{{ $table->id }}">
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
                                {{ $table->description }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
    </div>
</div>
<!-- end main -->
@endsection
