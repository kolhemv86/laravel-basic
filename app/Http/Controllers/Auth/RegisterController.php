<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Newssubscribe;

use App\City;
use App\Common;
use App\Country;
use App\State;
use App\Siteconfig;
use App\Emailtemplates;
use App\Useraddress;
use Mail;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/thanks';

    /**
     * Create a new controller instance.
     *
     * @return void 
     */


    public function __construct()
    {
		 parent::__construct();
        $this->middleware('guest');

         

    }

   public function getRegister()
    {
      

       $countrys = Country::all();
       $states = State::all();
       return view('auth.register', compact('countrys','states'));
    }

     public function getajax($id)
    {
      
    $states = State::where('cid', '=', $id)->get();
    return response()->json(['data'=>$states]);
      
    }


      public function getajaxstate($id)
    {
      
    $cities = City::where('sid', '=', $id)->get();
    return response()->json(['data'=>$cities]);
      
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'user_name' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'address1' => 'required|string|max:500',
            'address2' => 'required|string|max:500',
            'country_id' => 'required',
            'state_id' => 'required',
            'city' => 'required',
            
            'phone' => 'required|numeric|min:10',
           
        ]);
    }




    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */



    protected function create(array $data)
    { 

      $userpass=$data['password'];
  
        $UserObj = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
           
            'user_name' => $data['user_name'],
            'password' => bcrypt($data['password']),
            
            'address1' => $data['address1'],
            'address2' => $data['address2'],
            'country_id' => $data['country_id'],
            'state_id' => $data['state_id'],
            'city' => $data['city'],
            
            'phone' => $data['phone'],
            'registration_date' => date('Y-m-d'),

        ]);

        $useraddressobj = new Useraddress;
        $useraddressobj->user_id = $UserObj->user_id;
        $useraddressobj->first_name = $data['first_name'];
        $useraddressobj->last_name = $data['last_name'];
        $useraddressobj->address1 = $data['address1'];
        $useraddressobj->address2 = $data['address2'];
        $useraddressobj->city = $data['city'];
        $useraddressobj->state_id = $data['state_id'];
        $useraddressobj->country_id = $data['country_id'];
        $useraddressobj->address_type = 'S';
        $useraddressobj->current_address = 'A';
        $useraddressobj->save();
	
		$useraddressobj1 = new Useraddress;
        $useraddressobj1->user_id = $UserObj->user_id;
        $useraddressobj1->first_name = $data['first_name'];
        $useraddressobj1->last_name = $data['last_name'];
        $useraddressobj1->address1 = $data['address1'];
        $useraddressobj1->address2 = $data['address2'];
        $useraddressobj1->city = $data['city'];
        $useraddressobj1->state_id = $data['state_id'];
        $useraddressobj1->country_id = $data['country_id'];
        $useraddressobj1->address_type = 'B';
        $useraddressobj1->current_address = 'A';
        $useraddressobj1->save();


        
        //print_r($UserObj);
        //exit;
        $EmailTemplatesObj = Emailtemplates::find(1);
        // Send an email to admin on user signup
        $siteconfig = Siteconfig::find(1);
        $currency_symbol= $siteconfig->currency_symbol;
        $msg=Common::MailTemplateFormatting($EmailTemplatesObj->email_temp_body,$UserObj,$OrderId=0,$book_id=0,$display_order=true,$userpass);
        Mail::raw($msg, function ($message) use ($UserObj,$EmailTemplatesObj,$siteconfig) {
          $message->to($siteconfig->admin_email, $EmailTemplatesObj->email_temp_subject)->subject($siteconfig->site_name);
          $message->from($siteconfig->from_email, $siteconfig->site_name);
          $message->setContentType('text/html');
          });
        Common::maillog($siteconfig->from_email,$siteconfig->admin_email,$EmailTemplatesObj->email_temp_subject,$msg);
        $EmailTemplatesObjs=Emailtemplates::find(3); 
        // Send activation link to user -- Send an email to User on user signup
        $msg1=Common::MailTemplateFormatting($EmailTemplatesObjs->email_temp_body,$UserObj,$OrderId=0,$book_id=0,$display_order=true,$userpass);
         Mail::raw($msg1, function ($message) use ($UserObj,$EmailTemplatesObj,$siteconfig) {
          $message->to($UserObj->user_name, $EmailTemplatesObj->email_temp_subject)->subject($siteconfig->site_name);
          $message->from($siteconfig->from_email, $siteconfig->site_name);
          $message->setContentType('text/html');
          });
        Common::maillog($siteconfig->from_email,$UserObj->user_name,$EmailTemplatesObj->email_temp_subject,$msg1);
        

        return $UserObj;
}









}
