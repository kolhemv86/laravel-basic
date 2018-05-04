<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Role;
use App\Module;
use App\Permission;
use App\Common;

class ModuleController extends HomeController
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
    public function index(Request $request=NULL)
    {
		/*$Moduleobj = Module::orderBy('id','DESC')->paginate(5);
        return view('control_panel.module.list',compact('Moduleobj'))
            ->with('i', ($request->input('page', 1) - 1) * 5);*/
      
      $currentPath= Route::getFacadeRoot()->current()->uri();
	  $haspermission = Common::getpermission($currentPath);
	 
	  if($haspermission!=0)
	  {     

		$Moduleobj=Module::paginate(Getrecordperpage());
		
		if ($request->ajax()) {
            return view('control_panel.masters.module.data', compact('Moduleobj'));
        }
		
		return view('control_panel.masters.module.list',compact('Moduleobj'));
	  
	   }else{
		
		  return redirect('control_panel/access');
		
		  
	  }
    }

    public function show($id)
    {
      
      $module = Module::find($id);
      $subModuleobj=Module::where('subid', '0')->get();
      return View('control_panel.masters.module.edit', compact('module','subModuleobj'));
    }

    public function update(Request $request, $id)
    {
      $Modules = Module::find($id);
      $Modules->modulename = $request->modulename;
       $Modules->uri = $request->uri;
        $Modules->subid = $request->subid;
      $Modules->status = $request->status;		
     
      $Modules->save();
      return redirect('/control_panel/module');
    }

    public function create()
    {

      $subModuleobj=Module::where('subid', '0')->get();
	  $roleobj = Role::all();
      return view('control_panel.masters.module.add', compact('subModuleobj','roleobj'));
    }

    public function store(Request $request)
    {
	    
      $this->validate($request, [
        'modulename' => 'required|unique:module|max:255',
        'uri' => 'required|unique:module|max:255',
       
      ]);
      //dd($request);
      //exit;  
      $Modules = new Module;
      $Modules->modulename = $request->modulename;
      $Modules->uri = $request->uri;
      $Modules->subid = $request->subid;
      $Modules->status = $request->status;
    
      $Modules->save();
      
	 $totalrow = count($request->rolhid);
	 
	  for($i=0;$i<$totalrow;$i++)
	  {
		  $roleper = new Permission;
		  $roleper->role_id=$request->rolhid[$i];
		  $roleper->module_id = $Modules->id;
		  $roleper->save();
		
	  }
	  
	  
	  return redirect('/control_panel/module');
    }


     public function delete($id)
    {
      $Modules=Module::find($id);
      $Modules->delete();
      return redirect('/control_panel/module');
    }



}
