<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class City extends Authenticatable
{
    use Notifiable;
    protected $table = 'city';
    protected $primaryKey = 'id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','sid','cid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];



    public function country()
    {
        return $this->belongsTo('App\Country','cid');
 
    }


     public function state()
    {
        return $this->belongsTo('App\State','sid');
 
    }

}