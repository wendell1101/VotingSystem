<?php

namespace App\Http\Middleware;

use App\Officer;
use Closure;

class CheckIfHasOfficer
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
        $officers = Officer::all();
        if ($officers->count() <= 0) {
            return redirect(route('officers.index'))->with('error', 'You have to create an officer first');
        }
        return $next($request);
    }
}
