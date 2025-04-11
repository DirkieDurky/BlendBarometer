<?php

use App\Models\academy;
use Illuminate\Support\Facades\Route;
use Laravel\Pail\ValueObjects\Origin\Console;

Route::get('/', function () {
    return view('home');
});

Route::get('/information', function () {
    $academies = Academy::all();
    return view('information', ['academies' => $academies]);
});

Route::post('/information', function () {
    session()->put('name',request('name'));
    session()->put('email',request('email'));
    session()->put('course',request('course'));
    session()->put('academy',request('academy'));
    session()->put('module',request('module'));
    session()->put('summary',request('summary'));
    $academies = Academy::all();
    return view('information', ['academies' => $academies]);
});