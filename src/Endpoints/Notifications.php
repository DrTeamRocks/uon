<?php

namespace Uon\Endpoints;

use Uon\Client;

class Notifications extends Client
{
    /**
     * Display flash message to managers
     *
     * @link https://api.u-on.ru/{key}/notification/create.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function create(array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'notification/create';
        $this->params   = $parameters;

        return $this->done();
    }
}
