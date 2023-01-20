<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model 
{
    public $table = 'user_role';
    public $fillable = ['id', 'name','menu_ids'];
    public $primaryKey = 'id'; 
    public $incrementing = true;   
    public $timestamps = true;

    public function admins()
    {
        return $this->hasMany(Admin::class, 'role_id');
    }
}