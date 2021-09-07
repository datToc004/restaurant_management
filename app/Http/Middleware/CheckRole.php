<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $user = Auth::user();
        if (Auth::user()->role_id == config('restaurant.role_user.customer')) {
            return redirect('home');
        }


        foreach ($roles as $role) {
            if ($user->role_id == $role) {
                return $next($request);
            }
        }

        return redirect('home');
    }
}
