<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            $request->session()->put('url.intended', $request->fullUrl());
            return redirect()->route('showlogin'); // Redirect to login
        }
        return $next($request);
    }
    
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('showlogin'); 
        }
    }
}
