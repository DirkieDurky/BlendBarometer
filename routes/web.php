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

Route::get('/uitleg-overzicht-en-resultaten', [ResultsController::class, 'overviewAndResultsInfoView'])->name('overviewAndResultsInfo');
Route::get('/resultaten', [ResultsController::class, 'view'])->name('results');
Route::get('/overzicht-en-versturen', [ResultsController::class, 'overviewAndSendView'])->name('overviewAndSend');

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
