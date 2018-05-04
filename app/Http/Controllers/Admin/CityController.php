<?php


namespace App\Http\Controllers\Admin;

use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\CityRequest;
use Illuminate\Support\Facades\Route;


use App\City;

use App\Country;
use App\State;
use App\Role;
use App\Module;
use App\Permission;
use App\Common;




class CityController extends HomeController
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
		  $cityobj=City::paginate(Getrecordperpage());
		  return view('control_panel.city.list',compact('cityobj'));
	   }else{
		
		  return redirect('control_panel/access');
		
	  }
    }




    public function show($id)
    {
      
      $citys = City::find($id);

        $countrysedit = Country::all();

        
          $statesedit = State::where('id', '=', $citys->sid)->get();
     
   


      return View('control_panel.city.edit', compact('citys','countrysedit','statesedit'));
    }

    public function update(CityRequest $request, $id)
    {

 



      $citys = City::find($id);
      $citys->name = $request->name;
       $citys->sid = $request->sid;
       $citys->cid = $request->cid;
     
      $citys->save();
      return redirect('/control_panel/city');
    }

    public function create()
    {
      
      $countrys = Country::all();
       $states = State::all();
     
      return view('control_panel.city.add', compact('countrys','states'));
    }

    public function store(CityRequest $request)
    {
      $this->validate($request, [
        'name' => 'required|unique:city|max:255',

]);

      $citys = new City;
      $citys->name = $request->name;
      $citys->sid = $request->sid;
      $citys->cid = $request->cid;
    
      $citys->save();
      return redirect('/control_panel/city');
    }


     public function delete($id)
    {
      $citys=City::find($id);
      $citys->delete();
      return redirect('/control_panel/city');
    }

     public function getajax($id)
    {
      
    $states = State::where('cid', '=', $id)->get();
    return response()->json(['data'=>$states]);
      
    }


    


}
