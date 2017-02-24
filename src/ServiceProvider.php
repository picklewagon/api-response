<?php

namespace Picklewagon\ApiResponse;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Picklewagon\ApiResponse\Validators\RestValidator;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::resolver(function ($translator, $data, $rules, $messages) {
            return new RestValidator($translator, $data, $rules, $messages);
        });
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
