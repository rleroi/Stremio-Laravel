<?php

namespace App\Http\Middleware;

use Closure;

class SetAddonHeaders
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
        // set CORS headers
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");

        return $next($request);
    }
}
