<?php

namespace App\Services;
use App\FacebookAccount;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;
use Illuminate\Support\Facades\Storage;
use File;

class FacebookAccountService
{
    public function getSocialAvatar($file, $id) : String {
        $fileContents = file_get_contents($file);
        Storage::put('public/user/avatars/' . $id . ".jpg", $fileContents);
        return 'user/avatars/' . $id . '.jpg';
    }

    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = FacebookAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new FacebookAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();
            $avatar = $this->getSocialAvatar($providerUser->getAvatar(), $providerUser->getId());

            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'password' => md5(rand(1,10000)),
                    'avatar' => $avatar,
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}
