<?php
namespace App\Http\Controllers\Admin\Auth;

use App\Admin;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use View;
use App\Common;
use App\Department;
use App\Siteconfig;
use App\Role;
use App\Carrier;
use App\Module;
use App\Permission;


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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    // protected $redirectTo = '/control_panel/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()

    {
        $sitescon = Siteconfig::find(1);
        View::share('sitescon', $sitescon);
        $currentPath = Route::getFacadeRoot()->current()->uri();
        $moduleid = Module::where('modulename', 'LIKE', "%{$currentPath}%")->first();
        View::share('moduleid', $moduleid);
        $this->middleware('auth.control_panel');
        // $this->middleware('guest.control_panel');
    }
    public function index($depid = null)

    {
        if ($depid != "")
        {
            if ($depid == "A")
            {
                $userobj = Admin::where('status', 'Active')->paginate(Getrecordperpage());
            }
            elseif ($depid == "D")
            {
                $userobj = Admin::where('status', 'Inactive')->paginate(Getrecordperpage());
            }
            else
            {
                $userobj = Admin::where('dept', 'LIKE', "%{$depid}%")->paginate(Getrecordperpage());
                // return response()->json(['success' => true, 'userobj' => $userobj]);
            }
            $Departmentobj = Department::paginate(Getrecordperpage());
            return view('control_panel.control_paneluser.list', compact('userobj', 'Departmentobj', 'depid'));
        }
        else
        {
            $currentPath = Route::getFacadeRoot()->current()->uri();
            $haspermission = Common::getpermission($currentPath);
            $Departmentobj = Department::all();
            if ($haspermission != 0)
            {
                $userobj = Admin::paginate(Getrecordperpage());
                return view('control_panel.control_paneluser.list', compact('userobj', 'Departmentobj', 'depid'));
            }
            else
            {
                return redirect('control_panel/mileage');
            }
        }
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, ['name' => 'required|max:255', 'email' => 'required|email|max:255|unique:control_panels', 'password' => 'required|min:6|confirmed', 'role' => 'required', ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|max:255', 'username' => 'required|max:10', 'email' => 'required|email|max:255|unique:admins', 'password' => 'required|max:5|confirmed', 'role' => 'required', 'dept' => 'required',
        // 'pin' => 'required|max:8|unique:admins',
        'wage' => 'required:admins', 'lname' => 'required:admins', 'basepay' => 'required:admins', 'cellno' => 'required:admins', ]);
        $departmentarr = implode(',', $request->dept);
        $control_panels = new Admin;
        $control_panels->username = $request->username;
        $control_panels->name = $request->name;
        $control_panels->email = $request->email;
        $control_panels->dept = $departmentarr;
        $control_panels->password = bcrypt($request->password);
        $control_panels->role = $request->role;
        // $control_panels->pin = $request->pin;
        $control_panels->wage = $request->wage;
        $control_panels->basepay = $request->basepay;
        // $control_panels->two_week_salary  = $request->basepay;
        $control_panels->cellno = $request->cellno;
        $control_panels->notes = $request->notes;
        $control_panels->carrier = $request->carrier;
        $control_panels->lname = $request->lname;
        if(!empty($request->status))
        {
            $control_panels->status = $request->status;
        }
        $control_panels->save();
        return redirect('/control_panel/account');
    }
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $Departmentobj = Department::all();
        $roleobj = Role::all();
        $carrierobj = Carrier::all();
        return view('control_panel.control_paneluser.add', compact('Departmentobj', 'roleobj', 'carrierobj'));
    }
    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('control_panels');
    }

    public function delete($id)
    {
        $control_paneldel = Admin::find($id);
        $control_paneldel->delete();
        return redirect('/control_panel/account');
    }


    public function show($id)
    {
        $control_panelobj = Admin::find($id);
        $Departmentobj = Department::all();
        $Roleobj = Role::all();
        $carrierobj12 = Carrier::all();
        return View('control_panel.control_paneluser.edit', compact('control_panelobj', 'Departmentobj', 'Roleobj', 'carrierobj12'));
    }

    public function update(Request $request, $id)
    {
        
        if(!empty($request->password))
        {
            $this->validate($request, [
            // 'email' => 'required|email|max:255',
            'password' => 'required|min:6|confirmed',  'dept' => 'required',
            // 'pin' => 'required|max:8|unique:admins',
            'wage' => 'required:admins', 'lname' => 'required:admins', 'basepay' => 'required:admins', 'cellno' => 'required:admins', ]);
        }
        else
        {
            $this->validate($request, [
            // 'email' => 'required|email|max:255',
            'dept' => 'required',
            // 'pin' => 'required|max:8|unique:admins',
            'wage' => 'required:admins', 'lname' => 'required:admins', 'basepay' => 'required:admins', 'cellno' => 'required:admins', ]);
        }
        $departmentarr = implode(',', $request->dept);
        $control_panels = Admin::find($id);
        $control_panels->name = $request->name;
        // $control_panels->email = $request->email;
        $control_panels->dept = $departmentarr;
        if(!empty($request->password))
        {
            $control_panels->password = bcrypt($request->password);
        }
        // $control_panels->role = $request->role;
        // $control_panels->pin = $request->pin;
        $control_panels->wage = $request->wage;
        $control_panels->basepay = $request->basepay;
        // $control_panels->two_week_salary  = $request->basepay;
        $control_panels->cellno = $request->cellno;
        $control_panels->notes = $request->notes;
        $control_panels->carrier = $request->carrier;
        $control_panels->lname = $request->lname;
        $control_panels->status = $request->status;
        $control_panels->save();


        if ($request->profile == "P")
        {
            return redirect('/control_panel/home');
        }
        else
        {
            return redirect('/control_panel/account');
        }
    }

    public function profile()
    {
        $id = Auth::guard('control_panels')->user()->id;
        $control_panelobj = Admin::find($id);
        $Departmentobj = Department::all();
        $Roleobj = Role::all();
        $carrierobj12 = Carrier::all();
        return View('control_panel.control_paneluser.profile', compact('control_panelobj', 'Departmentobj', 'carrierobj12', 'Roleobj'));
    }

    public function changepin(Request $request, $id)
    {
        $control_panelobj = Admin::find($id);
        return View('control_panel.control_paneluser.changepin', compact('control_panelobj', 'Departmentobj', 'carrierobj12', 'Roleobj'));
    }

    public function profilestore(Request $request)
    {
        $this->validate($request, ['pin' => 'required|max:8|unique:admins', ]);
        $control_panels = Admin::find($request->id);
        $control_panels->pin = $request->pin;
        $control_panels->save();
        return redirect('/control_panel/home');
    }
}