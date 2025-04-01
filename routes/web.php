<?php

use App\Http\Controllers\ModuleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('tempTesting');
});

Route::get('/deel2/1', [ModuleController::class, 'start']);
Route::post('/deel2/{catagoryNr}', [ModuleController::class, 'next']);
Route::post('/deel2/{catagoryNr}/back', [ModuleController::class, 'back']);