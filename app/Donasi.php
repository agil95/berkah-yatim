<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Donasi extends Model
{

    use Notifiable;

    protected $guarded = [];

    public $timestamps = true;
    
	public function admins()
	{
		return $this->belongsTo('App\Admin');
	}

	public function mitra()
	{
		return $this->belongsTo(Mitra::class, 'mitra_id');
    }
    
    public function user()
	{
		return $this->belongsTo('App\User','email', 'email');
    }

    public function rek() {
        return $this->belongsTo('App\Rekening','type','bank');
    }

    public function prokers()
    {
        return $this->belongsTo('App\Proker','campaign_id','id');
    }

    
	public function setPending()
    {
        $this->attributes['status'] = 'pending';
        self::save();
    }
 
    /**
     * Set status to Success
     *
     * @return void
     */
    public function setSuccess()
    {
        $this->attributes['status'] = 'success';
        self::save();
    }
 
    /**
     * Set status to Failed
     *
     * @return void
     */
    public function setFailed()
    {
        $this->attributes['status'] = 'failed';
        self::save();
    }
 
    /**
     * Set status to Expired
     *
     * @return void
     */
    public function setExpired()
    {
        $this->attributes['status'] = 'expired';
        self::save();
    }
}
