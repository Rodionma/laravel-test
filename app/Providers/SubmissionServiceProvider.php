<?php

namespace App\Providers;

use App\Repositories\SubmissionRepository;
use App\Repositories\SubmissionRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class SubmissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SubmissionRepositoryInterface::class, SubmissionRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
