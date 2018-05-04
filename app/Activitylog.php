<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Activitylog extends Authenticatable
{
    use Notifiable;
    protected $table = 'activity_log';
    protected $primaryKey = 'id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'stock_id','inspection_id','user_id','status','mainstatus'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function Stocks() 
	{
		return $this->belongsTo('App\Vehicle', 'stock_id');
	}
	
	public function Users() 
	{
		return $this->belongsTo('App\Admin', 'user_id');
	}
	
	public function Inspection() 
	{
		return $this->belongsTo('App\Inspection', 'inspection_id');
	}
	
	


}