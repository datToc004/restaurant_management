@extends('manager.master.master')
@section('title', 'Thêm Bàn')
@section('table')
class="active"
@endsection
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ __('messages.add_table') }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6 col-md-12 col-lg-12">
            <form method="post" action="{{ route('tables.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ __('messages.add_table') }}</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>{{ __('messages.category') }}</label>
                                            <select name="category_id" class="form-control">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('messages.code') }}</label>
                                            <input type="text" name="code" class="form-control">
                                            {!! showError($errors, 'code') !!}
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('messages.max') }}</label>
                                            <input type="number" name="max" class="form-control">
                                            {!! showError($errors, 'max') !!}
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('messages.name') }}</label>
                                            <input type="text" name="name" class="form-control">
                                            {!! showError($errors, 'name') !!}
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('messages.status') }}</label>
                                            <select name="status" class="form-control">
                                                <option value="1">{{ __('messages.normal') }}</option>
                                                <option value="0">{{ __('messages.unnormal') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>{{ __('messages.img') }}</label>
                                            <input id="img" type="file" name="img" class="form-control">
                                            {!! showError($errors, 'img') !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('messages.description') }}</label>
                                    <textarea id="editor" name="description" class="editstyle"></textarea>
                                </div>
                                <button class="btn btn-success" type="submit">{{ __('messages.add') }}</button>
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
