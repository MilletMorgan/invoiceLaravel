<?php

use App\Http\Controllers\MissionController;
use App\Http\Controllers\MissionLineController;
use App\Http\Controllers\OrganisationController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('organisations', OrganisationController::class);
Route::resource('missions', MissionController::class);

Route::post('mission-lines', [MissionLineController::class, 'store'])->name('mission.create');
