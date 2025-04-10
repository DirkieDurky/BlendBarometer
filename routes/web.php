<?php

use App\Http\Controllers\ModuleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('tempTesting');
});

Route::get('/deel2/{categoryNr}', [ModuleController::class, 'getModuleLevel']);
Route::post('/deel2/{categoryNr}/navigate', [ModuleController::class, 'navigateModuleLevel']);
