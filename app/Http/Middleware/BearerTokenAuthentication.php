<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Hash;

class BearerTokenAuthentication
{
    public function handle($request, Closure $next)
    {
        $token = $request->bearerToken();
        $hash = env('API_SECURITY_TOKEN');

        // TOKEN IS CORRECT-HORSE-BATTERY-STAPLE
        if(Hash::check($token, $hash)) {
            return $next($request);
        }

        return response()->json(['message' => 'Unauthenticated'], 403);
    }
}
