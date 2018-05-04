<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Siteconfig extends Authenticatable
{
    use Notifiable;
    protected $table = 'site_config';
    protected $primaryKey = 'site_config_id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'site_name','site_URL','site_logo','admin_email','admin_name','from_name','from_email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

}