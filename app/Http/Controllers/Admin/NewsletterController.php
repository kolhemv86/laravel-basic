<?php

namespace App\Http\Controllers\Admin;

use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\NewsletterRequest;

use App\Newsletter;
use App\Newssubscribe;


class NewsletterController extends HomeController
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
      
      $newsletterobj=Newsletter::all();
      return view('control_panel.newsletter.list',compact('newsletterobj'));
    }




    public function show($id)
    {
      
      $newsletters = Newsletter::find($id);
      return View('control_panel.newsletter.edit', compact('newsletters'));
    }

    public function update(NewsletterRequest $request, $id)
    {
      $newsletters = Newsletter::find($id);
      $newsletters->name = $request->name;
      $newsletters->description = $request->description;
     
      $newsletters->save();
      return redirect('/control_panel/newsletter');
    }

    public function create()
    {
     

      return view('control_panel.newsletter.add');
    }

    public function store(NewsletterRequest $request)
    {
      $this->validate($request, [
        'name' => 'required|unique:newsletter|max:255',

]);

      $newsletters = new Newsletter;
      $newsletters->name = $request->name;
       $newsletters->description = $request->description;
    
      $newsletters->save();
      return redirect('/control_panel/newsletter');
    }


     public function delete($id)
    {
      $newsletters=Newsletter::find($id);
      $newsletters->delete();
      return redirect('/control_panel/newsletter');
    }
    
     public function subscribelist($id){


          $newsletters = Newsletter::find($id);
          $users = Newssubscribe::where('status','A')->get();
          $title=$newsletters->name;
          $description=$newsletters->description;
          $siteurl=config('app.url', 'Laravel');





          if (!empty($users)) {
          foreach ($users as $user) {



          Mail::send(['html'=>'control_panel.mail'], ['news_title'=>$title,'news_description'=>$description, 'user'=>$user->id, 'siteurl'=>$siteurl],
          function ($message) use ($user) {
          $message->to($user->name, 'Newsletter')->subject(config('app.name', 'Laravel'));
          $message->from('testing.mehul2016@gmail.com', config('app.name', 'Laravel'));
          });
          
          
          }

          }

          return redirect('/control_panel/newsletter');
   
}


}
