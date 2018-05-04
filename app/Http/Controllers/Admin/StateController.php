<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StateRequest;
use Illuminate\Support\Facades\Route;
use App\State;
use App\Country;
use App\Role;
use App\Module;
use App\Permission;
use App\Common;


class StateController extends HomeController
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
		$stateobj=State::paginate(Getrecordperpage());
		return view('control_panel.state.list',compact('stateobj'));
	   
	  }else{
		
		  return redirect('control_panel/access');
		
		  
	  }
    }




    public function show($id)
    {
      
      $states = State::find($id);

        $countrysedit = Country::all();
     
   


      return View('control_panel.state.edit', compact('states','countrysedit'));
    }

    public function update(StateRequest $request, $id)
    {
      $states = State::find($id);
      $states->name = $request->name;
      $states->tax_rate = $request->tax_rate;
       $states->cid = $request->cid;
     
      $states->save();
      return redirect('/control_panel/state');
    }

    public function create()
    {
      
      $countrys = Country::all();
     
      return view('control_panel.state.add', compact('countrys'));
    }

    public function store(StateRequest $request)
    {
      $this->validate($request, [
        'name' => 'required|unique:state|max:255',

]);

      $states = new State;
      $states->name = $request->name;
      $states->tax_rate = $request->tax_rate;
      $states->cid = $request->cid;
    
      $states->save();
      return redirect('/control_panel/state');
    }


     public function delete($id)
    {
      $states=State::find($id);
      $states->delete();
      return redirect('/control_panel/state');
    }



}
