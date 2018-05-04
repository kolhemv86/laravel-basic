<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Auth;
use App\Role;
use App\Module;
use App\Permission;
use App\Common;


class RoleController extends HomeController
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
		  $Roleobj=Role::paginate(Getrecordperpage());
		  return view('control_panel.role.list',compact('Roleobj','module'));
      
	  }else{
		
		  return redirect('control_panel/access');
		
		  
	  }
	}

    public function show($id)
    {
      
      $role = Role::find($id);
      return View('control_panel.role.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
      $Roles = Role::find($id);
      $Roles->name = $request->name;
      
     
      $Roles->save();
      return redirect('/control_panel/role');
    }

    public function create()
    {
      $module=Module::all();
      return view('control_panel.role.add', compact('module'));
    }

    public function store(Request $request)
    {
		
      $this->validate($request, [
        'name' => 'required|unique:role|max:255',
       
      ]);
      //dd($request);
      //exit;  
      
	  
	
	  $Roles = new Role;
      $Roles->name = $request->name;
      $Roles->save();
	  $lastid = $Roles->id; 
      return redirect('/control_panel/role/'.$lastid.'/permission');
    }


	 public function permissionstore(Request $request)
	 {
		$id = $request->roleid;
		
		 $Total_mod = count($request->mod);
		 Permission::where('role_id',$id)->update(['view_action' => '0']); 
		 if($Total_mod>0)
		 {
		
			for($i=0;$i<$Total_mod;$i++)
			{
				
				 $getpermissionid = Permission::where('role_id',$id)->where('module_id',$request->mod[$i])->first(); 
				 
				 if($getpermissionid == ""){

					$Roles_per = new Permission;
				    $Roles_per->view_action = '1';  
				    $Roles_per->role_id = $request->roleid;
					$Roles_per->module_id = $request->mod[$i];
					$Roles_per->save();
				 
				 }else{
				 
				 Permission::where('role_id',$id)->where('module_id',$request->mod[$i])->update(['view_action' => '1']); 
					
				 }
			
			}
			
		 
		 }else{
			     
				
			 
		 }	
		 
		return redirect('/control_panel/role'); 
		 
		 
	 }
	
	
    public function delete($id)
    {
      $Roles=Role::find($id);
      $Roles->delete();
      return redirect('/control_panel/role');
    }
	
	
	public function permission($id)
    {
      $module=Module::all();
	  $editpermission = Permission::where('role_id',$id)->get();
	  $rolls = array();
foreach($editpermission->toArray() as $row){
	
	$rolls[$row["module_id"]] =  $row;
	
}

      return view('control_panel.role.permission', compact('module','id','rolls'));
	
	}
	
	public function action_permission($id,$add,$edit,$delete,$role_id)
	{
		
		$roleper = Permission::where('role_id',$role_id)->where('module_id',$id)->get();
		
		$permissionid = $roleper[0]->id;
		
		$module = Permission::find($permissionid);
		$module->add_action = $add;
		$module->edit_action = $edit;
		$module->delete_action = $delete;
		$module->save();

		
	}
	
	
	public function getcheckaction($id,$role_id)
	{
		$roleper = Permission::where('role_id',$role_id)->where('module_id',$id)->first();
		return response()->json($roleper);
	}


}
