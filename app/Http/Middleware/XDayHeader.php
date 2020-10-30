<?php

namespace App\Http\Middleware;

use Closure;

class XDayHeader
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->header('X-Day', date('l'));

        return $response;
    }
}
