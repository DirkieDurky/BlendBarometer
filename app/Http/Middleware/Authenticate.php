<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        if (! $request->expectsJson()) {
            // Als de route begint met '/admin' (of een naam heeft die begint met 'admin.')
            if ($request->is('admin/*') || $request->routeIs('admin.*')) {
                return redirect(route('admin.login')); // Stuur naar de admin login
            }
            return redirect(route('login')); // Stuur naar de gewone gebruikers login (jouw custom)
        }
        return $next($request);
    }
}
