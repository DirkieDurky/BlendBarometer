<?php

use Illuminate\Support\Facades\Route;
use Laravel\Pail\ValueObjects\Origin\Console;

Route::get('/', function () {
    return view('home');
});

Route::get('/information', function () {
    // dd(session()->all()); to see what data is in the session
    return view('Information');
});

Route::post('/information/test', function () {
    session()->put('name',request('name')); //get values from the form and put them into the session
    session()->put('email',request('email'));
    session()->put('course',request('course'));
    session()->put('academy',request('academy'));
    session()->put('module',request('module'));
    session()->put('summary',request('summary'));
    // dd(session()->all());
    return view('test');
});