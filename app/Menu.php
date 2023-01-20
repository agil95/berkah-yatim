<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model 
{
    public $table = 'menu';
    public $fillable = ['id', 'name'];
    public $primaryKey = 'id'; 
    public $incrementing = true;   
    public $timestamps = true;

    public function submenus()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }
}