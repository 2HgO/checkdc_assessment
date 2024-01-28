<?php

namespace App\Providers;

use App\Services\V1\PollOptionService;
use Illuminate\Support\ServiceProvider;

class PollOptionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
      $this->app->bind(PollOptionService::class, function ($app) {
        return new PollOptionService();
      });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
