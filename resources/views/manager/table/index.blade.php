@extends('manager.master.master')
@section('title', 'Danh mục bàn')
@section('table')
class="active"
@endsection
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">{{ __('messages.list_table') }}</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ __('messages.list_table') }}</h1>
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
                            <a href="{{ route('tables.create') }}"
                                class="btn btn-primary">{{ __('messages.add') }}</a>
                            <table class="table table-bordered">

                                <thead>
                                    <tr class="bg-primary">
                                        <th>{{ __('messages.id') }}</th>
                                        <th>{{ __('messages.info_table') }}</th>
                                        <th>{{ __('messages.name') }}</th>
                                        <th>{{ __('messages.status') }}</th>
                                        <th>{{ __('messages.category') }}</th>
                                        <th>{{ __('messages.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tables as $table)
                                        <tr>
                                            <td>{{ $table->id }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-3"><img
                                                            src="{{ asset('/storage/tables/' . $table->img) }}" alt=""
                                                            width="100px" class="thumbnail"></div>
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
                                            <td>
                                                <form class="freestyle"
                                                    action="{{ route('tables.edit', $table->id) }}" method="get">
                                                    <button class="btn btn-sm btn-warning rounded-0">
                                                        {{ __('edit') }}
                                                    </button>
                                                </form>

                                                <form class="freestyle"
                                                    action="{{ route('tables.destroy', $table->id) }}" method="post">
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
                                {!! $tables->links() !!}
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
