<?php

namespace Picklewagon\ApiResponse;

use Picklewagon\ApiResponse\Http\Response\Factory;

trait ApiResponse
{
    /**
     * Get the response factory instance.
     *
     * @return \Picklewagon\ApiResponse\Http\Response\Factory
     */
    protected function response()
    {
        return app(Factory::class);
    }
}
