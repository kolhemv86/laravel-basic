<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;

use App\Slider;
use App\Category;
use App\Book;
use App\Newssubscribe;
use App\Admin;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
    /*$admin = Admin::find(1);
    $admin->password = bcrypt(123456);
    $admin->save();
    dd($admin);
    return $admin;*/
    return view('pages.home');

    }


    
}
