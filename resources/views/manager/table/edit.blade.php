@extends('manager.master.master')
@section('title', 'Sửa bàn')
@section('table')
class="active"
@endsection
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ __('messages.edit_table') }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6 col-md-12 col-lg-12">
            <form method="post" action="{{ route('tables.update', $table->id) }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put" />
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ __('messages.edit_table') }}</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>{{ __('messages.category') }}</label>
                                            <select name="category_id" class="form-control">
                                                @foreach ($categories as $category)
                                                    <option @if ($category->id == $table->id) selected @endif
                                                        value="{{ $category->id }}">
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('messages.code') }}</label>
                                            <input type="text" name="code" class="form-control"
                                                value="{{ $table->code }}">
                                            {!! showError($errors, 'code') !!}
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('messages.max') }}</label>
                                            <input type="number" name="max" class="form-control"
                                                value="{{ $table->max }}">
                                            {!! showError($errors, 'max') !!}
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('messages.name') }}</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $table->name }}">
                                            {!! showError($errors, 'name') !!}
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('messages.status') }}</label>
                                            <select name="status" class="form-control">
                                                <option @if ($table->status == 0) selected @endif value="0">
                                                    {{ __('messages.unnormal') }}
                                                </option>
                                                <option @if ($table->status == 1) selected @endif value="1">
                                                    {{ __('messages.normal') }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>{{ __('messages.img') }}</label>
                                            <input id="img" type="file" name="img" class="form-control"
                                                src="{{ asset('storage/table/' . $table->img) }}">
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
                                    <textarea id="editor" name="description"
                                        class="editstyle">{{ $table->description }}</textarea>
                                </div>
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
