<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Request;

class AuthController
{
    public function index(): View
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Probeer in te loggen met de 'admin' guard
        if (Auth::guard('admin')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.edit-content')); // Redirect naar admin dashboard
        }

        return back()->withErrors([
            'email' => 'De opgegeven inloggegevens komen niet overeen met onze gegevens.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout(); // Log uit via de 'admin' guard
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login'); // Terug naar admin login pagina
    }
}
