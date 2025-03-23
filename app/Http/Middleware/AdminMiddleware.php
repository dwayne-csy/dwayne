<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->admin) {
            return $next($request); // Continue to admin route
        }

        return redirect()->route('home'); // Redirect to home if not admin
    }
}
