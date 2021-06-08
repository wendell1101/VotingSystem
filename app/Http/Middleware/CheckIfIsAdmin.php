<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfIsAdmin
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
        if (auth()->user()->position_id != 1) {
            return redirect()->back()->with('error', 'You need to be an admin to access this page');
        }
        return $next($request);
    }
}
