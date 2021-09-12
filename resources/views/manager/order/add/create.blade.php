@extends('manager.master.master')
@section('title', 'Thêm đơn đặt')
@section('order')
class="active"
@endsection
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ __('messages.add_order') }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6 col-md-12 col-lg-12">
            <form method="post" action="{{ route('order.add.post') }}" enctype="multipart/form-data">
                @csrf
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ __('messages.add') }}</div>
                    <div class="panel-body">
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-xs-8">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>{{ __('messages.customer') }}</label>
                                            <select name="user_id" class="form-control">
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('messages.note') }}</label>
                                            <input type="text" name="note" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <div id="inputFormRow">
                                                <div class="input-group mb-3">
                                                    <select id="table" name="tables[][id]" class="form-control">
                                                        @foreach ($tables as $table)
                                                            <option value="{{ $table->id }}">{{ $table->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group-append">
                                                        <button id="removeRow" type="button"
                                                            class="btn btn-danger">{{ __('messages.remove') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="newRow"></div>
                                            <button id="addRow" type="button"
                                                class="btn btn-info">{{ __('messages.add_table') }}</button>
                                        </div>
                                        <div class="form-group">
                                            <div id="inputFormRow1">
                                                <div class="input-group mb-3">
                                                    <select id="dishes" name="dishes[0][id]" class="form-control">
                                                        @foreach ($dishes as $dish)
                                                            <option value="{{ $dish->id }}">{{ $dish->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <input type="number" name="dishes[0][qty]" class="form-control">
                                                    <div class="input-group-append">
                                                        <button id="removeRow1" type="button"
                                                            class="btn btn-danger">{{ __('messages.remove') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="newRow1"></div>
                                            <button id="addRow1" type="button"
                                                class="btn btn-info">{{ __('messages.add_dish') }}</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-success" type="submit">Thêm</button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script_add_order')
<script src="{{ asset('bower_components/start-bower123/js/script_detail.js') }}"></script>
@endsection
