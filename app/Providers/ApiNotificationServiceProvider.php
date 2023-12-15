<?php

// app/Providers/ApiNotificationServiceProvider.php
namespace App\Providers;

use App\Services\ApiNotificationService;
use Illuminate\Support\ServiceProvider;

class ApiNotificationServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ApiNotificationService::class, function () {
            return new ApiNotificationService();
        });
    }
}
