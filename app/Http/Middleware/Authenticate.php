<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    protected function redirectTo(Request $request)
    {
        if (! $request->expectsJson()) {
            return route('/dashboard');
        }       
    }

    public function handle($request, Closure $next, ...$guards)
    {
        if (! $request->user()) {
            throw new AuthenticationException('Unauthenticated.');
        }

        return $next($request);
    }
}

