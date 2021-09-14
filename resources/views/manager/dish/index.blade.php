@extends('manager.master.master')
@section('title', 'Danh mục sản phẩm')
@section('dish')
class="active"
@endsection
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">{{ __('messages.list_dish') }}</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ __('messages.list_dish') }}</h1>
        </div>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">

            <div class="panel panel-primary">

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
                            <a href="{{ route('dishes.create') }}"
                                class="btn btn-primary">{{ __('messages.add_dish') }}</a>
                            <table class="table table-bordered" style="margin-top:20px;">

                                <thead>
                                    <tr class="bg-primary">
                                        <th>{{ __('messages.id') }}</th>
                                        <th>{{ __('messages.info_dish') }}</th>
                                        <th>{{ __('messages.name') }}</th>
                                        <th>{{ __('messages.type') }}</th>
                                        <th>{{ __('messages.price') }}</th>
                                        <th>{{ __('messages.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dishes as $dish)
                                        <tr>
                                            <td>{{ $dish->id }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-3"><img
                                                            src="{{ asset('/storage/dishes/' . $dish->img) }}"
                                                            alt="Áo đẹp" width="100px" class="thumbnail"></div>
                                                    <div class="col-md-9">
                                                        <p><strong>Mã món ăn : {{ $dish->code }}</strong></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $dish->name }}</td>
                                            <td>{{ $dish->code }}</td>
                                            <td>{{ number_format($dish->price, 0, '', ',') }}</td>
                                            <td>
                                                <form class="freestyle"
                                                    action="{{ route('dishes.edit', $dish->id) }}" method="get">
                                                    <button class="btn btn-sm btn-warning rounded-0">
                                                        {{ __('edit') }}
                                                    </button>
                                                </form>
                                                <form class="freestyle"
                                                    action="{{ route('dishes.destroy', $dish->id) }}" method="post">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="_method" value="delete">
                                                    <button class="btn btn-sm btn-danger rounded-0">
                                                        {{ __('delete') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div align='right'>
                                {!! $dishes->links() !!}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<!--main-->
