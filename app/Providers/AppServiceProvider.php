<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
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
        Validator::extend("must_be_true" , function ($key, $value, $parameters, $validator){
            if((bool)$value == true)
            {
                return true;
            }
            else
            {
                return false;
            }
        }, "The field must be true");
    }
}
