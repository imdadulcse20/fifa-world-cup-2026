<?php

use App\Http\Controllers\Api\MatchController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\StandingsController;
use App\Http\Controllers\Api\StadiumController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\SettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/settings', [SettingController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/matches', [MatchController::class, 'index']);
Route::get('/matches/{id}', [MatchController::class, 'show']);
Route::get('/teams', [TeamController::class, 'index']);
Route::get('/teams/{id}', [TeamController::class, 'show']);
Route::get('/standings', [StandingsController::class, 'index']);
Route::get('/stadiums', [StadiumController::class, 'index']);
Route::get('/stadiums/{id}', [StadiumController::class, 'show']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
