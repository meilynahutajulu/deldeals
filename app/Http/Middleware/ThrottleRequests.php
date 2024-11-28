<?php

namespace Illuminate\Routing\Middleware;

use Closure;
use Illuminate\Routing\Middleware\ThrottleRequests as Middleware;

class ThrottleRequests extends Middleware
{
    protected function resolveRequestSignature($request)
    {
        return $request->ip(); // Aturan untuk throttling
    }
}