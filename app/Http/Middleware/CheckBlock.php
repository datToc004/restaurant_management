<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckBlock
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && (auth()->user()->status == config('restaurant.status_user.block'))) {
            Auth::logout();

            return redirect()->route('login')->with('notification', __('messages.no_block_acc'));
        }

        return $next($request);
    }
}
