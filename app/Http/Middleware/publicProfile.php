<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class publicProfile
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
        $profileuser = User::where('userName', $request->name)->first();
        $user = Auth::user();
        if (!$profileuser) {
          return back();
        }

        if ($profileuser->publicProfile === 1) {
            return $next($request);
        } else {
            return back();
        }


    }
}
