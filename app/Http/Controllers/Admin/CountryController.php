<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CountryRequest;
use Illuminate\Support\Facades\Route;
use App\Country;
use App\Role;
use App\Module;
use App\Permission;
use App\Common;


class CountryController extends HomeController
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
      $countryobj=Country::paginate(Getrecordperpage());
      return view('control_panel.country.list',compact('countryobj'));
	  
	  }else{
		
		  return redirect('control_panel/access');
		
		  
	  }
    }

    public function show($id)
    {
      
      $countrys = Country::find($id);
      return View('control_panel.country.edit', compact('countrys'));
    }

    public function update(CountryRequest $request, $id)
    {
      $countrys = Country::find($id);
      $countrys->name = $request->name;
      $countrys->isdn_no = $request->isdn_no;
     
      $countrys->save();
      return redirect('/control_panel/country');
    }

    public function create()
    {

      return view('control_panel.country.add');
    }

    public function store(CountryRequest $request)
    {
      $this->validate($request, [
        'name' => 'required|unique:country|max:255',
        'isdn_no' => 'required|unique:country',
      ]);

      //dd($request);

      $countrys = new Country;
      $countrys->name = $request->name;
      $countrys->isdn_no = $request->isdn_no;
    
      $countrys->save();
      return redirect('/control_panel/country');
    }


     public function delete($id)
    {
      $countrys=Country::find($id);
      $countrys->delete();
      return redirect('/control_panel/country');
    }



}
