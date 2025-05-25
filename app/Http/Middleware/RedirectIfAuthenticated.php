<?php

namespace App\Http\Middleware;

use AYqLnTTThKqhV4npsciGstSpAa1XdkrrBP;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SdAmVxPFc3DnmirPXAfTNgM8cJ7V6DWeep3XtzSJv;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    protected function redirectTo(Request $request): ?string
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if ($guard === 'admin') {
                    // Als een admin al ingelogd is, stuur naar admin dashboard
                    return redirect(route('admin.dashboard'));
                }
                // Als een gewone gebruiker al ingelogd is, stuur naar de startpagina voor gewone gebruikers
                // Dit is je 'home' route of de pagina na inloggen
                return redirect()->route('intermediate.view', 'gegevens'); // Jouw specifieke redirect
            }
        }

        return null;
    }
}