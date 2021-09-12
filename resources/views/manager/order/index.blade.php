@extends('manager.master.master')
@section('title', 'Đơn hàng')
@section('order')
class="active"
@endsection
@section('content')
<!--main-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">{{ __('messages.order') }}</li>
        </ol>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">{{ __('messages.list_order_pending') }}</div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                            @if (session('notification'))
                                <div class="alert bg-success" role="alert">
                                    <svg class="glyph stroked checkmark">
                                        <use xlink:href="#stroked-checkmark"></use>
                                    </svg>{{ session('notification') }}<a href="#" class="pull-right"><span
                                            class="glyphicon glyphicon-remove"></span></a>
                                </div>
                            @endif
                            <a href="{{ route('orders.accept.get') }}"
                                class="btn btn-success">{{ __('messages.list_order_approval') }}</a>
                            <table class="table table-bordered" style="margin-top:20px;">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>{{ __('messages.id') }}</th>
                                        <th>{{ __('messages.name_customer') }}</th>
                                        <th>{{ __('messages.phone') }}</th>
                                        <th>{{ __('messages.address') }}</th>
                                        <th>{{ __('messages.info_order_table') }}</th>
                                        <th>{{ __('messages.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>{{ $order->user->phone }}</td>
                                            <td>{{ $order->user->address }}</td>
                                            <td>
                                                <p><strong>{{ __('messages.time_start') }} :
                                                        {{ $order->time_start }}</strong></p>
                                                <p><strong>{{ __('messages.time_end') }} :
                                                        {{ $order->time_end }}</strong></p>
                                                <p><strong>{{ __('messages.total') }} :
                                                        {{ $order->total }}</strong></p>
                                            </td>
                                            <td>
                                                <a href="{{ route('orders.accept', $order->id) }}"
                                                    class="btn btn-success"><i class="fa fa-pencil"
                                                        aria-hidden="true"></i>{{ __('messages.accept') }}</a>
                                                <a href="{{ route('orders.delete', $order->id) }}}"
                                                    class="btn btn-danger"><i class="fa fa-pencil"
                                                        aria-hidden="true"></i>{{ __('messages.delete') }}</a>
                                                <a href="{{ route('order.edit.time.get', $order->id) }}"
                                                    class="btn btn-warning"><i class="fa fa-pencil"
                                                        aria-hidden="true"></i>{{ __('messages.edit') }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
