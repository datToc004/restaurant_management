@extends('layout')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Register</div>
                        <div class="card-body">

                            <form action="{{ route('register.post') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('messages.name') }}</label>
                                    <div class="col-md-6">
                                        <input type="text" id="name" class="form-control" name="name" required autofocus>
                                        {!! showError($errors, 'name') !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone"
                                        class="col-md-4 col-form-label text-md-right">{{ __('messages.phone') }}</label>
                                    <div class="col-md-6">
                                        <input type="text" id="phone" class="form-control" name="phone" required autofocus>
                                        {!! showError($errors, 'phone') !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="sex"
                                        class="col-md-4 col-form-label text-md-right">{{ __('messages.sex') }}</label>
                                    <div class="col-md-6">
                                        <input type="text" id="sex" class="form-control" name="sex" required autofocus>
                                        {!! showError($errors, 'sex') !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address"
                                        class="col-md-4 col-form-label text-md-right">{{ __('messages.address') }}</label>
                                    <div class="col-md-6">
                                        <input type="text" id="address" class="form-control" name="address" required
                                            autofocus>
                                        {!! showError($errors, 'address') !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address"
                                        class="col-md-4 col-form-label text-md-right">{{ __('messages.email') }}</label>
                                    <div class="col-md-6">
                                        <input type="text" id="email_address" class="form-control" name="email" required
                                            autofocus>
                                        {!! showError($errors, 'email') !!}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('messages.password') }}</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password" required>
                                        {!! showError($errors, 'password') !!}
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('messages.register') }}
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
