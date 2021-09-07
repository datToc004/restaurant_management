@extends('manager.master.master')
@section('title', 'Sửa đơn hàng')
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
            <form method="post" action="{{ route('order.edit.post', $order->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ __('messages.edit_order') }}</div>
                    <div class="panel-body">
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-xs-8">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>{{ __('messages.customer') }}</label>
                                            <select name="user_id" class="form-control">
                                                @foreach ($users as $user)
                                                    <option @if ($user->id == $order->user->id) selected @endif
                                                        value="{{ $user->id }}">{{ $user->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('messages.note') }}</label>
                                            <input type="text" name="note" class="form-control"
                                                value="{{ $order->note }}">
                                        </div>
                                        <div class="form-group">
                                            @foreach ($order->tables as $table_o)
                                                <div id="inputFormRow">
                                                    <div class="input-group mb-3">
                                                        <select id="table" name="tables[][id]" class="form-control">
                                                            @foreach ($tables as $table)
                                                                <option @if ($table->id == $table_o->id) selected @endif
                                                                    value="{{ $table->id }}">{{ $table->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="input-group-append">
                                                            <button id="removeRow" type="button"
                                                                class="btn btn-danger">{{ __('messages.remove') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                            <div id="newRow"></div>
                                            <button id="addRow" type="button"
                                                class="btn btn-info">{{ __('messages.add_table') }}</button>
                                        </div>
                                        <div class="form-group">
                                            @foreach ($order->reservations as $reservation)
                                                @foreach ($reservation->dishReservations as $dishReservation)
                                                    <div id="inputFormRow1">
                                                        <div class="input-group mb-3">
                                                            <select id="dishes"
                                                                name="dishes[{{ $dishReservation->dish->code }}][id]"
                                                                class="form-control">
                                                                @foreach ($dishes as $dish)
                                                                    <option @if ($dish->id == $dishReservation->dish_id) selected @endif
                                                                        value="{{ $dish->id }}">
                                                                        {{ $dish->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <input type="number"
                                                                name="dishes[{{ $dishReservation->dish->code }}][qty]"
                                                                class="form-control"
                                                                value="{{ $dishReservation->amount }}">
                                                            <input type="hidden"
                                                                name="dishes[{{ $dishReservation->dish->code }}][price]"
                                                                class="form-control"
                                                                value="{{ $dishReservation->dish->price }}">
                                                            <div class="input-group-append">
                                                                <button id="removeRow1" type="button"
                                                                    class="btn btn-danger">{{ __('messages.remove') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @break
                                            @endforeach

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
                                <button class="btn btn-success" type="submit">{{ __('messages.edit') }}</button>
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
