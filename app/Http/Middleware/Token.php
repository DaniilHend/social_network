<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class Token
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
        $token = $request->bearerToken();
        if (!isset($token) or !User::query()->where('remember_token', $token)->first()) {

        }

        return $next($request);
    }
}
