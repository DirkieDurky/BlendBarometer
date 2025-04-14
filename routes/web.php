<?php

use App\Http\Controllers\ResultsController;
use App\Http\Controllers\ModuleController;
use App\Models\academy;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/module-section/{categoryNr}', [ModuleController::class, 'getModuleLevel']);
Route::post('/module-section/{categoryNr}/navigate', [ModuleController::class, 'navigateModuleLevel']);

Route::get('/information', function () {
    $academies = Academy::all();
    return view('information', ['academies' => $academies]);
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
Route::post('/information', function () {
    session()->put('name', request('name'));
    session()->put('email', request('email'));
    session()->put('course', request('course'));
    session()->put('academy', request('academy'));
    session()->put('module', request('module'));
    session()->put('summary', request('summary'));

    $academies = Academy::all();
    return view('information', ['academies' => $academies]);
});
