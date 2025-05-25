<?php

use App\Http\Controllers\admin\AuthController as AdminAuthController;
use App\Http\Controllers\admin\EditContentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\IntermediateController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ResultsController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/inloggen', [AuthController::class, 'login'])->name('login');
Route::post('/inloggen', [AuthController::class, 'submitLogin'])->name('login.submit');
Route::get('/verificatie', [AuthController::class, 'verify'])->name('verify');
Route::post('verificatie', [AuthController::class, 'submitVerify'])->name('verify.submit');

Route::middleware([Authenticate::class])->group(function () {
    Route::get('/gegevens', [InformationController::class, 'view'])->name('information');
    Route::post('/gegevens', [InformationController::class, 'submit'])->name('information.submit');

    Route::get('/moduleniveau/{categoryNr}', [ModuleController::class, 'getModuleLevel'])->name('module-level');
    Route::post('/moduleniveau/{categoryNr}/versturen', [ModuleController::class, 'submit'])->name('module-level.submit');
    Route::get('/moduleniveau/{categoryNr}/volgende', [ModuleController::class, 'next'])->name('module-level.next');
    Route::get('/moduleniveau/{categoryNr}/vorige', [ModuleController::class, 'previous'])->name('module-level.previous');

    Route::get('/lesniveau/{id}', [LessonController::class, 'view'])->name('lesson-level');
    Route::post('/lesniveau/{id}/versturen', [LessonController::class, 'submit'])->name('lesson-level.submit');
    Route::get('/lesniveau/volgende/{id}', [LessonController::class, 'next'])->name('lesson-level.next');
    Route::get('/lesniveau/vorige/{id}', [LessonController::class, 'previous'])->name('lesson-level.previous');

    Route::get('/uitleg-overzicht-en-resultaten', [ResultsController::class, 'overviewAndResultsInfoView'])->name('overview-and-results-info');
    Route::get('/resultaten', [ResultsController::class, 'view'])->name('results');
    Route::get('/overzicht-en-versturen', [ResultsController::class, 'overviewAndSendView'])->name('overview-and-send');

    Route::get('/versturen', [ReportController::class, 'sendReport'])->name('send');
    Route::get('/tussenpagina/{sectionName}', [IntermediateController::class, 'view'])->name('intermediate.view');
});

Route::post('/SaveChart', [ResultsController::class, 'saveChart']);

Route::get('/admin/login', [AdminAuthController::class, 'index'])->name('admin.login');

Route::middleware(Authenticate::class)->name('admin.')->prefix('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // old
    Route::get('/uitloggen', [AdminAuthController::class, 'logout'])->name('logout');

    Route::get('/email-regels', function () {
        return view('admin.email-rules'); // TODO: get view via controller
    })->name('email-rules');

    Route::get('/vragen-bewerken', function () {
        return view('admin.edit-questions'); // TODO: get view via controller
    })->name('edit-questions');

    Route::get('/content-bewerken', [EditContentController::class, 'index'])->name('edit-content');
    Route::put('/content-bewerken/homepagina-opslaan', [EditContentController::class, 'updateHomeContent'])->name('edit-content.home-update');
});

require __DIR__ . '/auth.php';