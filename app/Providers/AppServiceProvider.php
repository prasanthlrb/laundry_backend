<?php

namespace App\Providers;

use DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use AUTH;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('layouts.app', function($view) {
    
            $role_get = DB::table('roles')
                ->select('*')
                ->where('id','=',Auth::user()->role_id)
                ->first();
             
            $view->with(compact('role_get'));
        });
    }
}
