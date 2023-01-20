<?php

namespace App\Http\Controllers\Auth;

use App\ActivationUser;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class VerifyController extends Controller
{
    public function activateUser($token)
    {
        $user = User::whereHas('activationTokens', function (Builder $query) use ($token) {
                    $query->where('token', $token);
                })->first();

        if ($user) {
            
            $user->status = 'active';
            $user->email_verified_at = Carbon::now();
            
            if ($user->save()) {
                ActivationUser::where('token', $token)->delete();
            }

            Auth::logout();
            Auth::login($user);

            return redirect('donatur/home');

        } else {
            abort(404, 'Token Aktivasi tidak valid');
        }
    }
}
