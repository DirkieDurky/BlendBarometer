<?php

use App\Http\Controllers\ResultsController;
use App\Http\Controllers\ModuleController;
use App\Models\academy;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessonController;
use Laravel\Pail\ValueObjects\Origin\Console;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index']);

Route::get('/information', function () {
    $academies = Academy::all();
    return view('information', ['academies' => $academies]);
});

Route::get('/module-level/{categoryNr}', [ModuleController::class, 'getModuleLevel'])->name('moduleLevel');
Route::post('/module-level/{categoryNr}/navigate', [ModuleController::class, 'navigateModuleLevel'])->name('navigateModuleLevel');

Route::get('/lesson-level/{id}', [LessonController::class, 'view'])->name('lesson-level');
Route::post('/lesson-level/{id}/storeAnswers', [LessonController::class, 'storeAnswers'])->name('lesson-level.storeAnswers');
Route::get('/lesson-level/next/{id}', [LessonController::class, 'next'])->name('lesson-level.next');
Route::get('/lesson-level/back/{id}', [LessonController::class, 'back'])->name('lesson-level.back');

Route::get('/uitleg-overzicht-en-resultaten', [ResultsController::class, 'overviewAndResultsInfoView'])->name('overview-and-results-info');
Route::get('/resultaten', [ResultsController::class, 'view'])->name('results');
Route::get('/overzicht-en-versturen', [ResultsController::class, 'overviewAndSendView'])->name('overview-and-send');

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
