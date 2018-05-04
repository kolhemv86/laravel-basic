<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Session;
use View;
use App\Common;
use App\Siteconfig;
use Auth;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	public function __construct() 
    {
     
    
    
				
        	
     $sitescon = Siteconfig::find(1);
     View::share('sitescon', $sitescon);
	 
	 
    }
	
	
	
	
}
