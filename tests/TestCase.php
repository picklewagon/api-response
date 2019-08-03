<?php

namespace Picklewagon\ApiResponse\Tests;

use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Picklewagon\ApiResponse\ServiceProvider;

/**
 * Class TestCase
 *
 * Base class all tests classes derive from
 */
abstract class TestCase extends BaseTestCase
{
    /**
     * Register package providers for unit tests.
     *
     * @param Application $app The application instance
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class,
        ];
    }
}
