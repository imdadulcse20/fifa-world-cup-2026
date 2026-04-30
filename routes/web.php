<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\TournamentController;
use App\Http\Controllers\Web\SitemapController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/', [TournamentController::class, 'home'])->name('home');
Route::get('/schedule', [TournamentController::class, 'schedule'])->name('schedule');
Route::get('/match/{slug_id}', [TournamentController::class, 'matchDetails'])->name('match-details');
Route::get('/standings', [TournamentController::class, 'standings'])->name('standings');
Route::get('/teams', [TournamentController::class, 'teams'])->name('teams');
Route::get('/teams/{id}', [TournamentController::class, 'teamDetails'])->name('team-details');
Route::get('/stadiums', [TournamentController::class, 'stadiums'])->name('stadiums');
Route::get('/friendlies', [TournamentController::class, 'friendlies'])->name('friendlies');
Route::get('/settings', [TournamentController::class, 'settings'])->name('settings');
Route::get('/privacy-policy', [TournamentController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-conditions', [TournamentController::class, 'termsConditions'])->name('terms-conditions');
Route::get('/contact', [TournamentController::class, 'contact'])->name('contact');
Route::get('/search', [TournamentController::class, 'search'])->name('search');
Route::post('/teams/{id}/favorite', [TournamentController::class, 'toggleFavorite'])->name('teams.favorite');
Route::get('/api/notifications', [TournamentController::class, 'notifications']);
Route::post('/api/notifications/read', [TournamentController::class, 'markNotificationsRead']);
Route::post('/matches/{id}/predict', [TournamentController::class, 'predict'])->name('matches.predict');
Route::get('/about', [TournamentController::class, 'about'])->name('about');

// Admin Auth
Route::get('/admin/login', [App\Http\Controllers\Admin\AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('admin.logout');

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin,faq_manager'])->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('dashboard');
    
    // FAQ routes - accessible by both admin and faq_manager
    Route::get('/faqs', [App\Http\Controllers\Admin\AdminController::class, 'faqs'])->name('faqs');
    Route::post('/faqs', [App\Http\Controllers\Admin\AdminController::class, 'storeFaq'])->name('faqs.store');
    Route::post('/faqs/{id}', [App\Http\Controllers\Admin\AdminController::class, 'updateFaq'])->name('faqs.update');
    Route::delete('/faqs/{id}', [App\Http\Controllers\Admin\AdminController::class, 'deleteFaq'])->name('faqs.delete');

    // Admin-only routes
    Route::middleware('role:admin')->group(function() {
        Route::get('/matches', [App\Http\Controllers\Admin\AdminController::class, 'matches'])->name('matches');
        Route::post('/matches', [App\Http\Controllers\Admin\AdminController::class, 'storeMatch'])->name('matches.store');
        Route::post('/matches/{id}', [App\Http\Controllers\Admin\AdminController::class, 'updateMatch'])->name('matches.update');
        Route::get('/matches/{id}/events', [App\Http\Controllers\Admin\AdminController::class, 'matchEvents'])->name('matches.events');
        Route::post('/matches/{id}/events', [App\Http\Controllers\Admin\AdminController::class, 'storeMatchEvent'])->name('matches.events.store');
        Route::post('/matches/{id}/stats', [App\Http\Controllers\Admin\AdminController::class, 'updateMatchStats'])->name('matches.stats.update');
        Route::post('/matches/{id}/lineups', [App\Http\Controllers\Admin\AdminController::class, 'storeMatchLineup'])->name('matches.lineups.store');
        Route::delete('/lineups/{id}', [App\Http\Controllers\Admin\AdminController::class, 'deleteMatchLineup'])->name('matches.lineups.delete');
        Route::delete('/events/{id}', [App\Http\Controllers\Admin\AdminController::class, 'deleteMatchEvent'])->name('matches.events.delete');
        
        Route::get('/standings', [App\Http\Controllers\Admin\AdminController::class, 'standings'])->name('standings');
        Route::post('/standings/recalculate', [App\Http\Controllers\Admin\AdminController::class, 'recalculateStandings'])->name('standings.recalculate');

        Route::get('/settings', [App\Http\Controllers\Admin\AdminController::class, 'settings'])->name('settings');
        Route::post('/settings', [App\Http\Controllers\Admin\AdminController::class, 'updateSettings'])->name('settings.update');
    });
});
