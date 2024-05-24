<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateWebUser
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('web_users')->check()) {
            return redirect()->route('login'); // Redirect to the login page if the user is not authenticated
        }

        return $next($request);
    }
}
