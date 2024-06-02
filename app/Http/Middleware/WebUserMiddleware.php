<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class WebUserMiddleware
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
        // Check if the user is authenticated and belongs to the 'web_user' role
        if ($request->user() && $request->user()->hasRole('web_user')) {
            return $next($request);
        }

        // If the user is not authenticated or doesn't have the 'web_user' role, redirect them or return an error
        return redirect()->route('login')->with('error', 'Unauthorized access.');
    }
}
