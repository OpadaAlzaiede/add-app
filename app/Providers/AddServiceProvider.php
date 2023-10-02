<?php

namespace App\Providers;

use App\Http\Controllers\AddController;
use App\Http\Controllers\Admin\AdminAddController;
use App\Services\Adds\AddDeletionService;
use App\Services\Adds\AddQueryService;
use App\Services\Adds\AddStoreService;
use App\Services\Adds\EloquentAdminService;
use App\Services\Adds\EloquentUserService;
use Illuminate\Support\ServiceProvider;

class AddServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(AddController::class)
            ->needs(AddQueryService::class)
            ->give(EloquentUserService::class);

        $this->app->when(AddController::class)
            ->needs(AddStoreService::class)
            ->give(EloquentUserService::class);

        $this->app->when(AdminAddController::class)
            ->needs(AddQueryService::class)
            ->give(EloquentAdminService::class);

        $this->app->when(AdminAddController::class)
            ->needs(AddDeletionService::class)
            ->give(EloquentAdminService::class);

    }

}
