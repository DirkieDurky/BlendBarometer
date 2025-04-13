<?php

use App\Http\Controllers\ModuleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/deel2/{categoryNr}', [ModuleController::class, 'getModuleLevel']);
Route::post('/deel2/{categoryNr}/navigate', [ModuleController::class, 'navigateModuleLevel']);