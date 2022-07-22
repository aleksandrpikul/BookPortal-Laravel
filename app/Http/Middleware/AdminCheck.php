<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(\Illuminate\Http\Request $request, Closure $next)
    {
        // Validate only Admin
        if(Auth::user() && Auth::user()->role->id === 1) {
            return $next($request);
        }
        return redirect('/not-admin');
    }
}
