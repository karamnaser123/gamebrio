<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;

class socialloginController extends Controller
{
  public function redirectToGoogle()
  {
    return Socialite::driver('google')
      ->redirect();
  }

  public function handleGoogleCallback()
  {
    $user = Socialite::driver('google')->user();
    $existingUser = User::where('email', $user->getEmail())->first();

    if ($existingUser) {
      if (empty($existingUser->google_id)) {
        $existingUser->update(['google_id' => $user->getId()]);
      }
      Auth::login($existingUser);
    } else {
      $newUser = User::create([
        'name' => $user->getName(),
        'email' => $user->getEmail(),
        'username' => $user->getEmail(), // Use email as username
        'google_id' => $user->getId(), // Save the Google ID
      ]);

      Auth::login($newUser);
    }

    return redirect(RouteServiceProvider::HOME);
  }
}
