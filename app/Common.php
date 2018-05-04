<?php
namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use View;
use App\Common;
use App\Country;
use App\State;
use App\City;
use App\Siteconfig;
use App\Emailtemplates;
use Auth;
use Mail;


class Common {


  static function getpermission($path)
  {
	   $roleid = Auth::guard('control_panels')->user()->role;
	   $modulrobj = Permission::where('role_id',$roleid)->where('view_action','1')->get();
    
	   foreach($modulrobj as $mod)
	   {
		   $per[] = $mod->module_id;   
	   }
	  
	   $moduleid = Module::where('uri',$path)->first();
	   //dd($moduleid,$path);
	   $id = $moduleid->id;
	   if($id == "")
	   {
		   return "0";
	   
	   }else{
		   
		   if(in_array($id,$per))
		   {
			   return "1";
		   
		   }else{
			   
			   return "0";
		   }
	   }
	  
  }
  
  
  static function posdragupdate($data,$id)
  {

	  if(array_key_exists("type", $data)){
            $data["type"]=$this->real_escape_string($data["type"]);
            }
			foreach ($data as $key => $value) {
				 $val="$value";
				$updates[]="$val";
			}
		
           $imploadAray=  implode(",", $updates);
	       
			$versions = DB::table('drivetrain')
            ->where('id', $id)
            ->update(['position'=>$imploadAray]);
	
  }
  
  static function posdragmileage($data,$id)
  {

	  if(array_key_exists("type", $data)){
            $data["type"]=$this->real_escape_string($data["type"]);
            }
			foreach ($data as $key => $value) {
				 $val="$value";
				$updates[]="$val";
			}
		
           $imploadAray=  implode(",", $updates);
	      
			$versions = DB::table('mileage_status')
            ->where('id', $id)
            ->update(['position'=>$imploadAray]);
	  
  }
  
  static function posdragvtype($data,$id)
  {

	  if(array_key_exists("type", $data)){
            $data["type"]=$this->real_escape_string($data["type"]);
            }
			foreach ($data as $key => $value) {
				 $val="$value";
				$updates[]="$val";
			}
		
           $imploadAray=  implode(",", $updates);
	      
			$versions = DB::table('vehicle_type')
            ->where('id', $id)
            ->update(['position'=>$imploadAray]);
	  
  }
  
 
}
?>