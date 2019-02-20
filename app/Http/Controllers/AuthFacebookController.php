<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FacebookAccountService;

use Socialite;

class AuthFacebookController extends Controller
{
  /**
   * Create a redirect method to facebook api.
   *
   * @return void
   */
  public function redirect()
  {
      return Socialite::with('facebook')->redirect();
  }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback(FacebookAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
        auth()->login($user);
        return redirect()->route('home');
    }

}
