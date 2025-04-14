<?php

use App\Http\Controllers\ResultsController;
use App\Http\Controllers\ModuleController;
use App\Models\academy;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessonController;
use Laravel\Pail\ValueObjects\Origin\Console;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/gegevens', [InformationController::class, 'view'])->name('information');
Route::post('/gegevens', [InformationController::class, 'submit'])->name('information.submit');

Route::get('/moduleniveau/{categoryNr}', [ModuleController::class, 'getModuleLevel'])->name('module-level');
Route::post('/moduleniveau/{categoryNr}/navigeren', [ModuleController::class, 'navigateModuleLevel'])->name('module-level.navigate');

Route::get('/lesniveau/{id}', [LessonController::class, 'view'])->name('lesson-level');
Route::post('/lesniveau/{id}/versturen', [LessonController::class, 'submit'])->name('lesson-level.submit');
Route::get('/lesniveau/volgende/{id}', [LessonController::class, 'next'])->name('lesson-level.next');
Route::get('/lesniveau/vorige/{id}', [LessonController::class, 'back'])->name('lesson-level.back');

Route::get('/uitleg-overzicht-en-resultaten', [ResultsController::class, 'overviewAndResultsInfoView'])->name('overview-and-results-info');
Route::get('/resultaten', [ResultsController::class, 'view'])->name('results');
Route::get('/overzicht-en-versturen', [ResultsController::class, 'overviewAndSendView'])->name('overview-and-send');
