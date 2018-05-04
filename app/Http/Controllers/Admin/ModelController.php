<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Model;
use App\Make;
use App\Role;
use App\Module;
use App\Permission;
use App\Common;


class ModelController extends HomeController
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
    public function index()
    {
       $currentPath= Route::getFacadeRoot()->current()->uri();
	  $haspermission = Common::getpermission($currentPath);
	 
	  if($haspermission!=0)
	  {
      $modelobj=Model::paginate(20);
      return view('control_panel.car.model.list',compact('modelobj'));
	  
	  }else{
		
		  return redirect('control_panel/access');
		
		  
	  }
    }




    public function show($id)
    {
      
      $models = Model::find($id);

        $countrysedit = Make::all();
     
   


      return View('control_panel.car.model.edit', compact('models','countrysedit'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
        'name' => 'required',
        'mid' => 'required',

]);


      $models = Model::find($id);
      $models->name = $request->name;
       $models->mid = $request->mid;
     
      $models->save();
      return redirect('/control_panel/model');
    }

    public function create()
    {
      
      $countrys = Make::all();
     
      return view('control_panel.car.model.add', compact('countrys'));
    }

    public function store(Request $request)
    {
      $this->validate($request, [
        'name' => 'required|unique:model|max:255',
        'mid' => 'required',

]);

      $models = new Model;
      $models->name = $request->name;
      $models->mid = $request->mid;
    
      $models->save();
      return redirect('/control_panel/model');
    }


     public function delete($id)
    {
      $models=Model::find($id);
      $models->delete();
      return redirect('/control_panel/model');
    }



}
