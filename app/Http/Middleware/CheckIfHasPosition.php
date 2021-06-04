<?php

namespace App\Http\Middleware;

use App\Position;
use Closure;

class CheckIfHasPosition
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
        $positions = Position::all();
        if ($positions->count() <= 0) {
            return redirect(route('positions.index'))->with('error', 'You have to create user role first');
        }
        return $next($request);
    }
}
