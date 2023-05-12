<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        view()->composer('*', function ($view) 
    { 
        if (session()->has('locale')) {
            \App::setLocale(session()->get('locale'));
            \Session::put('locale_mod', session()->get('locale'));
        }
        
    }); 
    }
}
