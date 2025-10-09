<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use RealRashid\SweetAlert\Facades\Alert;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Allow only normal users (usertype == 0)
        if (Auth::check() && Auth::user()->usertype == 0) {
            return $next($request);
        }

        // If user is logged in but not a normal user (maybe an admin)
        if (Auth::check()) {
            Auth::logout();
            Alert::error('Access Denied', 'You are not authorized to access the user dashboard.');
            return redirect()->route('login');
        }

        // If user is not logged in
        Alert::error('Login Required', 'Please log in to access your dashboard.');
        return redirect()->route('login');
    }
}
