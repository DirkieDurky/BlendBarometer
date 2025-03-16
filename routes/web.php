<?php

use Illuminate\Support\Facades\Route;
use Laravel\Pail\ValueObjects\Origin\Console;

Route::get('/', function () {
    return view('home');
});

Route::get('/information', function () {
    return view('Information');
});

Route::post('/information/test', function () {
    session()->put('name',request('naam'));
    session()->put('email',request('email'));
    session()->put('opleiding',request('opleiding'));
    session()->put('academie',request('academie'));
    session()->put('module',request('module'));
    session()->put('samenvatting',request('samenvatting'));
    return view('test');
});