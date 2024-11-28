<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role = null)
    {
        if (!$request->user() || ($role && $request->user()->role !== $role)) {
            // Redirect to home or show unauthorized page
            return redirect()->back()->with('error', 'You are not authorized to access this page.');
        }

        return $next($request);
    }
}

