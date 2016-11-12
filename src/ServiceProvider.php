<?php

namespace Picklewagon\ApiResponse;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();
    }

    /**
     * Register the configuration.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(realpath(__DIR__ . '/../config/api-response.php'), 'api-response');
    }
}
