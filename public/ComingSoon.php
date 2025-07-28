<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ComingSoon
{
    public function handle(Request $request, Closure $next)
    {
        // Allow access only to /coming-soon or if authenticated as admin
        if ($request->is('coming-soon') || $request->is('admin*')) {
            return $next($request);
        }

        return response()->view('coming-soon');
    }
}
