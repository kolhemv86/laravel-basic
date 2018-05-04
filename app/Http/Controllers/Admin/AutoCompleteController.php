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
use App\Carrier;
use App\Deal;
use App\Deal2;
use App\Customer;
use App\Entity;
use App\Vehicle;
use App\Admin;


class AutoCompleteController extends HomeController
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
    }

    public function customerAutoComplete(Request $request)
    {      
        $query = $request->customername;

       
        $customers=Customer::where('firstname','LIKE','%'.$query.'%')->get();
    
        $data=array();
        
        foreach ($customers as $customer) {
            $data[]=array('value'=>$customer->firstname.' '.$customer->lastname,'id'=>$customer->id);
        }

        if(count($data))
            return $data;
        else
            return ['value'=>'No Result Found','id'=>''];
        
        
    
    }

    public function entityAutoComplete(Request $request)
    {      
        $query = $request->get('entityname');
        
        $entities=Entity::where('name','LIKE','%'.$query.'%')->get();
        
        $data=array();
        foreach ($entities as $entity) {
            $data[] = array('value'=>$entity->name.' '.$entity->buyer_lastname,'id'=>$entity->id);
        }
        if(count($data))
            return $data;
        else
            return ['value'=>'No Result Found','id'=>''];
    
    }

    public function vehicleAutoComplete(Request $request)
    {      
        
        $query = $request->get('vehicle');

        // $vehicles=Vehicle::where('vin','LIKE','%'.$query.'%')->get();
        $vehicles=Vehicle::where('year','=',$query)
                        ->orWhere('make','LIKE','%'.$query.'%')
                        ->orWhere('model','LIKE','%'.$query.'%')
                        ->orWhere('vin','LIKE','%'.$query.'%')
                        /*->orWhere('miles_in','>=',$query)
                        ->orWhere('miles_out','<=',$query)*/
                        ->get();       
        
        $data=array();

        
        foreach ($vehicles as $vehicle) {
            $compareUrl = '/compare/compare/'.$vehicle->id;
            $weowe = '/items/view/car/'.$vehicle->id;
            $data[] = array('value'=>$vehicle->vin.' - '.$vehicle->year.' '.$vehicle->make.' '.$vehicle->model.' '.$vehicle->miles_in.' Miles','id'=>$vehicle->id,'vin'=>$vehicle->vin,'milesin'=>$vehicle->miles_in,'milesout'=>$vehicle->miles_out,'compareUrl' => $compareUrl, 'weowe '=> $weowe);
        }

        if(count($data))
            return $data;
        else
            return ['value'=>'No Result Found','id'=>''];
    
    }

    /* Old Deal
    public function populateDeal(Request $request)
    {
        if(!empty($request->entity_id) && !empty($request->vehicle_id) && !empty($request->customer_id)){
            
            $Deal = Deal::where([
                                ['entity_id', '=', $request->entity_id],
                                ['vehicle_id', '=', $request->vehicle_id],
                                ['customer_id', '=', $request->customer_id]
                            ])->first();

            if(!empty($Deal))
            {
                return $Deal->toJson();
            }
            else {
                return ['value'=>'null','id'=>'null'];
            }
        
        } 
        else {
            return ['value'=>'No Deals Found'];
        }
    }

    */

    public function populateDeal2(Request $request)
    {
        if(!empty($request->vehicle_id) && !empty($request->buyer1_id)){
            
            $Deal = Deal2::where([
                                //['entity_id', '=', $request->entity_id],
                                ['stock_id', '=', $request->vehicle_id],
                                ['buyer1_id', '=', $request->buyer1_id]
                            ])->first();

            $Deal->cap_sheet = route('vehicleCap',$Deal->id);

            if(!empty($Deal))
            {
                return $Deal->toJson();
            }
            else {
                return ['value'=>'null','id'=>'null'];
            }
        
        } 
        else {
            return ['value'=>'No Deals Found'];
        }
    }
	
	public function userAutoComplete(Request $request)
	{
		
		$query = $request->get('leinuser');
        
        $users=Admin::where('name','LIKE','%'.$query.'%')->get();
        
        $data=array();
        foreach ($users as $user) {
            $data[] = array('value'=>$user->name,'id'=>$user->id);
        }
        if(count($data))
            return $data;
        else
            return ['value'=>'No Result Found','id'=>''];
	}
	
	
	public function getVehicleDetails(Request $request)
    {
        $vehicle_id = $request->get('vehicle_id');
        $vehicle = Vehicle::find($vehicle_id);
        $vehicle->compare_url = route("compareVehicle",$vehicle->id);
        $vehicle->action_url = route("searchbycar",$vehicle->id);
        $vehicle->printPreviewWindowBookSheet = route("printPreviewWindowBookSheet",$vehicle->id);
        $vehicle->printPreviewBillOfSale = route("printPreviewBillOfSale",$vehicle->id);
        $vehicle->printPreviewHoldReciept = route("printPreviewHoldReciept",$vehicle->id);
        $vehicle->printPreviewSmartServicePlan = route("printPreviewSmartServicePlan",$vehicle->id);
        $vehicle->printPreviewReport502 = route("printPreviewReport502",$vehicle->id);
        $vehicle->printPreviewTempRegistration = route("printPreviewTempRegistration",$vehicle->id);
        $vehicle->printPreviewBuyersGuide = route("printPreviewBuyersGuide",$vehicle->id);
        $vehicle->printPreviewOdometerCertificate = route("printPreviewOdometerCertificate",$vehicle->id);
        $vehicle->printPreviewWeOwe = route("printPreviewWeOwe",$vehicle->id);
        $vehicle->printPreviewAuthForLoanPayoff = route("printPreviewAuthForLoanPayoff",$vehicle->id);
        $vehicle->printPreviewReferences = route("printPreviewReferences",$vehicle->id);
        $vehicle->printPreviewAgreementForInsurance = route("printPreviewAgreementForInsurance",$vehicle->id);
        $vehicle->printPreviewInstallmentContract = route("printPreviewInstallmentContract",$vehicle->id);
        $vehicle->powerOfAttorneyPurchase = route("powerOfAttorneyPurchase",$vehicle->id);
        $vehicle->powerOfAttorneyTrade = route("powerOfAttorneyTrade",$vehicle->id);
        $vehicle->wholesaleOnly = route("wholesaleOnly",$vehicle->id);
        $vehicle->reportOfSale = route("reportOfSale",$vehicle->id);
        $vehicle->wholesaleOnly = route("wholesaleOnly",$vehicle->id);
        return $vehicle->toJson();
    }
	

    public function getBuyerDetails(Request $request)
    {
        /*if($request->get('buyer1')){
            $query = $request->get('buyer1');
        }
        if($request->get('buyer2')){
            $query = $request->get('buyer2');
        }*/
        $query = $request->get('buyer');
        $buyerObj = Entity::where('name','LIKE','%'.$query.'%')
                        ->orWhere('buyer_middlename','LIKE','%'.$query.'%')
                        ->orWhere('buyer_lastname','LIKE','%'.$query.'%')
                        ->get();
        $data=array();
        foreach ($buyerObj as $entity) {
            $data[] = array('value'=>$entity->name.' '.$entity->buyer_lastname,'id'=>$entity->id);
        }
        if(count($data))
            return $data;
        else
            return ['value'=>'No Result Found','id'=>''];
        
    }

    public function getEntity(Request $request)
    {
        $entity = Entity::find($request->get('id'));
        return $entity->toJson();
    }

}
