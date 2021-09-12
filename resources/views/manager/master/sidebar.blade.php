<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
    </form>
    <ul class="nav menu">
        <li @yield('category')><a href="{{ route('categories.index') }}"><svg
                    class="glyph stroked clipboard with paper">
                    <use xlink:href="#stroked-clipboard-with-paper" />
                </svg>{{ __('messages.category_table') }}</a></li>
        <li @yield('table')><a href="{{ route('tables.index') }}"><svg class="glyph stroked bag">
                    <use xlink:href="#stroked-bag"></use>
                </svg>{{ __('messages.table') }}</a></li>
        <li @yield('dish')><a href="{{ route('dishes.index') }}"><svg class="glyph stroked bag">
                    <use xlink:href="#stroked-bag"></use>
                </svg>{{ __('messages.dish') }}</a></li>
        <li @yield('order')><a href="{{ route('orders.index') }}"><svg class="glyph stroked bag">
                    <use xlink:href="#stroked-notepad" />
                </svg>{{ __('messages.order') }}</a></li>
        <li role="presentation" class="divider"></li>
        <li @yield('user')><a href="{{ route('users.index') }}"><svg class="glyph stroked male-user">
                    <use xlink:href="#stroked-male-user"></use>
                </svg> {{ __('messages.manager_user') }}</a></li>

    </ul>

</div>
