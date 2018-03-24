<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle($request, Closure $next)
    {
        if (Auth::guest()) {// checks if user is a guets === not authenticated

            return redirect('/');

        } else {// checks if authenticated user is a admin

            // retrives role of authenticated user
            $userRole = Auth::user()->role;

            // checks if user is a admin
            if ($userRole == 'admin') {

                return $next($request);

            }

        return redirect('/');
        }
    }
}
