<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    //

    protected $table = 'rekenings';

    public $timestamps = true;

    protected $guarded = [];
}
