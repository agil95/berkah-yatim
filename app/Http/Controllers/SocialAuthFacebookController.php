<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Services\SocialFacebookAccountService;
use DB;

class SocialAuthFacebookController extends Controller
{
    //

    public function __construct(SocialFacebookAccountService $service)
    {
        $this->socialService = $service;
    }


    public function redirect($provider)
    {
        //return Socialite::driver('facebook')->redirect();
        try {
            return Socialite::driver($provider)->redirect();
        } catch (\Exception $e) {
            return redirect()->back()->with('gagal', 'Social media registration failed. ' . $e->getMessage());
        }
    }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback($provider)
    {
        try {

            DB::beginTransaction();
            $userSocial = Socialite::driver($provider)->user();
            $user = $this->socialService->createOrGetUser($userSocial, $provider);
            auth()->login($user);
            DB::commit();
            return redirect('/donatur');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('gagal', 'Registration failed. ' . $e->getMessage());
        }
    }
}
