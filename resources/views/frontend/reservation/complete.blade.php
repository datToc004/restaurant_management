@extends('frontend.master.master')
@section('title', 'Thanh toán')
@section('content')
<!-- main -->
<div class="colorlib-shop">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <span class="icon"><i class="icon-shopping-cart"></i></span>
                <h2>{{ __('messages.thanks') }}</h2>
                <p>
                    <a href="{{ route('home') }}" class="btn btn-primary">{{ __('messages.home') }}</a>
                    <a href="{{ route('time.get') }}"
                        class="btn btn-primary btn-outline">{{ __('messages.booking_table') }}</a>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- end main -->
@endsection
