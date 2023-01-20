<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivationUser extends Model
{
    public $table = 'user_activations';
    public $fillable = ['id', 'user_id', 'activated','token'];

}
