@extends('frontend.master.master')
@section('title', 'Reservation')
@section('content')
<!-- main -->
<div id="colorlib-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="contact-wrap">
                    <h3>{{ __('messages.search') }}</h3>
                    <form action="{{ route('time.post') }}" method="post">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-12 padding-bottom">
                                <label for="time_start">{{ __('messages.time_start') }}</label>
                                <input type="datetime-local" name="time_start" class="form-control" value="">
                                {!! showError($errors, 'time_start') !!}
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12 padding-bottom">
                                <label for="time_end">{{ __('messages.time_end') }}</label>
                                <input type="datetime-local" name="time_end" class="form-control" value="">
                                {!! showError($errors, 'time_end') !!}
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <input type="submit" value="{{ __('messages.submit') }}" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main -->
@endsection
