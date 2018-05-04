<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\User;
use App\Usersubscription;
use App\Country;
use App\State;
use App\City;
use App\Subscriptionplan;
use App\Transaction;
use App\UserApi;
use App\Spepack;
use App\Withdraw;

use App\Order;
use App\Orderdetail;
use App\Book;
use App\Common;

class UsersController extends HomeController
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
      
      $userobj=User::where('status','active')->get();


       $Spepacklist=Spepack::all();
         $userstatusd='S';

      return view('control_panel.user.list',compact('userobj','Spepacklist','userstatusd'));
    }


    public function removeuser()
    {
      
      $userobj=User::where('status','suspend')->get();

       $Spepacklist=Spepack::all();

       $userstatusd='B';

      return view('control_panel.user.list',compact('userobj','Spepacklist','userstatusd'));
    }



    



    public function show($id)
    {
      $userapiobj = UserApi::find($id);
      if(isset($userapiobj)){

      }else{
        $userapiobj="";
      }

      $countryobj=Country::all();
      $stateobj=State::all();
      $cityobj=City::all();
      $userobjs = User::find($id);
      
      //print_r($subscriptionplanobj);die;
      return View('control_panel.user.edit', compact('userobjs','countryobj','stateobj','cityobj','userapiobj'));
    }
    public function update(Request $request, $id)
    {
      $userobjs = User::find($id);
      $userobjs->name = $request->name;
     
      $userobjs->save();
      return redirect('/control_panel/user');
    }
    public function infoupdate(Request $request)
    {
        $userobjs = User::find($request->userid);
        $userobjs->status = $request->status;
        $userobjs->comission_type = $request->comission_type;
        $userobjs->save();


        return redirect('/control_panel/user');
    }



  public function fund($type,$id)
    {

     $userobjs = User::find($id);




     $type=$type;



      return view('control_panel.user.fund',compact('userobjs','type'));
    }



     public function transaction($id)
    {
      
     $userobjs = Transaction::where('user_id',$id)->get();

     return view('control_panel.user.transaction',compact('userobjs'));
    }



 public function store(Request $request)
    {
     

      $UserObj = User::find($request->user_id);
      $amount=$request->amount;
      $cmbTransactionType=$request->cmbTransactionType;
      $comment=$request->comment;


      $tid=Common::MakeTransaction($UserObj,$amount,$cmbTransactionType,$comment);
      
      if($tid)
      {
        if($cmbTransactionType=="CR")
        {
          $UserObj = User::find($request->user_id); 
          Common::ProcessOrder($UserObj,$amount,$tid);   
          // Make Order Status InProcess for all applicable Orders and Send Email to all sellers
          
         
        } 
    }
     return redirect('/control_panel/user');
}

  public function makeapi($id)
  {
     // where('user_id',$id)->get();
      $userapiobj = UserApi::find($id);
      if(count($userapiobj)){

      }else{
          $userapiobj = new UserApi;
          $userapiobj->user_id = $id;
          $userapiobj->api = $id."-".date("Y-m-d H:i:s");
          $userapiobj->save();
      }
      return redirect('/control_panel/user/'.$id);
  }


public function splpkg(Request $request)
    {
     

       $splid=count($request->chkspl);
       $stype=$request->selSpecialCategory;
    

      for($i=0;$i<$splid;$i++){
        $uid=$request->chkspl[$i];

         $userobjs = User::find($uid);
        
        $userobjs->comission_code = $stype;
        $userobjs->save();


      }

    

     


          return redirect('/control_panel/user');

}


public function delete($id){

   $userobj=User::find($id);
   $userobj->status='suspend';
    $userobj->save();    
      return redirect('/control_panel/user');

}


public function useractive($id){

   $userobj=User::find($id);
   $userobj->status='active';
    $userobj->save();    
      return redirect('/control_panel/removeuser');

}





}