<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Newssubscribe;


class NewssubscribeController extends HomeController
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
      
      $newssubscribeobj=Newssubscribe::all();
      return view('control_panel.newssubscribe.list',compact('newssubscribeobj'));
    }
    public function show($id)
    {
        $objnews=Newssubscribe::find($id);
        return View('control_panel.newssubscribe.edit', compact('objnews'));
    }
    public function update(Request $request, $id)
    {
        $objnewssubscribe=Newssubscribe::find($id);
        $objnewssubscribe->status = $request->status;
        $objnewssubscribe->save();
        return redirect('/control_panel/newssubscribe');
    }
    public function delete($id)
    {
      $objnewssubscribe=Newssubscribe::find($id);
      $objnewssubscribe->delete();
      return redirect('/control_panel/newssubscribe');
    }






}
