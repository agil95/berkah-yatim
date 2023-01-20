<?php

namespace App;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use App\Donasi;

class User extends Authenticatable
{

    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function donasis()
    {
        return $this->hasMany(Donasi::class,'email', 'email')->where(function ($query) {
            $query->where('status', '=', 'success')
                  ->orWhere('status', '=', 'settlement');
        });
    }

    public function amount()
    {
        return $this->hasMany(Donasi::class,'email', 'email')->where(function ($query) {
            $query->where('status', '=', 'success')
                  ->orWhere('status', '=', 'settlement');
        });
    }

    public function activationTokens()
    {
        return $this->hasMany(ActivationUser::class, 'user_id');
    }

    public function profilePicture()
    {
        if ($this->foto) {
            if (filter_var($this->foto, FILTER_VALIDATE_URL)) {
                return $this->foto;
            } elseif ($this->foto) {
                return asset('storage/'. $this->foto);
            } else {
                return asset('img/man.png');
            }
        } else {
            return asset('img/man.png');
        }
    }
}
