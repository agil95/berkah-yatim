<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Proker;
use App\Donasi;

class Donasiuser extends Model
{
    public $timestamps = true;

    
    public function user()
    {
        return $this->belongsTo(User::class, 'iduser');
    }

    public function prokers()
    {
        return $this->belongsTo(Proker::class, 'campaign_id');
    }

    public function donaturs()
    {
        return $this->hasMany(Donasi::class,'fundriser','iduser');
    }

}
