<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

use Illuminate\Support\Facades\Route;

use View;
use App\Common;
use App\Siteconfig;
use App\Module;
use App\Permission;
use App\Admin;




class HomeController extends Controller
{
	
	
    protected $userId;

	
	
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		
		
		$sitescon = Siteconfig::find(1);
		View::share('sitescon', $sitescon);
        
	     
		$currentPath= Route::getFacadeRoot()->current()->uri();
	    $moduleid = Module::where('uri','LIKE',"%{$currentPath}%")->first();
		View::share('moduleid', $moduleid);
	    // $this->middleware('auth.control_panel');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		
		
        return view('control_panel.home');
    }
	
	
	 public function access()
	 {
		 return view('control_panel.access');
		 
	 }
	public function dashboard(Request $request)
	{
		
		
        return view('control_panel.home');

	}


	
	
}
