@extends('manager.master.master')
@section('title', 'Người dùng')
@section('user')
class="active"
@endsection
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">{{ __('messages.list_user') }}</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ __('messages.list_user') }}</h1>
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
                            <table class="table table-bordered">

                                <thead>
                                    <tr class="bg-primary">
                                        <th>{{ __('messages.id') }}</th>
                                        <th>{{ __('messages.info_user') }}</th>
                                        <th>{{ __('messages.name') }}</th>
                                        <th>{{ __('messages.status') }}</th>
                                        <th>{{ __('messages.role') }}</th>
                                        <th>{{ __('messages.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p><strong>{{ __('messages.address') }} :
                                                                {{ $user->address }}</strong></p>
                                                        <p>{{ __('messages.email') }} :{{ $user->email }}</p>
                                                        <p>{{ __('messages.sex') }}:{{ $user->sex }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                @if ($user->status == 1)
                                                    <a name="" id="" class="btn btn-success" href="#"
                                                        role="button">{{ __('messages.unblock') }}</a>
                                                @else
                                                    <a name="" id="" class="btn btn-danger" href="#"
                                                        role="button">{{ __('messages.block') }}</a>
                                                @endif

                                            </td>
                                            <td>{{ $user->role->name }}</td>
                                            <td>
                                                @if ($user->status == 1)
                                                    <form action="{{ route('users.block', $user->id) }}"
                                                        method="get">
                                                        <button class="btn btn-sm btn-warning rounded-0">
                                                            {{ __('messages.block') }}
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('users.unblock', $user->id) }}"
                                                        method="get">
                                                        <button class="btn btn-sm btn-warning rounded-0">
                                                            {{ __('messages.unblock') }}
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div align='right'>
                                {!! $users->links() !!}
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
