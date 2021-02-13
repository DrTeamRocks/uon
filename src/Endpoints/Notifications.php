<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

class Notifications extends Client
{
    /**
     * Display flash message to managers
     *
     * @link https://api.u-on.ru/{key}/notification/create.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function create(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'notification/create';
        $this->params   = $parameters;

        return $this;
    }
}
