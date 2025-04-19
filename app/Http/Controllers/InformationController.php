<?php

namespace App\Http\Controllers;

use App\Models\Academy;

class InformationController extends Controller
{
    public function view()
    {
        $academies = Academy::all();
        return view('information', ['academies' => $academies]);
    }

    public function submit()
    {
        session()->put('name', request('name'));
        session()->put('course', request('course'));
        session()->put('academy', request('academy'));
        session()->put('module', request('module'));
        session()->put('summary', request('summary'));

        $academies = Academy::all();
        return redirect(route('lesson-level', 1));
    }
}
