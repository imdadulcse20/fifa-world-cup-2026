<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\TournamentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [TournamentController::class, 'home'])->name('home');
Route::get('/schedule', [TournamentController::class, 'schedule'])->name('schedule');
Route::get('/match/{id}', [TournamentController::class, 'matchDetails'])->name('match-details');
Route::get('/standings', [TournamentController::class, 'standings'])->name('standings');
Route::get('/teams', [TournamentController::class, 'teams'])->name('teams');
Route::get('/teams/{id}', [TournamentController::class, 'teamDetails'])->name('team-details');
Route::get('/stadiums', [TournamentController::class, 'stadiums'])->name('stadiums');
Route::get('/settings', [TournamentController::class, 'settings'])->name('settings');

// Admin Auth
Route::get('/admin/login', [App\Http\Controllers\Admin\AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('admin.logout');

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/matches', [App\Http\Controllers\Admin\AdminController::class, 'matches'])->name('matches');
    Route::post('/matches/{id}', [App\Http\Controllers\Admin\AdminController::class, 'updateMatch'])->name('matches.update');
    Route::get('/matches/{id}/events', [App\Http\Controllers\Admin\AdminController::class, 'matchEvents'])->name('matches.events');
    Route::post('/matches/{id}/events', [App\Http\Controllers\Admin\AdminController::class, 'storeMatchEvent'])->name('matches.events.store');
    Route::delete('/events/{id}', [App\Http\Controllers\Admin\AdminController::class, 'deleteMatchEvent'])->name('matches.events.delete');
    Route::get('/settings', [App\Http\Controllers\Admin\AdminController::class, 'settings'])->name('settings');
    Route::post('/settings', [App\Http\Controllers\Admin\AdminController::class, 'updateSettings'])->name('settings.update');
});
