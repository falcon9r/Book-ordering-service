<?php

namespace App\Providers;

use App\Services\Book\BookService;
use App\Services\Book\BookServiceContract;
use Illuminate\Support\ServiceProvider;

class ServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(BookServiceContract::class , BookService::class);
    }
}
