<?php

use App\Http\Controllers\ModuleController;
use App\Models\academy;
use Illuminate\Support\Facades\Route;
use Laravel\Pail\ValueObjects\Origin\Console;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/module-section/{categoryNr}', [ModuleController::class, 'getModuleLevel']);
Route::post('/module-section/{categoryNr}/navigate', [ModuleController::class, 'navigateModuleLevel']);

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
    // dd(session()->all()); // Check what is being stored in session
    $academies = Academy::all();
    return view('information', ['academies' => $academies]);
});
