<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proker extends Model
{
    use SoftDeletes;

    protected $table = 'prokers';
    protected $guarded = [];
    protected $dates = ['target_date'];
    protected $appends = ['slug', 'percent'];
    public $timestamps = true;

    public function fundriser()
    {
        return $this->belongsTo(Mitra::class, 'fundriser_id');
    }

    public function mitra()
    {
        return $this->belongsTo(Mitra::class, 'fundriser_id');
    }

    public function getSlugAttribute()
    {
        $slug = preg_replace("/[^a-zA-Z0-9 -]/", "", $this->nama_kegiatan);
        $slug = strtolower(str_replace(' ', '-', $slug));
        $slug = $slug . '-' . $this->id;
        return $slug;
    }

    public function getPercentAttribute()
    {
        if ($this->target == 0)
            return $this->percent = 0;
        else{
            $donations = $this->hasMany(Donasi::class, 'campaign_id');
            $jumlah = $donations->where(function ($query) {
                $query->where('status', '=', 'success')
                      ->orWhere('status', '=', 'settlement');
            })->sum('jumlah');

            return $this->percent = round(($jumlah / $this->target) * 100);
        }
    }


    public function url()
    {
        $slug = preg_replace("/[^a-zA-Z0-9 -]/", "", $this->nama_kegiatan);
        $slug = strtolower(str_replace(' ', '-', $slug));
        return $this->url = $slug . '-' . $this->id;
    }

    public function mitraDonations()
    {
        return $this->hasMany(Donasi::class, 'campaign_id');
    }

    public function userDonations()
    {
        return $this->hasMany(Donasiuser::class, 'campaign_id');
    }

    public function getActualEarnAttribute()
    {
        $donations = $this->hasMany(Donasi::class, 'campaign_id');
        $jumlah = $donations->where(function ($query) {
            $query->where('status', '=', 'success')
                  ->orWhere('status', '=', 'settlement');
        })->sum('jumlah');
       
        return $jumlah;
    }

    public function getLeftDayAttribute()
    {
        if ($this->target_date->lte(Carbon::now())) {
            return 'Berakhir';
        } else {
            return $this->target_date->diffInDays();
        }
    }

    public function kategori()
    {
        return $this->belongsTo('App\Kategori', 'type', 'id');
    }
}
