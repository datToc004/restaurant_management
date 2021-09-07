@extends('manager.master.master')
@section('title', 'Danh mục')
@section('category')
class="active"
@endsection
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">{{ __('messages.category_table') }}</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ __('messages.manager_category_table') }}</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            <form action="{{ route('categories.update', $category->id) }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="put" />
                                <div class="form-group">
                                    <label for="">{{ __('messages.name_category') }}</label>
                                    <input type="text" class="form-control" name="name" id=""
                                        value="{{ $category->name }}">
                                    {!! showError($errors, 'name') !!}
                                </div>
                                <button type="submit" class="btn btn-primary">{{ __('messages.edit') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
    <!--/.row-->
</div>
<!--/.main-->
@endsection
