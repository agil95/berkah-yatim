<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    //

    protected $table = 'logs';

    public $timestamps = true;

    protected $guarded = [];
}
