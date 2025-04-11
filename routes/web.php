<?php

use App\Http\Controllers\ResultsController;
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
Route::get('/resultaten', [ResultsController::class, 'view'])->name('home');

Route::get('/overzicht-en-versturen', function () {
    return view('overview-and-send');
});
