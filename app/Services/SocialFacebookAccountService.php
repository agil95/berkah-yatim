<?php

namespace App\Services;

use App\SocialFacebookAccount;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialFacebookAccountService
{
    public function createOrGetUser(ProviderUser $providerUser, $provider)
    {
        $account = SocialFacebookAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialFacebookAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $provider
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = new \App\User;
                $user->name          = $providerUser->getName();
                $user->jkel          = 'P';
                $user->email         = $providerUser->getEmail();
                $user->password      = md5(rand(1, 10000));
                $user->nohp          = '';
                $user->alamat        = '';
                $user->status        = 'active';
                $user->donasi_awal   = 0;
                $user->foto          = $providerUser->getAvatar();
                $user->activated    = $provider;
                $user->email_verified_at = date("Y-m-d H:i:s");

                $user->save();
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}
