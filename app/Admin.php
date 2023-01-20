<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;
    // public function donasis(){
    //     return $this->belongsToMany('Donasi');
    // }
    public function donasis()
    {
        return $this->hasOne('App\Donasi', 'foreign_key');
    }
    public function anakyatims()
    {
        return $this->hasOne('App\Anakyatim', 'foreign_key');
    }

    public function role()
    {
        return $this->hasOne('App\UserRole', 'id','role_id');
    }

    protected $table = 'admins';

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cek($roles , $id){
        $status=false;
        $data = explode(',', $roles);
        foreach($data as $value){
            if($value==$id)
                $status=true;
        }
        return $status;
    }

    public function authorizeRoles($roles, $id)
    {
        $status=false;
        $data = explode(',', $roles);
        foreach($data as $value){
            if($value==$id)
                $status=true;
        }
        return $status || abort(401, 'This action is unauthorized.');
    }
}
