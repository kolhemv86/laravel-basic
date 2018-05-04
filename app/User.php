<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
     protected $table = 'users';
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'first_name', 'password', 'last_name', 'address1', 'address2','city','state_id','country_id','phone','registration_date','balance', 'status', 'comission_type', 'comission_code', 'site_code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	// public function addToFillable($value)
	// {
		// $this->fillable[] = $value;
	// }

    public function countrys()
    {
        return $this->belongsTo('App\Country','country');
 
    }


    public function states()
    {
        return $this->belongsTo('App\State','state');
 
    }
     public function citys()
    {
        return $this->belongsTo('App\City','city');
 
    }

}
