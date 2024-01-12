<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckStaffAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            // Check if the user has the 'admin' role
            if (Auth::user()->role == 'admin') {
                // If the user has the 'admin' role, allow access
                return $next($request);
            }
        }

        // If the user is not authenticated or doesn't have the 'admin' role, redirect to a forbidden page or show an error
        abort(403, 'Unauthorized action.');
    }
}
