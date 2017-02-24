<?php

namespace Picklewagon\ApiResponse\Http\Response;

use Picklewagon\ApiResponse\Http\Response;

class Factory
{
    /**
     * Respond with a created response and associate a location if provided.
     *
     * @param null|string $location
     * @param null|string $content
     * @return \Picklewagon\ApiResponse\Http\Response
     */
    public function created($location = null, $content = null)
    {
        $response = new Response($content);
        $response->setStatusCode(201);

        if (! is_null($location)) {
            $response->header('Location', $location);
        }

        return $response;
    }
}