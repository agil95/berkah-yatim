<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiataninfak extends Model
{
    //

    protected $table = 'kegiataninfaks';

    public $timestamps = true;

    protected $guarded = [];

    public function mitra() {
        return $this->belongsTo('App\Mitra','id_mitra','id');
    }

    public function url()
    {
        $slug = preg_replace("/[^a-zA-Z0-9 -]/", "", $this->judul);
        $slug = strtolower(str_replace(' ', '-', $slug));
        return $slug . '-' . $this->id;
    }

}
