<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TimeLimiter
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
        $hour = date('H');
        if ($hour > 12 && $hour < 14) {
            return response('Dinner time. Come later.');
        }
        return $next($request);
    }
}
