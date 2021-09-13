@extends('frontend.master.master')
@section('title', 'Detail Dish')
@section('content')
<!-- main -->
<div class="colorlib-shop">
    <div class="container">
        <div class="row row-pb-lg">
            <div class="col-md-10 col-md-offset-1">
                <div class="product-detail-wrap">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="product-entry">
                                <div class="product-img">
                                    <img class="img-thumbnail" width="350" height="350"
                                        src="{{ asset('/storage/dishes/' . $dish->img) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <form action="{{ route('cart.dish.add') }}" method="get">

                                <div class="desc">
                                    <h3>{{ __('messages.name') }}: {{ $dish->name }}</h3>
                                    <p class="price">
                                        <span>{{ number_format($dish->price, 0, '', ',') }} VNĐ</span>
                                    </p>
                                    <p>{{ __('messages.type') }} : {{ $dish->type }}</p>
                                    <p>{{ __('messages.description') }} : {{ $dish->description }}</p>
                                    <h4>{{ __('messages.select') }}</h4>
                                    <div class="row row-pb-sm">
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-left-minus btn"
                                                        data-type="minus" data-field="">
                                                        <i class="icon-minus2"></i>
                                                    </button>
                                                </span>
                                                <input type="text" id="quantity" name="quantity"
                                                    class="form-control input-number" value="1" min="1" max="100">
                                                <span class="input-group-btn">
                                                    <button type="button" class="quantity-right-plus btn"
                                                        data-type="plus" data-field="">
                                                        <i class="icon-plus2"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_dish" value="{{ $dish->id }}">
                                    <p><button class="btn btn-primary btn-addtocart" type="submit">
                                            {{ __('messages.add_to_cart') }}</button></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <section>
            <div class="rt-container">
                <div class="col-rt-12">
                    <div class="content">
                        <h2 id="numberComment">({{ $dish->comments->count() }}) Readers Comments </h2>
                        <div id="reader">
                            <ol>
                                <li class="comments">
                                    @foreach ($comments as $comment)
                                        <div class="comment_box">
                                            <a> <img src="/bower_components/start-bower123/images/avatar.jpg" alt="
                                                avatar"> </a>
                                            <div class="inside_comment">
                                                <div class="comment-meta">
                                                    <div class="commentsuser">{{ $comment->user->name }}</div>
                                                    <div class="comment_date">{{ $comment->created_at }}</div>
                                                </div>
                                            </div>
                                            <div class="comment-body">
                                                <p>{{ $comment->note }}</p>
                                            </div>
                                            <div class="reply"> <a>{{ __('messages.reply') }}</a> </div>
                                            <div class="arrow-down"></div>
                                        </div>
                                    @endforeach

                                </li>
                            </ol>
                            <div class="row">
                                <div class="col-md-12">
                                    {!! $comments->links() !!}
                                </div>
                            </div>
                        </div>
                        <div id="respond">
                            <form id="commentForm" method="post" class="cmxform">
                                @csrf
                                <div class="commentfields">
                                    <h3>{{ __('messages.comment') }} <span>*</span></h3>
                                    <textarea id="ccomment" class="comment-textarea required" name="note"></textarea>
                                    {!! showError($errors, 'note') !!}
                                    <input type="hidden" name="dish_id" value="{{ $dish->id }}" />
                                    @if (Auth::id())
                                        <input type="hidden" name="user_id" value="{{ Auth::id() }}" />
                                    @endif
                                </div>
                                <div class="commentfields">
                                    <input class="commentbtn" type="submit" value="{{ __('messages.comment') }}">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</div>
<!-- end main -->
@endsection
@section('script_detail')
<script src="{{ asset('bower_components/start-bower123/js/script_detail.js') }}"></script>
<script src="{{ asset('bower_components/start-bower123/js/comment.js') }}"></script>
@endsection
@section('css_detail')
<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/start-bower123/css/demo.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/start-bower123/css/comment.css') }}" />
@endsection
