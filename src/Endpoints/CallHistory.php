<?php

namespace Uon\Endpoints;

use Uon\Client;

/**
 * Class CallHistory
 *
 * @package Uon\Endpoints
 * @since   2.0
 */
class CallHistory extends Client
{
    /**
     * Add information about call
     *
     * @link https://api.u-on.ru/{key}/call_history/create.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function create(array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'call_history/create';
        $this->params   = $parameters;

        return $this->done();
    }
}
