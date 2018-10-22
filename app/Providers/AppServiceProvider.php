<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use DB;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        DB::listen(function($query) {
//			dump($query->sql);//отображение sql 
//			dump($query->bindings);//отображение меток sql
//		});
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
