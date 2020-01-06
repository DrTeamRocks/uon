<?php

namespace UON\Endpoints;

use UON\Client;
use UON\Interfaces\QueryInterface;

/**
 * Class Statuses
 *
 * @package UON\Endpoint
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
     * @return \UON\Interfaces\QueryInterface
     */
    public function create(array $parameters): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = 'source/create';
        $this->params   = $parameters;

        return $this;
    }

    /**
     * Get sources list
     *
     * @link https://api.u-on.ru/{key}/source.{_format}
     *
     * @return \UON\Interfaces\QueryInterface
     */
    public function all(): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = 'source';

        return $this;
    }

}
