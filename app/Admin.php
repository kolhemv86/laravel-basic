<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	
	
	
	public function Role() 
	{
		return $this->belongsTo('App\Role', 'role');
	}
	
	
	public function Department($id) 
	{   
    $dept="";
		foreach (explode(',',$id) as $deptid)
		{

			$dept.=Department::find($deptid)->name.',';                    
		}
   
		return rtrim($dept,',');
	}
	
	
}