<?php

namespace App\Providers;

use App\Services\Comments\CommentService;
use App\Services\Comments\EloquentCommentService;
use Illuminate\Support\ServiceProvider;

class CommentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CommentService::class, EloquentCommentService::class);
    }
}
