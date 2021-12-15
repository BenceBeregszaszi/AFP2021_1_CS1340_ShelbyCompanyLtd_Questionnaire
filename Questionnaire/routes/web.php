<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::resource('/settings', SettingsController::class);

Route::get('/', [PagesController::class, 'index'])->name('index');

Route::get('/create', [SettingsController::class, 'create']) -> name('create');

Route::post('/create/store', [SettingsController::class, 'store']) -> name('create.store');
Route::get('/create/store', function () {
    return redirect('/create');
});

Route::get('/create/addquestions/{id}', [SettingsController::class, 'add']);
Route::post('/create/addquestions/{id}/store', [SettingsController::class, 'storeQuestions']);

Route::get('/settings/{id}/update', [SettingsController::class, 'update']);
Route::post('/settings/updateQuestions', [SettingsController::class, 'updateQuestions']);


Route::post('/delete/questionnaire', [SettingsController::class, 'destroyQuestionnaire']);
Route::post('/delete/question', [SettingsController::class, 'destroyQuestion']);

Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
Route::get('/getAnswers', [SettingsController::class, 'getAnswers']);
Route::get('/getQuestionnaires', [SettingsController::class, 'getQuestionnaires']);

Route::get('/statistics', [PagesController::class, 'charts'])->name('statistics');
Route::get('/kitolt/{id}', [PagesController::class, 'kitolt']);

Route::post('/settings/change', [SettingsController::class, 'changeNames']);
Route::post('/send', [SettingsController::class, 'sendResults']);


Auth::routes();
