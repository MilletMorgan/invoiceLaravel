<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\MissionLineController;
use App\Http\Controllers\OrganisationController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/auth/redirect', function () {
  return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {
  $user = Socialite::driver('github')->user();

  // OAuth 2.0 providers...
  $token = $user->token;
  $refreshToken = $user->refreshToken;
  $expiresIn = $user->expiresIn;

  // OAuth 1.0 providers...
  $token = $user->token;
  $tokenSecret = $user->tokenSecret;

  // All providers...
  $user->getId();
  $user->getNickname();
  $user->getName();
  $user->getEmail();
  $user->getAvatar();
});

Route::get('public/github/callback', [AuthenticationController::class, 'handleGithubCallback'])->name('callback.github');
Route::get('public/github', [AuthenticationController::class, 'redirectToGithub'])->name('register.github');

Route::middleware('auth')->group(function () {
  Route::prefix('/auth')->group(function () {
    Route::resource('organisations', OrganisationController::class);
    Route::resource('organisations/{organisation}/missions', MissionController::class);

    Route::post('mission-lines', [MissionLineController::class, 'store'])->name('mission.create');
  });
});
