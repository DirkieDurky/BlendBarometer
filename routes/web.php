<?php

use App\Http\Controllers\ModuleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/module-section/{categoryNr}', [ModuleController::class, 'getModuleLevel']);
Route::post('/module-section/{categoryNr}/navigate', [ModuleController::class, 'navigateModuleLevel']);