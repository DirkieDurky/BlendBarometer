<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/uitleg-overzicht-en-resultaten', function () {
    return view('overview-and-results-info');
});

Route::get('/resultaten', function () {
    return view('results');
});

Route::get('/overzicht-en-versturen', function () {
    return view('overview-and-send');
});
