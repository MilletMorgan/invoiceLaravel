<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\MissionLineController;
use App\Http\Controllers\OrganisationController;
use App\Models\User;
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

Route::get('/', function () {
  return [
    'user_connecte' => Auth::user(),
    'users' => User::all()
  ];
});

Route::get('/login/redirect', function () {
  return Socialite::driver('github')->redirect();
});

Route::get('/login/callback', function () {
  $githubUser = Socialite::driver('github')
    ->user();

  $databaseUser = User::query()
    ->firstOrNew([
        'email' => $githubUser->getEmail()]
    );

  $databaseUser->fill([
    'name' => $githubUser->getName() ?? $githubUser->getNickname(),
    'avatar_url' => $githubUser->getAvatar()
  ]);

  Auth::login($databaseUser);

  return redirect('/');
});

Route::get('/logout', function () {
  Auth::logout();

  return redirect('/');
});

Route::middleware('auth')->group(function () {
  Route::prefix('/auth')->group(function () {
    Route::resource('organisations', OrganisationController::class);
    Route::resource('organisations/{organisation}/missions', MissionController::class);

    Route::post('mission-lines', [MissionLineController::class, 'store'])->name('mission.create');
  });
});
