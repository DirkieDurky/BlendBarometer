<?php

namespace App\Http\Controllers\admin;

use Illuminate\View\View;

class AuthController
{
    public function index(): View
    {
        return view('admin.login');
    }

    public function logout()
    {
        // TODO: implement logout functionality
        return redirect()->route('admin.login');
    }
}
