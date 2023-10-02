<?php

namespace App\Providers;

use App\Services\Users\EloquentAdminService;
use App\Services\Users\UserService;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserService::class, EloquentAdminService::class);
    }

}
