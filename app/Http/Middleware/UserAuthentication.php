<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $user)
    {

        if($user === 'admin'){
            return $next($request);
        }
        if($user === 'customer'){
            return $next($request);
        }else{
            abort(403, 'Unauthorized');
        }
    }
}
