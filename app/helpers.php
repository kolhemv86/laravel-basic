<?php 


if (! function_exists('generateCategoryLists')) {
    function generateCategoryLists(array $elements, $parentId = 0,$indent = 0,$cateditid = 0) {
       

       foreach ($elements as $key => $element) {
       	
       		

            if ($element['parentid'] == $parentId) {
                
            	if($indent==0){
            	$str=""; 
            	$css='style="font-weight: 800;background: #eaecef;color: #000;"';
				}else{
				$str="-----"; 
				$css='';
				}

				if(in_array($element['id'],explode(",",$cateditid))){$selected="selected";}else{$selected="";}

                echo '<option '.$css.' value='.$element['id'].'  '.$selected.'>'.$str.$element['catname'] . '</option>';
                
              
               echo $children = generateCategoryLists($elements, $element['id'],$indent + 1,$cateditid);
            }
        } 

       
    }
}


  function menuactive($path, $active = 'active') {



        return call_user_func_array('Request::is', (array)$path) ? $active : '';
      
    }




     function menuactivechk($path, $active = 'A') {


        return call_user_func_array('Request::is', (array)$path) ? $active : '';
      
    }


if (! function_exists('ListsCategory')) 
{
    function ListsCategory(array $elements,$cateditid = 0) 
    {
      foreach ($elements as $key => $element) 
      {
        if(in_array($element['id'],explode(",",$cateditid)))
        {
         echo "<kbd>".$element['catname']."</kbd>";
        }
      }
    }
}

if (! function_exists('menu_role')) 
{
function menu_role($id)
{
 
    $permission = App\Permission::where('role_id',$id)->where('view_action','1')->get();	
    $permissionlistnew="";
    foreach ($permission as $permissionlist){
         $permissionlistnew.=$permissionlist->module_id.",";
    }
    $moduleid=trim($permissionlistnew,",");
    $moduleid=explode(",",$moduleid);
    return $moduleid;
}

}



if (! function_exists('module_type')) 
{
function module_type($type)
{
 

    $Moduleobj=App\Module::where('subid', $type)->where('status', 1)->OrderBy('id','DESC')->get();
    return $Moduleobj;
}

}


if (! function_exists('get_status')) 
{
function get_status($stockid,$user_id)
{
 

    $statusobj=App\Inspection::where('stock_id', $stockid)->where('inspection_by',$user_id)->orderBy('id','DESC')->get();
    return $statusobj;
}

}


if (! function_exists('get_actionid')) 
{
function get_actionid($inspection_id)
{
 
    $action_id=App\Activitylog::where('inspection_id', $inspection_id)->get();
    return $action_id[0]->id;
}

}
function isAllowed(){
	
	 //$path= Route::getFacadeRoot()->current()->uri();
	
	$opath = \Request::route()->getName();
	$exarr = explode('.',$opath);
	$ad = "control_panel";
	$path = $ad.'/'.$exarr[0];
	$moduleid = App\Module::where('uri',$path)->first();
	
	   $roleid = Auth::guard('control_panels')->user()->role;
	   $modulrobj = App\Permission::where('role_id',$roleid)->where('module_id',$moduleid->id)->first();
	   $action  = $exarr[1];
		if($action == 'create' && $modulrobj->add_action==0){
			return false;
		}
		
		if(in_array($action,['edit','show']) && $modulrobj->edit_action==0){
			return false;
		}
		
		/*if($action == 'destroy' && $modulrobj->delete_action==0){
			return false;
		}*/
		
	    return true;
}



function canDelete(){
	
	 //$path= Route::getFacadeRoot()->current()->uri();
	
	$opath = \Request::route()->getName();
	$exarr = explode('.',$opath);
	$ad = "control_panel";
	$path = $ad.'/'.$exarr[0];
	$moduleid = App\Module::where('uri',$path)->first();
	
	   $roleid = Auth::guard('control_panels')->user()->role;
	   $modulrobj = App\Permission::where('role_id',$roleid)->where('module_id',$moduleid->id)->first();
	   $action  = $exarr[1];
		
		if($modulrobj->delete_action==0){
			return false;
		}
		
	    return true;
}







function getallpermission()
  {
	  
	    $opath= Route::getFacadeRoot()->current()->uri();
	  
	   $parr = explode('/',$opath);
	    $path = $parr[0].'/'.$parr[1];
	  
	   
	   if($parr[1] == "access")
	   {
		   return 1;
	   }
	   $roleid = Auth::guard('control_panels')->user()->role;
	   $moduleid = App\Module::where('uri',$path)->first();
	    
	   $modulrobj = App\Permission::where('role_id',$roleid)->where('module_id',$moduleid->id)->first();
	  
	   if($modulrobj->view_action == "0")
	   {
		   return 0;
	   
	   }
	   return 1;
	  
  }
  
function Getrecordperpage()
{
	
	$sitescon = App\Siteconfig::find(1);
	return $sitescon->record_per_page;
	
}



    
