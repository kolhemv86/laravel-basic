<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Auth;
use View;
use App\Common;
class AppServiceProvider extends ServiceProvider
{
	protected $user;
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        error_reporting(E_ALL &~ E_NOTICE &~ E_DEPRECATED);
        //$cartuser=Common::usercart();
        //View::share('cartuser', $cartuser);
        //$cartuser = "helloo";
        //View::share('cartuser',$cartuser);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
