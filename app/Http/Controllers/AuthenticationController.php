<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use League\Flysystem\Exception;

class AuthenticationController extends Controller
{
  /**
   * @return \Symfony\Component\HttpFoundation\RedirectResponse
   */
  public function redirectToGithub(): \Symfony\Component\HttpFoundation\RedirectResponse
  {
    return Socialite::driver('github')->redirect();
  }

  /**
   * @return RedirectResponse
   */
  public function handleGithubCallback(): RedirectResponse
  {
    try {
      $user = Socialite::driver('github')->user();
      $userFounded = User::updateOrCreate(
        [
          'name' => $user->user['name'],
          'email' => $user->user['email'],
          'email_verified_at' => $user->user['email_verified_at'],
          'password' => $user->user['password'],
          'remember_token' => $user->user['remember_token']
        ]
      );

      Auth::login($userFounded, true);

      return redirect()->route('dashboard');
    } catch (Exception $e) {
      dd($e);
      return redirect()->route('home');
    }
  }

  /**
   * Auto Login.
   *
   * @return Application|Factory|View
   */
  public function autoLogin(): View|Factory|Application
  {
    if (Auth::viaRemember()) {
      return redirect()->route('organisations.index');
    } else {
      return view('public.login');
    }
  }
}
