@extends('manager.master.master')
@section('title', 'Sửa thời gian')
@section('order')
class="active"
@endsection
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ __('messages.edit_order') }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6 col-md-12 col-lg-12">
            <form method="post" action="{{ route('order.edit.time.post') }}" enctype="multipart/form-data">
                @csrf
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ __('messages.edit_order') }}</div>
                    <div class="panel-body">
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-xs-8">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>{{ __('messages.time_start') }}</label>
                                            <input type="datetime-local" name="time_start" class="form-control"
                                                value="{{ date('Y-m-d\TH:i', strtotime($order->time_start)) }}">
                                            {!! showError($errors, 'time_start') !!}
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>{{ __('messages.time_end') }}</label>
                                            <input type="datetime-local" name="time_end" class="form-control"
                                                value="{{ date('Y-m-d\TH:i', strtotime($order->time_end)) }}">
                                            <input type="hidden" name="id" class="form-control"
                                                value="{{ $order->id }}">
                                            {!! showError($errors, 'time_end') !!}
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-success" type="submit">{{ __('messages.continue') }}</button>
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
