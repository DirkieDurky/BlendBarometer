<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessonController;

Route::get('/', function () {
    return view('home');
});
Route::get('/deel1/1', [LessonController::class, 'start'])->name('deel1.start');
Route::post('/deel1/{id}/storeAnswers', [LessonController::class, 'storeAnswers'])->name('deel1.storeAnswers');
Route::get('/deel1/next/{id}', [LessonController::class, 'next'])->name('deel1.next');
Route::get('/deel1/back/{id}', [LessonController::class, 'back'])->name('deel1.back');