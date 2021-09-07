@extends('frontend.master.master')
@section('title', 'Update profile')
@section('content')
<!-- main -->
<div id="colorlib-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="contact-wrap">
                    <h3>{{ __('messages.update_profile') }}</h3>
                    <form action="{{ route('profile.post') }}" method="POST">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="row form-group">
                            <div class="col-md-12 padding-bottom">
                                <label for="fname">{{ __('messages.name') }}</label>
                                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                {!! showError($errors, 'name') !!}
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12 padding-bottom">
                                <label for="fname">{{ __('messages.phone') }}</label>
                                <input type="text" name="phone" class="form-control"
                                    value="{{ Auth::user()->phone }}">
                                {!! showError($errors, 'phone') !!}
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 padding-bottom">
                                <label for="fname">{{ __('messages.sex') }}</label>
                                <input type="text" name="sex" class="form-control" value="{{ Auth::user()->sex }}">
                                {!! showError($errors, 'sex') !!}
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 padding-bottom">
                                <label for="fname">{{ __('messages.address') }}</label>
                                <input type="text" name="address" class="form-control"
                                    value="{{ Auth::user()->address }}">
                                {!! showError($errors, 'address') !!}
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="email">{{ __('messages.email') }}</label>
                                <input type="text" name="email" class="form-control"
                                    value="{{ Auth::user()->email }}">
                                {!! showError($errors, 'email') !!}
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
