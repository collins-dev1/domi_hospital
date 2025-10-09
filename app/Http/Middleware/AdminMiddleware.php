<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use RealRashid\SweetAlert\Facades\Alert;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Allow access only for logged-in admins
        if (Auth::check() && Auth::user()->usertype == 1) {
            return $next($request);
        }

        // If the user is logged in but not admin
        if (Auth::check()) {
            Auth::logout();
            Alert::error('Access Denied', 'You are not authorized to access the admin dashboard.');
            return redirect()->route('login');
        }

        // If user is not logged in at all
        Alert::error('Login Required', 'Please log in to access this page.');
        return redirect()->route('login');
    }
}
