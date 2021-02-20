<?php

namespace Uon\Endpoints;

use Uon\Client;

/**
 * Class Statuses
 *
 * @package Uon\Endpoint
 */
class Sources extends Client
{
    /**
     * Create new source
     *
     * @link https://api.u-on.ru/{key}/source/create.{_format}
     *
     * @param array $parameters List of parameters
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function create(array $parameters)
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'source/create';
        $this->params   = $parameters;

        return $this->done();
    }

    /**
     * Get sources list
     *
     * @link https://api.u-on.ru/{key}/source.{_format}
     *
     * @return null|object|\Uon\Interfaces\ClientInterface
     */
    public function all()
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'source';

        return $this->done();
    }
}
