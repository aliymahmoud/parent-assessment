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
        $this->app->bind(
            'App\Services\V1\Abstraction\UserServiceI',
            'App\Services\V1\Concrete\UserService'
        );
        $this->app->bind(
            'App\Repositories\V1\Abstraction\UserRepositoryI',
            'App\Repositories\V1\Concrete\User\FileProvider'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
