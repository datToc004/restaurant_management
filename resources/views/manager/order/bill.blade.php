@extends('manager.master.master')
@section('title', 'Chi tiết đơn hàng')
@section('order')
class="active"
@endsection
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">{{ __('messages.order') }} / {{ __('messages.bill') }}</li>
        </ol>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">

            <div class="panel panel-primary">
                <div class="panel-heading">{{ __('messages.bill') }}</div>
                <div class="panel-body">
                    <div class="bootstrap-table">
                        <div class="table-responsive">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="panel panel-blue">
                                            <div class="panel-heading dark-overlay">{{ __('messages.info_customer') }}
                                            </div>
                                            <div class="panel-body">
                                                <strong><span class="glyphicon glyphicon-user"
                                                        aria-hidden="true"></span> : {{ $order->user->name }}</strong>
                                                <br>
                                                <strong><span class="glyphicon glyphicon-phone"
                                                        aria-hidden="true"></span> : {{ __('messages.phone') }}:
                                                    {{ $order->user->phone }}</strong>
                                                <br>
                                                <strong><span class="glyphicon glyphicon-send"
                                                        aria-hidden="true"></span> :
                                                    {{ $order->user->address }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <table class="table table-bordered" style="margin-top:20px;">

                                <thead>
                                    <tr class="bg-primary">
                                        <th>{{ __('messages.id') }}</th>
                                        <th>{{ __('messages.info_table') }}</th>
                                        <th>{{ __('messages.name') }}</th>
                                        <th>{{ __('messages.status') }}</th>
                                        <th>{{ __('messages.category') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->tables as $table)
                                        <tr>
                                            <td>{{ $table->id }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-3"><img
                                                            src="{{ asset('storage/tables/' . $table->img) }}"
                                                            alt="Áo đẹp" width="100px" class="thumbnail"></div>
                                                    <div class="col-md-9">
                                                        <p><strong>{{ __('messages.code') }} :
                                                                {{ $table->code }}</strong></p>
                                                        <p>{{ __('messages.name') }} :{{ $table->name }}</p>
                                                        <p>{{ __('messages.max') }}:{{ $table->max }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $table->name }}</td>
                                            <td>
                                                @if ($table->status == 1)
                                                    <a name="" id="" class="btn btn-success" href="#"
                                                        role="button">{{ __('messages.normal') }}</a>
                                                @else
                                                    <a name="" id="" class="btn btn-danger" href="#"
                                                        role="button">{{ __('messages.unnormal') }}</a>
                                                @endif

                                            </td>
                                            <td>{{ $table->category->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <table class="table table-bordered" style="margin-top:20px;">

                                <thead>
                                    <tr class="bg-primary">
                                        <th>{{ __('messages.id') }}</th>
                                        <th>{{ __('messages.info_dish') }}</th>
                                        <th>{{ __('messages.name') }}</th>
                                        <th>{{ __('messages.type') }}</th>
                                        <th>{{ __('messages.price') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->reservations as $reservation)
                                        @foreach ($reservation->dishes as $dish)
                                            <tr>
                                                <td>{{ $dish->id }}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-md-3"><img
                                                                src="{{ asset('storage/dishes/' . $dish->img) }}"
                                                                alt="Áo đẹp" width="100px" class="thumbnail"></div>
                                                        <div class="col-md-9">
                                                            <p><strong>{{ __('messages.code') }} :
                                                                    {{ $dish->code }}</strong></p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>{{ $dish->name }}</td>
                                                <td>{{ $dish->code }}</td>
                                                <td>{{ number_format($dish->price, 0, '', ',') }}</td>
                                            </tr>
                                        @endforeach
                                    @break
                                    @endforeach
                                </tbody>
                            </table>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width='70%'>
                                            <h4 align='right'>{{ __('messages.total') }} :</h4>
                                        </th>
                                        <th>
                                            <h4 align='right' style="color: brown;">
                                                {{ number_format($order->total, 0, '', ',') }}VND</h4>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <form action="{{ route('bill.post', $order->id) }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label>{{ __('messages.payment_method') }}</label>
                                    <select name="type_payment" class="form-control">
                                        <option value="Tiền mặt">{{ __('messages.money') }}</option>
                                        <option value="Thẻ">{{ __('messages.card') }}</option>
                                    </select>
                                </div>
                                <div class="alert alert-primary" role="alert" align='right'>
                                    <button class="btn btn-sm btn-danger rounded-0">
                                        {{ __('messages.processed') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
