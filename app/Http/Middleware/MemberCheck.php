<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Guest
        if ( Auth::user() === null){
            return redirect('/login');
        }
        // Admin
        if ( Auth::user() && Auth::user()->role->id === 1){
            return redirect('/admin-cannot-order');
        }
        // Validate only Member
        return $next($request);
    }
}
