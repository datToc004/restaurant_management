@extends('layout')

@section('content')
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('messages.login') }}</div>
                        <div class="card-body">
                            @if (session('notification'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>{{ session('notification') }}</strong>
                                </div>
                            @endif
                            <form action="{{ route('login.post') }}" method="POST">
                                @csrf
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

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> {{ __('messages.remenber_me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('messages.login') }}
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
