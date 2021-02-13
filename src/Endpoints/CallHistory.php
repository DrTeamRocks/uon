<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

/**
 * Class CallHistory
 *
 * @package UON\Endpoints
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
     * @return \UON\Interfaces\QueryInterface
     */
    public function create(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'call_history/create';
        $this->params   = $parameters;

        return $this;
    }
}
