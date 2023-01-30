<?php

namespace App\Providers;

use App\Repositories\Book\BookRepository;
use App\Repositories\Book\BookRepositoryContract;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryContract;
use App\Repositories\Common\AuthorsRepository;
use App\Repositories\Common\AuthorsRepositoryContract;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryContract;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
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
        $this->app->bind(UserRepositoryContract::class , UserRepository::class);
        $this->app->bind(BookRepositoryContract::class , BookRepository::class);
        $this->app->bind(AuthorsRepositoryContract::class, AuthorsRepository::class);
        $this->app->bind(CategoryRepositoryContract::class , CategoryRepository::class);
    }
}
