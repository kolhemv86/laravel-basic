<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Siteconfig;
use App\Role;
use App\Module;
use App\Permission;
use App\Common;

class SiteconfigController extends HomeController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		parent::__construct();
        $this->middleware('auth.control_panel');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
	  $currentPath= Route::getFacadeRoot()->current()->uri();
	  $haspermission = Common::getpermission($currentPath);
	 
	  if($haspermission!=0)
	  {
       
      $siteconfigobj=Siteconfig::find(1);
      return view('control_panel.siteconfig.list',compact('siteconfigobj'));
	  
	  }else{
		
		  return redirect('control_panel/access');
		
		  
	  }
    }

    public function show($id)
    {


      $siteconfigs = Siteconfig::find($id);
      return View('control_panel.siteconfig.edit', compact('siteconfigs','comission_type'));
    }

    public function update(Request $request, $id)
    {
      $siteconfigs = Siteconfig::find($id);
      $siteconfigs->site_name = $request->site_name;
      $siteconfigs->site_URL = $request->site_URL;
      $siteconfigs->admin_email = $request->admin_email;
      $siteconfigs->admin_name = $request->admin_name;
      $siteconfigs->from_email = $request->from_email;
      $siteconfigs->from_name = $request->from_name;
      $siteconfigs->record_per_page = $request->record_per_page;
      
      $siteconfigs->currency_symbol = $request->currency_symbol;



      $file = $request->file('site_logo');



      if($file){ 
      $destinationPath = 'uploads';
      $file->move($destinationPath,$file->getClientOriginalName());
      $siteconfigs->site_logo = $file->getClientOriginalName();
      }else{
      
      }



     
      $siteconfigs->save();







      return redirect('/control_panel/siteconfig');
    }

   

 




}
