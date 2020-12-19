<?php

namespace App\Http\Middleware;

use Closure;

class middlewareadmin
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
        if (auth()->user() && auth()->user()->user_type_id == 1 ) {

        return $next($request);
    }
        else{
            abort(404);
        }
    }
}
