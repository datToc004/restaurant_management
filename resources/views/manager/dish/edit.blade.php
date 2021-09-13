@extends('manager.master.master')
@section('title', 'Sửa sản phẩm')
@section('dish')
class="active"
@endsection
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ __('messages.edit_dish') }}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6 col-md-12 col-lg-12">
            <form method="post" action="{{ route('dishes.update', $dish->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ __('messages.edit_dish') }}</div>
                    <div class="panel-body">
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-xs-8">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>{{ __('messages.code') }}</label>
                                            <input type="text" name="code" class="form-control"
                                                value="{{ $dish->code }}">
                                            {!! showError($errors, 'code') !!}
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('messages.type') }}</label>
                                            <input type="text" name="type" class="form-control"
                                                value="{{ $dish->type }}">
                                            {!! showError($errors, 'type') !!}
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('messages.name') }}</label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $dish->name }}">
                                            {!! showError($errors, 'name') !!}
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('messages.price') }}</label>
                                            <input type="number" min="1" step="any" name="price" class="form-control"
                                                value="{{ $dish->price }}">
                                            {!! showError($errors, 'price') !!}
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
                                    <textarea id="editor" name="description"
                                        class="editstyle">{{ $dish->description }}</textarea>
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
