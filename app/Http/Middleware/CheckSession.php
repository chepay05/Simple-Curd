<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckSession
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the user's role is admin or staff
            if (session('role') == 'admin' || session('role') == 'staff') {
                $response = $next($request);

                // Add cache control headers to prevent caching
                $response->header('Cache-Control', 'no-cache, no-store, must-revalidate');
                $response->header('Pragma', 'no-cache');
                $response->header('Expires', '0');
                return $response;
            }
        }

        // If not authenticated, redirect to login
        return redirect()->route('login')->with('errors', 'Logout');
    }
}
