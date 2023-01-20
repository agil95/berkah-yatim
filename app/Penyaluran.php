<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyaluran extends Model
{

    protected $table = 'penyalurans';

    public $timestamps = true;

    protected $guarded = [];

    public function prokers()
    {
        return $this->belongsTo(Proker::class, 'penyaluran');
    }
}
